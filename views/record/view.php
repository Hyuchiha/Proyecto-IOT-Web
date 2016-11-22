<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Record */

$this->title = $model->id_record;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_record' => $model->id_record, 'parking_id_parking' => $model->parking_id_parking], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_record' => $model->id_record, 'parking_id_parking' => $model->parking_id_parking], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_record',
            'parking_id_parking',
            'create_at',
            'update_at',
            'time_parking',
        ],
    ]) ?>

</div>
