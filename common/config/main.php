<?php
return [
    'name' => 'Advert Project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

    //Чтобы в один компонент передать другой:
        // 'storage' => [], 
        // 'component' => function () { return Yii::createObject([
        //     'class' => 'app\components\Component',
        //     'storage' => Yii::$app->get('storage'),
        // ]); },
    
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
