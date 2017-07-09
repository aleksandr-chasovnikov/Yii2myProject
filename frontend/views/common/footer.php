<?

use yii\bootstrap\Nav;
use yii\helpers\Url;

if(Yii::$app->user->isGuest) {
    echo \frontend\widgets\Login::widget();
}
?>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-top-at">
            <div class="col-md-3 amet-sed">
                <h4>Our Company</h4>
                <ul class="nav-bottom">
                    <li><a href="about.html">О проекте</a></li>
                    <li><a href="blog.html">Рекламодателям</a></li>
                    <li><a href="mobile_app.html">Mobile</a></li>
                    <li><a href="terms.html">Сроки и условия</a></li>
                    <li><a href="privacy.html">Политика приватности</a></li>  
                    <li><a href="blog.html">Блог</a></li>
                    
                </ul>   
            </div>
            <div class="col-md-3 amet-sed ">
                <h4>Работать с нами</h4>
                    <ul class="nav-bottom">
                        <li><a href="single.html">Брокеры по недвижимости</a></li>
                        <li><a href="single.html">Развитие бизнеса</a></li>
                        <li><a href="single.html">Партнерские программы</a></li>
                        <li><a href="contact.html">Карта сайта</a></li>
                        <li><a href="career.html">Карьера</a></li>
                        <li><a href="/main/main/pages/feedback">Обратная связь</a></li>   
                    </ul>   
            </div>
            <div class="col-md-3 amet-sed">
                <h4>Customer Support</h4>
                <p>Mon-Fri, 7AM-7PM </p>
                <p>Sat-Sun, 8AM-5PM </p>
                <p>177-869-6559</p>
                    <ul class="nav-bottom">
                        <li><a href="#">Live Chat</a></li>
                        <li><a href="faqs.html">Frequently Asked Questions</a></li>
                        <li><a href="suggestion.html">Make a Suggestion</a></li>
                    </ul>   
            </div>
            <div class="col-md-3 amet-sed ">
                <h4>Property Services</h4>
                   <ul class="nav-bottom">
                        <li><a href="single.html">Residential Property</a></li>
                        <li><a href="single.html">Commercial Property</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="typo.html">Short Codes</a></li>    
                    </ul>   
                    <ul class="social">
                        <li><a href="#"><i> </i></a></li>
                        <li><a href="#"><i class="gmail"> </i></a></li>
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="camera"> </i></a></li>
                        <li><a href="#"><i class="dribble"> </i></a></li>
                    </ul>
            </div>
        <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="col-md-4 footer-logo">
                <h2><a href="/">DomKvartirka</a></h2>
            </div>
            <div class="col-md-8 footer-class">
                <p >© 2017 DomKvartirka. Все права защищены | Создатель:<a href="<?= \yii\helpers\Url::to('main/pages/contact') ?>" target="_blank"> Александр Часовников </a></p>
            </div>
        <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->