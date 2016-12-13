<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_panel', [
    'parkings' => $parkings,
]) ?>
</div>
<?php 
    //FLOT CHARTS
    $this->registerJsFile('@web/js/Chart.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile('@web/js/graphic.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile('@web/js/parkings.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>