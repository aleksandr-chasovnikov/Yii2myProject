<?

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Alert;

\frontend\assets\MainAsset::register($this);

if( Yii::$app->session->hasFlash('success')) {
    $success = Yii::$app->session->getFlash('success');
}

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>

<?php $this->beginBody() ?>
<?= $this->render("//common/head") ?>


<!-- <div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="#">Главная</a> / <?=$this->title ?></span>
        <h2><?=$this->title ?></h2>
    </div>
</div> -->
<!-- banner -->

<!-- banner -->
<div class="container">
    <div class="spacer">

<?php if( Yii::$app->session->hasFlash('success')): 
    $success = Yii::$app->session->getFlash('success');
    echo Alert::widget(['options' => ['class' => 'alert-info'], 'body' => $success]) ;
else:
    echo $content;
endif;
?>

    </div>
</div>



<?= $this->render("//common/footer") ?>
<?php $this->endBody() ?>


</body>
</html>

<?php $this->endPage() ?>

