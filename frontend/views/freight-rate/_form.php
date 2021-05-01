<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FreightRate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freight-rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'route_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shippingId')->textInput() ?>

    <?= $form->field($model, 'mode_of_transport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
