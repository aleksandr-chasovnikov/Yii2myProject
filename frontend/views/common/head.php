<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">


                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">

                <?= Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => 'Главная', 'url' => '#'],
                            ['label' => 'О проекте', 'url' => '#'],
                            ['label' => 'Контакты', 'url' => '#'],
                        ],
                    ]) ?>

            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="index.html" ><img src="images/logo.png"  alt="logo"></a>

        <?php

        $menuItems = [];

        if( Yii::$app->user->isGuest ) {
            $menuItems[] =  [
                'label' => 'Вход', 
                'url' => '#', 
                'linkOptions' => [
                    'data-target' => '#loginpop', 
                    'data-toggle' => "modal"
                ]
            ];
        } else {

            $menuItems[] =  [
                'label' => 'Мэнеджер объявлений', 
                'url' => '/cabinet/advert',
                'label' => 'Выход',  
                'url' => '/site/logout', 
                'linkOptions' => ['data-method' => 'post']
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'pull-right'],
            'items' => [
                ['label' => 'Купить', 'url' => '#'],
                ['label' => 'Продать', 'url' => '#'],
                ['label' => 'Аренда', 'url' => '#'],
            ],
        ]);

        ?>

    </div>
    <!-- #Header Starts -->
</div>