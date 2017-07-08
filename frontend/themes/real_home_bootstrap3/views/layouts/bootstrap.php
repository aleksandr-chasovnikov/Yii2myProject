<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
\frontend\assets\RealHomeThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?=$this->title ?> </title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

<script src="js/scripts.js"></script>
<link href="css/styles.css?t=<?php echo(microtime(true)); ?>" rel="stylesheet">
<link href="css/style.css?t=<?php echo(microtime(true)); ?>" rel="stylesheet" type="text/css" media="all" />  
<script src="js/responsiveslides.min.js"></script>

   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
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



