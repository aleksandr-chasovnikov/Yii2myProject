<?php
namespace app\modules\main\controllers;

use Yii;
use frontend\models\Image;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\LoginForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

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
    public function actionLogin(){
        $model = new LoginForm;

        if($model->load(\Yii::$app->request->post()) && $model->login()){

            $this->goBack();
        }

        return $this->render("login", ['model' => $model]);
    }

    public function actionLogout(){

        \Yii::$app->user->logout();
        return $this->goHome();
    }

	/**
	 * 
	 */
    public function actionRegister()
    {
    	$model = new SignupForm;

    	if( $model->load( Yii::$app->request->post()) && $model->signup() ) {

    		Yii::$app->session->setFlash('success', 'Регистрация успешна.');

    	}

    	return $this->render('register', compact('model'));
    }

	/**
	 * 
	 */
    public function actionContact()
    {
    	$model = new ContactForm();

		if ($model->load( Yii::$app->request->post()) 
			&& $model->sendEmail( Yii::$app->params['emailto'])) {

				Yii::$app->session->setFlash('contactFormSubmitted');

				return $this->refresh();
			}

		return $this->render('contact', compact('model'));
	}
    
}
