<?php

namespace app\modules\cabinet\controllers;

use Yii;
use common\models\Advert;
use common\models\Search\AdvertSearch;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Imagine\Image\Point;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends \common\controllers\AuthController
{
    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Загрузка главной картинки
     */
    public function actionFileUploadGeneral()
    {
        if(Yii::$app->request->post()) {
            
            $id = Yii::$app->request->post("advert_id"); // Из step2

            // Получить псевдоним
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id."/general");
            // general - лицевые картинки
            // Создаем директорию $id, если её нет
            BaseFileHelper::createDirectory($path);

            // Выборка из БД по id
            $model = Advert::findOne($id);
            // В модели задан сценарий (берём только 'general_image')
            $model->scenario = 'step2';

            // загрузка
            $file = UploadedFile::getInstance($model,'general_image');
            // Даем имя лицевой картинке
            $name = 'general.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image  = $path .DIRECTORY_SEPARATOR .$name;
            // Имя нелицевой картинки
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $model->general_image = $name;
            $model->save();

            $size = getimagesize($image); // php-функция
            $width = $size[0];
            $height = $size[1];

            // Приводим нелицевую картинку к нужному виду и сохраняем
            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            return true;

        }
    }


    /**
     * Загрузка вторичной картинки
     */
    public function actionFileUploadImages()
    {
        if(Yii::$app->request->post()) {

            $id = Yii::$app->request->post("advert_id");

            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$id);
            BaseFileHelper::createDirectory($path);

            $file = UploadedFile::getInstanceByName('images');
            $name = time().'.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);

            $image = $path .DIRECTORY_SEPARATOR .$name;
            $new_name = $path .DIRECTORY_SEPARATOR."small_".$name;

            $size = getimagesize($image);
            $width = $size[0];
            $height = $size[1];

            Image::frame($image, 0, '666', 0)
                ->crop(new Point(0, 0), new Box($width, $height))
                ->resize(new Box(1000,644))
                ->save($new_name, ['quality' => 100]);

            sleep(1); // Небольшая задерка воизбежание ошибок
            return true;

        }
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['step2']);

        } else {
            return $this->render('update', compact('model'));
        }
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['step2']);
        } else {
            return $this->render('update', compact('model'));
        }
    }

    /**
     * @inheritdoc
     */
    public function actionStep2()
    {
        $id = Yii::$app->locator->cache->get('id');
        $model = Advert::findOne($id);
        $image = [];

        if($general_image = $model->general_image){

            $image[] =  '<img src="/uploads/adverts/' 
                . $model->idadvert . '/general/small_' 
                . $general_image . '" width=250>';
        }

        if(Yii::$app->request->post()){

            $this->redirect(Url::to(['advert/']));
        }

        $path = Yii::getAlias("@frontend/web/uploads/adverts/" . $model->idadvert);
        $images_add = [];

        try {
            if(is_dir($path)) {

                $files = \yii\helpers\FileHelper::findFiles($path);

                foreach ($files as $file) {
                    if (strstr($file, "small_") && !strstr($file, "general")) {

                        $images_add[] = '<img src="/uploads/adverts/' 
                        . $model->idadvert . '/' . basename($file) . '" width=250>';
                    }
                }
            }
        }
        catch(\yii\base\Exception $e){}

        return $this->render("step2", compact('model', 'image', 'images_add'));
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрошенная страница не существует');
        }
    }

}
