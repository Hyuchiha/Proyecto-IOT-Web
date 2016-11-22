<?php

namespace app\controllers;

use Yii;
use app\models\Record;
use app\models\RecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecordController implements the CRUD actions for Record model.
 */
class RecordController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Record models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Record model.
     * @param string $id_record
     * @param integer $parking_id_parking
     * @param string $plaque_id_plaque
     * @return mixed
     */
    public function actionView($id_record, $parking_id_parking, $plaque_id_plaque)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_record, $parking_id_parking, $plaque_id_plaque),
        ]);
    }

    /**
     * Creates a new Record model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Record();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_record' => $model->id_record, 'parking_id_parking' => $model->parking_id_parking, 'plaque_id_plaque' => $model->plaque_id_plaque]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Record model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_record
     * @param integer $parking_id_parking
     * @param string $plaque_id_plaque
     * @return mixed
     */
    public function actionUpdate($id_record, $parking_id_parking, $plaque_id_plaque)
    {
        $model = $this->findModel($id_record, $parking_id_parking, $plaque_id_plaque);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_record' => $model->id_record, 'parking_id_parking' => $model->parking_id_parking, 'plaque_id_plaque' => $model->plaque_id_plaque]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Record model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_record
     * @param integer $parking_id_parking
     * @param string $plaque_id_plaque
     * @return mixed
     */
    public function actionDelete($id_record, $parking_id_parking, $plaque_id_plaque)
    {
        $this->findModel($id_record, $parking_id_parking, $plaque_id_plaque)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Record model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_record
     * @param integer $parking_id_parking
     * @param string $plaque_id_plaque
     * @return Record the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_record, $parking_id_parking, $plaque_id_plaque)
    {
        if (($model = Record::findOne(['id_record' => $id_record, 'parking_id_parking' => $parking_id_parking, 'plaque_id_plaque' => $plaque_id_plaque])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
