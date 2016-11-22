<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParkingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_parking') ?>

    <?= $form->field($model, 'min_time') ?>

    <?= $form->field($model, 'max_time') ?>

    <?= $form->field($model, 'average_time') ?>

    <?= $form->field($model, 'current_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
