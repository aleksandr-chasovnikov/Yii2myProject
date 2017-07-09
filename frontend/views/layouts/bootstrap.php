<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */

 \frontend\assets\MainAsset::register($this); ?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?=$this->title ?> </title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

<!-- <link href="css/bootstrap.css ?>" rel="stylesheet">
<link href="css/popuo-box.css ?>" rel="stylesheet">
<link href="css/flexslider.css ?>" rel="stylesheet">
<link href="css/default.css ?>" rel="stylesheet">
<link href="css/styles.css ?>" rel="stylesheet">
<link href="css/style.css?t=<?php echo(microtime(true)); ?>" rel="stylesheet" type="text/css" media="all" />  
<script src="js/easyResponsiveTabs.js"></script>
<script src="js/jquery.flexisel.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
<script src="js/scripts.js"></script> -->

<?php $this->registerJs('

  ;$(function () {
      $("#slider").responsiveSlides({
        auto: true,
        speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
    
  ', $this::POS_READY, 'slider-js'); ?>

</head>

<body>
<?php $this->beginBody() ?>


<? if(Yii::$app->session->hasFlash('success')): ?>

        <?=Yii::$app->session->getFlash('success') ?>
<?php
 endif;
?>

<?=$this->render("//common/head") ?>


<?=$content ?>



<?=$this->render("//common/footer") ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



