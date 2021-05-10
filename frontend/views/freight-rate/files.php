<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FreightRateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Files');


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freight Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


?>
<div class="freight-rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Upload File'), ['addfile', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
'name',
            [
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::$app->request->BaseUrl.'/uploads/freight-rate/' . $data->name,
                        ['height' => '200px']);
                },

            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{filedelete}',
                'buttons' => [
                    'filedelete' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            $url,
                            [
                                'title' => 'Delete',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
