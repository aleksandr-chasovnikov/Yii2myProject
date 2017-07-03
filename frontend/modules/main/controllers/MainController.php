<?php
namespace app\modules\main\controllers;

use Yii;
use frontend\models\Image;
use frontend\models\SignupForm;

class MainController extends \yii\web\Controller
{
	/**
	 * 
	 */
	public $layout = 'inner';

	/**
	 * Подключение классов-экшенов
	 */
	public function actions()
	{
		return [
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' :null,
			],
		];
	}

	/**
	 * 
	 */
    public function actionIndex()
    {
        return $this->render('index');
    }

	/**
	 * 
	 */
    public function actionRegister()
    {
    	$model = new SignupForm;

    	// if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
    	// 	Yii::$app->response->format= Response::FORMAT_JSON;
    	// 	return ActiveForm::validate($model);
    	// }

    	if( $model->load( Yii::$app->request->post()) && $model->signup() ) {

    		print_r($_POST);
    		die;

    	}

    	return $this->render('register', compact('model'));
    }

	/**
	 * 
	 */
    public function actionContact()
    {
    	return $this->render('contact');
    }

}
