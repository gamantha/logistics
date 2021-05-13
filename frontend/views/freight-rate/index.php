<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FreightRateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Freight Rates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freight-rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Freight Rate'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'route_from',
            'route_to',
//            'shippingId',
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                 'attribute' => 'shipping',
 'value' => 'shipping.name',
//                'value' => function ($data) {
//                    return $data->shipping->name; // $data['name'] for array data, e.g. using SqlDataProvider.
//                },
            ],

            'mode_of_transport',
            'currency',
            'rate',
            'unit',
            'valid_from',
            'valid_to',
            'notes',


            [
                'label'=>'Files',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a('files',['freight-rate/files', 'id' => $data->id]);
                },
            ],


            //'type',
            //'status',
            //'created_at',
            //'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => "{update}&nbsp&nbsp&nbsp&nbsp&nbsp;{delete}",
                'buttons' => [

                ],


            ],


        ],
    ]); ?>

<!--    --><?php //Pjax::end(); ?>

</div>
