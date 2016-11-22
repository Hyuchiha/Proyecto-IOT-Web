<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Plaque */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Plaque',
]) . $model->id_plaque;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plaques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plaque, 'url' => ['view', 'id' => $model->id_plaque]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="plaque-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
