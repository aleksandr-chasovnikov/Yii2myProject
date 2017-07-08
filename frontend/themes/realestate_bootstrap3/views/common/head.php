<?
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
                <?php
                $menuItems = [
                    ['label' => 'Главная', 'url' => '/',],
                    ['label' => 'О проекте', 'url' => ['/main/main/page', 'view' => 'about']],
                    ['label' => 'Контакты', 'url' => ['/main/main/page', 'view' => 'contact']],
                ];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);
                ?>
            </div>
            <!-- #Nav Ends -->

        </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">

    <!-- Header Starts -->
    <div class="header">
        <a href="/" ><img src="/images/logo.png"  alt="Realestate"></a>
        <?php
        $menuItems = [];

        if(Yii::$app->user->isGuest) {
            $menuItems[] =  ['label' => 'Вход', 'url' => '#', 'linkOptions' => ['data-target' => '#loginpop', 'data-toggle' => "modal"]];
        }
        else{
            $menuItems[] =  ['label' => 'Мои объявления', 'url' => ['/cabinet/advert']];
            $menuItems[] =  ['label' => 'Настройки', 'url' => ['/cabinet/default/settings']];
            $menuItems[] =  ['label' => 'Изменить пароль', 'url' => ['/cabinet/default/change-password']];
            $menuItems[] = ['label' => 'Выход',  'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
        }
        echo Nav::widget([
            'options' => ['class' => 'pull-right'],
            'items' => $menuItems,
        ]);
        ?>
    </div>
    <!-- #Header Starts -->
</div>