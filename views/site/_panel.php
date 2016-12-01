<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Parking Time</div>
            <div class="panel-body">
                <canvas id="lineChart" style="height:250px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Parkings <span class="badge" id="totParkings"><?php echo count($parkings)?></span></div>
            <div class="panel-body">
                <?php 
                $color = NULL;
                foreach ($parkings as $parking) {
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
    </div>
</div>