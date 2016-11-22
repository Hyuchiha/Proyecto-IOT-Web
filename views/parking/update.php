<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parking */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Parking',
]) . $model->id_parking;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parkings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_parking, 'url' => ['view', 'id' => $model->id_parking]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="parking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
