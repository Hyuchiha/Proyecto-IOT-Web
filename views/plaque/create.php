<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Plaque */

$this->title = Yii::t('app', 'Create Plaque');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plaques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plaque-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
