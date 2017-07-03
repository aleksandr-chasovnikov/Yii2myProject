<?php
namespace app\modules\main\controllers;

use Yii;
use frontend\models\Image;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
			'test' => [
				'class' => 'frontend\actions\TestAction',
				// 'viewNames' => 'test1',
			]
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
    	// $model->scenario = 'short_register'; // Сценарий

    	// if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) ) {
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
    	$model = new ContactForm();

    	if( $model->load(Yii::$app->request->post()) && $model->validate() ) {

    		if(Yii::$app->common->sendMail($model->subject, $model->body)) {

    		echo 'hello';die;
    		} else {

    		echo 'почти';die;
    		}
    	}

    	return $this->render('contact', compact('model'));
    }
    
}
