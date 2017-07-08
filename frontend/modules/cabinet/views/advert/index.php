<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">

    <p>
        <?= Html::a('Create Advert', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idadvert',
            'price',
            'address',
            'user.email', // user - имя связки (Advert::getUser), eamil - элемент
            'bedroom',
            'livingroom',
            'parking',
            'kitchen',
            // 'general_image',
            // 'description:ntext',
            // 'location',
            // 'hot',
            // 'sold',
            // 'type',
            // 'recommend',
            'created_at:date',
            'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
