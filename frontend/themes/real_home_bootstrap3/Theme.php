<?php

namespace frontend\themes\real_home_bootstrap3;

use Yii;

class Theme extends \yii\base\Theme
{
    public $pathMap = [
        '@frontend/views'   => '@frontend/themes/real_home_bootstrap3/views',
        '@frontend/modules' => '@frontend/themes/real_home_bootstrap3/modules'
    ];

    public function init()
    {
        parent::init();
    }
}
