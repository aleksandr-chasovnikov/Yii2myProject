<?
namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class RealHomeThemeAsset extends  AssetBundle
{
    public $sourcePath = '@frontend/themes/real_home_bootstrap3/source';
    // public $baseUrl = '@web';

    public $css = [
        'source/ccs/bootstrap.css',
        'source/ccs/default.css',
        'source/ccs/flexslider.css',
        'source/ccs/popuo-box.css',
        'source/ccs/style.css',
        'source/ccs/styles.css',
    ];

    public $js = [
        'source/js/easyResponsiveTabs.js',
        'source/js/jquery.flexisel.js',
        'source/js/jquery.flexslider.js',
        'source/js/jquery.magnific-popup.js',
        'source/js/jquery.min.js',
        'source/js/responsiveslides.min.js',
        'source/js/scripts.js'
    ];

    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery.js
        'yii\bootstrap\BootstrapAsset', // bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js
    ];

    public $jsOptions = [
      'position' =>  View::POS_END,
    ];


}