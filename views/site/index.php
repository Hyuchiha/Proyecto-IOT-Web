<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <div class="cover">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>SmartParking</h1>
                    <p>Administre su estacionamente de manera inteligente.</p>
                    <br>
                    <br>
                    <?= Html::a('Iniciar Sesión', ['site/login'], ['class' => 'btn btn-info btn-lg']) ?>
                    <?= Html::a('Registrar Usuario', ['user/create'], ['class' => 'btn btn-lg btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?= Html::img('@web/pics/snip_20161211204517.png', ['class' => 'img-responsive']) ?>
                </div>
                <div class="col-md-6">
                    <h1>Dashboard en tiempo real</h1>
                    <h3>Gráfica y lugares</h3>
                    <p>Visualiza en tiempo real los tiempos de tu estacionamiento así como los
                        lugares disponibles y ocupados para que puedas tomar desiciones inmediatas.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?= Html::img('@web/pics/snip_20161211205939.png', ['class' => 'center-block img-responsive']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Registros</h1>
                    <h3>De cada lugar</h3>
                    <p>Mira los registros totales de los lugares en que se han estacionado, así
                        como el de cada uno de los lugares</p>
                </div>
                <div class="col-md-6">
                    <?= Html::img('@web/pics/snip_20161211210352.png', ['class' => 'img-responsive']) ?>
                </div>
            </div>
        </div>
    </div>
</div>