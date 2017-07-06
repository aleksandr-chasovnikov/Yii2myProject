<?
namespace frontend\controllers;

use common\models\LoginForm;
use common\models\Subscribe;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ValidateController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get', 'post'],
                    'subscribe' => ['get', 'post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionIndex()
    {

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

    }

    /**
     * @inheritdoc
     */
    public function actionSubscribe()
    {

        $model = new Subscribe();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

            Yii::$app->response->format = Response::FORMAT_JSON;
            
            return ActiveForm::validate($model);
        }
    }

}