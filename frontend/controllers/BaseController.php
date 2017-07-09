<?php

namespace frontend\controllers;

abstract class BaseController extends \yii\web\Controller
{
	/**
	 * Подключаем шаблон представления
	 */
	public $layout = 'bootstrap';

}
