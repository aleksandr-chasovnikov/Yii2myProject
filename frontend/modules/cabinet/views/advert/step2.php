<?php $form = \yii\bootstrap\ActiveForm::begin(); ?>

    <div class="row">
        <? echo $form->field($model, 'general_image')->widget(\kartik\file\FileInput::classname(),[
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['file-upload-general']),
                'uploadExtraData' => [
                    'advert_id' => $model->idadvert,
                ],
                'allowedFileExtensions' =>  ['jpg', 'png','gif'],
                'initialPreview' => $image,
                'showUpload' => true,
                'showRemove' => false,
                'dropZoneEnabled' => false
            ]
        ]) ?>

    </div>

    <div class="row">
        <? echo \yii\helpers\Html::label('Images');

        echo \kartik\file\FileInput::widget([
            'name' => 'images',
            'options' => [
                'accept' => 'image/*',
                'multiple'=>true
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['file-upload-images']),
                'uploadExtraData' => [          // Указ. дополнительные поля
                    'advert_id' => $model->idadvert,
                ],
                'overwriteInitial' => false,        // Не перезаписывать
                'allowedFileExtensions' =>  ['jpg', 'png','gif'],
                'initialPreview' => $images_add,    // Предзагруженная картинка
                'showUpload' => true,       // Показ кнопку загрузки
                'showRemove' => false,      // Не показ кнопку удаления
                'dropZoneEnabled' => false, //дроп-зона
            ]
        ]) ?>

    </div>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php \yii\bootstrap\ActiveForm::end(); ?>