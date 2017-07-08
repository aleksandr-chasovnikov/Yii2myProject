<?php
namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class RealHomeThemeAsset extends  AssetBundle
{
    public $sourcePath = '@frontend/themes/real_home_bootstrap3/source';
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';

    public $css = [
        // 'ccs/bootstrap.css',
        // 'ccs/styles.css',
        // 'ccs/style.css',
        'ccs/default.css',
        'ccs/flexslider.css',
        'ccs/popuo-box.css',
    ];

    public $js = [
        // 'js/jquery.min.js',
        // 'js/scripts.js',
        'js/easyResponsiveTabs.js',
        'js/jquery.flexisel.js',
        'js/jquery.flexslider.js',
        'js/jquery.magnific-popup.js',
        // 'js/responsiveslides.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery.js
        'yii\bootstrap\BootstrapAsset', // bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js
    ];

    public $jsOptions = [
      'position' =>  View::POS_HEAD,
    ];


}