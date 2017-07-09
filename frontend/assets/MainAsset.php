<?
namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends  AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'source/css/styles.css?t=0fats',
        'source/css/style.css?t=0fgcn',
        'source/style.css?t=0sgg',
        'source/css/default.css?t=0fatas',
        'source/css/popuo-box.css',
        'source/css/flexslider.css',
    ];

    public $js = [
        'source/js/easyResponsiveTabs.js',
        'source/js/jquery.flexisel.js',
        'source/js/jquery.flexslider.js',
        'source/js/jquery.magnific-popup.js',
        'source/js/responsiveslides.min.js',
        'source/js/scripts.js',
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