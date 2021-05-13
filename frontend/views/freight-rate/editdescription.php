<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>