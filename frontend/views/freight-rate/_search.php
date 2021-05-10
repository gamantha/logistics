<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FreightRateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freight-rate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'route_from') ?>

    <?= $form->field($model, 'route_to') ?>

    <?= $form->field($model, 'shippingId') ?>

    <?= $form->field($model, 'mode_of_transport') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'valid_from') ?>

    <?php // echo $form->field($model, 'valid_to') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
