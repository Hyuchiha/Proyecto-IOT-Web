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
            <canvas id="dashboard" height="100%"></canvas>
        </div>
        <div class="col-xs-6 col-md-4">
            <?php 
            $color = NULL;
            foreach ($model as $parking) {
                if ($parking['current_status'] == 1)
                    $color = 'red';
                else
                    $color = 'green';
                echo Html::button(
                    $content = '<span class="fa fa-car fa-lg" style="color:'.$color.'"></span> '.$parking['id_parking'],
                    $options=[
                        'class'=>'btn btn-default',
                    ]
                ).'&nbsp';
            }
            ?>
        </div>
    </div>
    <script src="../js/dashboardParking.js"></script>
</div>