<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FreightRate */

$this->title = Yii::t('app', 'Create Freight Rate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freight Rates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freight-rate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
