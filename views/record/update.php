<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Record */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Record',
]) . $model->id_record;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_record, 'url' => ['view', 'id_record' => $model->id_record, 'parking_id_parking' => $model->parking_id_parking, 'plaque_id_plaque' => $model->plaque_id_plaque]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
