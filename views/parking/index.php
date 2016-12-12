<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ParkingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Parkings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_parking',
            'min_time',
            'max_time',
            'average_time',
            'current_status',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => [
                    'view' => function ($model, $key, $index) {
                        return true;
                    },
                    'update' => function ($model, $key, $index) {
                        return false;
                    },
                    'delete' => function ($model, $key, $index) {
                        return false;
                    }
                ]
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
