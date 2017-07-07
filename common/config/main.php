<?php
return [
    'name' => 'Advert Project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'db' => require(__DIR__ . '/db.php'),

    //Чтобы в один компонент передать другой:
        // 'storage' => [], 
        // 'component' => function () { return Yii::createObject([
        //     'class' => 'app\components\Component',
        //     'storage' => Yii::$app->get('storage'),
        // ]); },
    
        // 'cache' => [
        //     'class' => 'yii\caching\FileCache',
        // ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'pages/<view:[a-zA-Z0-9-]+>' => 'main/main/page',
                'view-advert/<id:\d+>' => 'main/main/view-advert',
                'cabinet/<action_cabinet:(settings|change-password)>' => 'cabinet/default/<action_cabinet>'
            ],
        ],
    ],
];
