<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'author_id',
            // 'img_id',
            'date',
            'category_id',
            // 'text:ntext',
            'title',
            // 'abridgment:ntext',
            // 'activity',
            'keywords',
            'meta_desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
