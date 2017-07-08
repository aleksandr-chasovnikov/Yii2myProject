<?php

namespace app\modules\main;

/**
 * main module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\main\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // $this->setLayoutPath('@frontend/views/layouts');
        $this->setLayoutPath('@frontend/themes/real_home_bootstrap3/views/layouts');

        // custom initialization code goes here
    }
}
