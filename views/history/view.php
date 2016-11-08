<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\History */

$this->title = $model->idhistory;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idhistory' => $model->idhistory, 'parking_idparking' => $model->parking_idparking, 'plaque_idplaque' => $model->plaque_idplaque], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idhistory' => $model->idhistory, 'parking_idparking' => $model->parking_idparking, 'plaque_idplaque' => $model->plaque_idplaque], [
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
            'idhistory',
            'parking_idparking',
            'plaque_idplaque',
            'create_at',
            'update_at',
            'time_parking',
        ],
    ]) ?>

</div>
