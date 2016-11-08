<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Parking */

$this->title = Yii::t('app', 'Create Parking');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parkings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
