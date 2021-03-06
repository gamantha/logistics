<?php

use app\models\Shipping;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\FreightRate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freight-rate-form">

    <?php
    $form = ActiveForm::begin([
    'tooltipStyleFeedback' => true, // shows tooltip styled validation error feedback
    ]);

    ?>

    <?= $form->field($model, 'route_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'route_to')->textInput(['maxlength' => true]) ?>





    <?php

//    echo     $form->field($model, 'shippingId')->textInput();

    $shippingmodels = Shipping::find()->All();
    $data = \yii\helpers\ArrayHelper::map($shippingmodels,'id', 'name');

echo $form->field($model, 'shippingId')->widget(Select2::classname(), [
    'data' => $data,
    'options' => ['placeholder' => 'Select shipping ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

    echo $form->field($model, 'mode_of_transport')->dropDownList(
        ['sea' => 'Sea', 'air' => 'Air', 'land' => 'Land']
    );

    echo $form->field($model, 'currency')->dropDownList(
    ['idr' => 'IDR', 'sgd' => 'SGD', 'usd' => 'USD']
    ); ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

    <?php

    echo $form->field($model, 'unit')->dropDownList(
        ['pc' => 'Pc', 'kg' => 'Kg', 'ton' => 'Ton']
    );

    ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'notes')->textArea(['maxlength' => true]) ?>
    <?php



    echo '<label class="control-label">Select date range</label>';
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'valid_from',
        'attribute2' => 'valid_to',
        'options' => ['placeholder' => 'Start date'],
        'options2' => ['placeholder' => 'End date'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]);



    echo $form->field($model, 'status')->dropDownList(
        ['active' => 'Active', 'inactive' => 'inactive']
    );

    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
