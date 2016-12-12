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
    $this->registerJsFile(Yii::$app->homeUrl.'/js/Chart.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile(Yii::$app->homeUrl.'/js/graphic.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    $this->registerJsFile(Yii::$app->homeUrl.'/js/parkings.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>