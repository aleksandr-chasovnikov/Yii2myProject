<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row register">
	<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
		
		<?php $form = ActiveForm::begin([
			// 'enableClientValidation' => false,
			// 'enableAjaxValidation' => true,
			]) ?>

		<?= $form->field($model, 'username') ?>
		<?= $form->field($model, 'email') ?>
		<?= $form->field($model, 'password')->passwordInput() ?>
		<?= $form->field($model, 'repassword')->passwordInput() ?>

		<?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>

		<?php ActiveForm::end() ?>


	</div>

</div>