<?php 

use yii\helpers\Html;


if(Yii::$app->user->isGuest) {
    echo \frontend\widgets\Login::widget();
}

?>

<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Информация</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.html" >О нас</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.html" >Агенты</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.html" >Блог</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.html" >Контакты</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Новостная рассылка</h4>
                <p>Получайте уведомления о последних новостях на нашем рынке.</p>
                <?= \frontend\widgets\SubscribeWidget::widget() ?>
              
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Подписывайтесь на нас</h4>
                <a href="#"><img src="/images/facebook.png"  alt="facebook"></a>
                <a href="#"><img src="/images/twitter.png"  alt="twitter"></a>
                <a href="#"><img src="/images/linkedin.png"  alt="linkedin"></a>
                <a href="#"><img src="/images/instagram.png"  alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Наши контакты</h4>
                <p><b>Bootstrap Realestate Inc.</b><br>
                    <span class="glyphicon glyphicon-map-marker"></span> 8290 Walk Street, Australia <br>
                    <span class="glyphicon glyphicon-envelope"></span> hello@bootstrapreal.com<br>
                    <span class="glyphicon glyphicon-earphone"></span> (123) 456-7890</p>
            </div>
        </div>
        <p class="copyright">Copyright 2013. All rights reserved.	</p>


    </div></div>