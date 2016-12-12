<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Parking Time per Hour of Today</div>
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
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">Parked Clients per Hour Today</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>00:00</th><th>01:00</th>
                            <th>02:00</th><th>03:00</th>
                            <th>04:00</th><th>05:00</th>
                            <th>06:00</th><th>07:00</th>
                            <th>08:00</th><th>09:00</th>
                            <th>10:00</th><th>11:00</th>
                            <th>12:00</th><th>13:00</th>
                            <th>14:00</th><th>15:00</th>
                            <th>16:00</th><th>17:00</th>
                            <th>18:00</th><th>19:00</th>
                            <th>20:00</th><th>21:00</th>
                            <th>22:00</th><th>23:00</th>
                            <th>24:00</th>
                        </tr>
                        <tr>
                            <td id="0">-</td><td id="1">-</td>
                            <td id="2">-</td><td id="3">-</td>
                            <td id="4">-</td><td id="5">-</td>
                            <td id="6">-</td><td id="7">-</td>
                            <td id="8">-</td><td id="9">-</td>
                            <td id="10">-</td><td id="11">-</td>
                            <td id="12">-</td><td id="13">-</td>
                            <td id="14">-</td><td id="15">-</td>
                            <td id="16">-</td><td id="17">-</td>
                            <td id="18">-</td><td id="19">-</td>
                            <td id="20">-</td><td id="21">-</td>
                            <td id="22">-</td><td id="23">-</td>
                            <td id="24">-</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>