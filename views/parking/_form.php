<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idparking')->textInput() ?>

    <?= $form->field($model, 'min_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'average_time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
