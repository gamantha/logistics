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



    <?php

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

    <?php

    echo $form->field($model, 'status')->dropDownList(
        ['active' => 'Active', 'inactive' => 'inactive']
    );

    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
