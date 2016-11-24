<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-xs-12 col-md-8">
<!--            <canvas id="dashboard" height="100%"></canvas>-->
            <div id="interactive" style="height: 300px;"></div>
        </div>
        <div class="col-xs-6 col-md-4">
            <?php 
            $color = NULL;
            foreach ($model as $parking) {
                if (strcmp($parking['current_status'], 'Available') == 0)
                    $color = 'success';
                else
                    $color = 'danger';
                echo Html::a(
                    '<span class="fa fa-car fa-lg"></span> '.$parking['id_parking'], 
                    ['parking/view', 'id' => $parking['id_parking']], 
                    [
                        'class' => 'btn btn-'.$color,
                        'id' => 'PN-'.$parking['id_parking'],
                    ]
                ).'&nbsp';
            }
            ?>
        </div>
    </div>
    <?php 
    //FLOT CHARTS
    $this->registerJsFile(Yii::$app->homeUrl.'/js/jquery.flot.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    //FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized
    $this->registerJsFile(Yii::$app->homeUrl.'/js/jquery.flot.resize.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    // JS of dashboard
    $this->registerJsFile(Yii::$app->homeUrl.'/js/dashboardParking.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
    ?>
</div>