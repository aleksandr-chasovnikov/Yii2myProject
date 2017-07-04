<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>

<div class="row contact">
	<div class="col-lg-6 col-sm-6">

	<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
    
        <div class="alert alert-success">
            Спасибо за обращение к нам. Мы постараемся ответить вам как можно скорее.
        </div>
    
    <?php else: ?>

		<?php $form = ActiveForm::begin([
		// 'enableClientValidation' => false,
		// 'enableAjaxValidation' => true,
		]) ?>

		<?= $form->field($model, 'name') ?>
		<?= $form->field($model, 'email') ?>
		<?= $form->field($model, 'subject')->textArea(['rows' => 3]) ?>
		<?= $form->field($model, 'body')->textArea(['rows' => 8]) ?>
		<?= $form->field($model, 'verifyCode')->widget( Captcha::className(), [
			'template' => '	<div class="row">
								<div class="col-lg-3">
									{image}
								</div>
								<div class="col-lg-6">
									{input}
								</div>
							</div>',

			'captchaAction' => Url::to(['main/captcha'])
			]) ?>

		<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

		<?php ActiveForm::end() ?>

    <?php endif; ?>
	</div>
</div>