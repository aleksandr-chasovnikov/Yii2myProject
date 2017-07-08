<?php

namespace frontend\themes\realestate_bootstrap3;

use Yii;

class Theme extends \yii\base\Theme
{
    public $pathMap = [
        '@frontend/views'   => '@frontend/themes/realestate_bootstrap3/views',
        '@frontend/modules' => '@frontend/themes/realestate_bootstrap3/modules'
    ];

    public function init()
    {
        parent::init();
    }
}
