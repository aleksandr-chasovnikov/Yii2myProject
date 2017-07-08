<?php

namespace app\modules\cabinet;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\cabinet\controllers';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setLayoutPath('@frontend/themes/real_home_bootstrap3/views/layouts');
        // custom initialization code goes here
    }
}
