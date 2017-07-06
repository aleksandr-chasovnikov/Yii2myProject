<?php

namespace app\modules\cabinet\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
