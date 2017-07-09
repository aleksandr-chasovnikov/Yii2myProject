<?php
namespace app\modules\main\controllers;

use Yii;
use common\models\Advert;
use common\models\LoginForm;
use frontend\components\Common;
use frontend\filters\FilterAdvert;
use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\base\DynamicModel;
use yii\data\Pagination;
use yii\web\Response;
use yii\widgets\ActiveForm;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;

class MainController extends \frontend\controllers\BaseController
{
    /**
     * Подключаемые классы-экшны
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            // 'test' => [
            //     'class' => 'frontend\actions\TestAction',
            // ],            
            'page' => [ // Для статичных страниц (Контакты, О нас)
                'class' => 'yii\web\ViewAction',
                'layout' => 'bootstrap',
            ]
        ];
    }

    /**
     * Подключаемые классы-поведения
     */
    public function behaviors(){
        return [
            [
                'only' => ['view-advert'],
                'class' => FilterAdvert::className(),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    // public function actionIndex()
    // {
    //     // return $this->render('index');
    // }

    /**
     * Поиск на странице
     */
    public function actionFind($propert='',$price='',$apartment = ''){

        $this->layout = 'sell';

        $query = Advert::find();
        $query->filterWhere(['like', 'address', $propert])
            ->orFilterWhere(['like', 'description', $propert])
            ->andFilterWhere(['type' => $apartment]);

        if($price){
            $prices = explode("-",$price);

            if(isset($prices[0]) && isset($prices[1])) {
                $query->andWhere(['between', 'price', $prices[0], $prices[1]]);
            }
            else{
                $query->andWhere(['>=', 'price', $prices[0]]);
            }
        }

        $countQuery = clone $query;

        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize(10);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $request = Yii::$app->request;

        return $this->render("find", ['model' => $model, 'pages' => $pages, 'request' => $request]);

    }

    /**
     * Регистрация пользователей
     */
    public function actionRegister()
    {
        $model = new SignupForm();

        if( Yii::$app->request->isAjax && Yii::$app->request->isPost) {

            if( $model->load( Yii::$app->request->post() )) {

                Yii::$app->response->format = Response::FORMAT_JSON;

                return ActiveForm::validate($model);
            }
        }

        if( $model->load( Yii::$app->request->post() ) && $model->signup() ) {

            Yii::$app->session->setFlash('success', 'Регистрация прошла успешно.');
        }

        return $this->render("register", compact('model'));
    }

    /**
     * Авторизация
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        if($model->load(Yii::$app->request->post()) && $model->login()) {

           return $this->goHome();
        }

        return $this->render("login", compact('model'));
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Контакты
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $body = " <div>Body: <b> ".$model->body." </b></div>";
            $body .= " <div>Email: <b> ".$model->email." </b></div>";

            Yii::$app->common->sendMail($model->subject,$body);

            print "Send success";
            die;
        }

        return $this->render("contact", compact('model'));
    }

    /**
     * Страница одного объявления
     */
    public function actionViewAdvert($id)
    {
        $model = Advert::findOne($id);

        $data = ['name', 'email', 'text'];
        $model_feedback = new DynamicModel($data);
        $model_feedback->addRule('name','required');
        $model_feedback->addRule('email','required');
        $model_feedback->addRule('text','required');
        $model_feedback->addRule('email','email');


        if(Yii::$app->request->isPost) {
            if ($model_feedback->load(Yii::$app->request->post()) && $model_feedback->validate()){

                Yii::$app->common->sendMail('Subject Advert',$model_feedback->text);
            }

        }

        $user = $model->user;
        $images = \frontend\components\Common::getImageAdvert($model);

        $current_user = ['email' => '', 'username' => ''];

        if(!Yii::$app->user->isGuest){

            $current_user['email'] = Yii::$app->user->identity->email;
            $current_user['username'] = Yii::$app->user->identity->username;

        }

        // Получ. координаты в виде массива
        $coords = str_replace(['(',')'],'',$model->location);
        $coords = explode(',',$coords);

        $coord = new LatLng(['lat' => $coords[0], 'lng' => $coords[1]]);
        $map = new Map([
            'center' => $coord,
            'zoom' => 20,
        ]);

        $marker = new Marker([
            'position' => $coord,
            'title' => Common::getTitleAdvert($model),
        ]);

        $map->addOverlay($marker);


        return $this->render('view_advert', compact(
                                'model', 
                                'model_feedback', 
                                'user', 
                                'images', 
                                'current_user', 
                                'map'
                            ));

    }

}
