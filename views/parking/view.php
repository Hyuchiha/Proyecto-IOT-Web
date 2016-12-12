<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Parking */

$this->title = $model->id_parking;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parkings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-view">

    <h1>Parking Number: <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_parking',
            'min_time',
            'max_time',
            'average_time',
            'current_status',
        ],
    ]) ?>
    
    <br>
    <h2>Record of Parking #<?= Html::encode($this->title) ?></h2>
    
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id_record',
            'create_at',
            'update_at',
            'time_parking',
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

</div>
