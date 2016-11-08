<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\HistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends Controller
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
     * Lists all History models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single History model.
     * @param string $idhistory
     * @param integer $parking_idparking
     * @param string $plaque_idplaque
     * @return mixed
     */
    public function actionView($idhistory, $parking_idparking, $plaque_idplaque)
    {
        return $this->render('view', [
            'model' => $this->findModel($idhistory, $parking_idparking, $plaque_idplaque),
        ]);
    }

    /**
     * Creates a new History model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new History();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idhistory' => $model->idhistory, 'parking_idparking' => $model->parking_idparking, 'plaque_idplaque' => $model->plaque_idplaque]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing History model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idhistory
     * @param integer $parking_idparking
     * @param string $plaque_idplaque
     * @return mixed
     */
    public function actionUpdate($idhistory, $parking_idparking, $plaque_idplaque)
    {
        $model = $this->findModel($idhistory, $parking_idparking, $plaque_idplaque);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idhistory' => $model->idhistory, 'parking_idparking' => $model->parking_idparking, 'plaque_idplaque' => $model->plaque_idplaque]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing History model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idhistory
     * @param integer $parking_idparking
     * @param string $plaque_idplaque
     * @return mixed
     */
    public function actionDelete($idhistory, $parking_idparking, $plaque_idplaque)
    {
        $this->findModel($idhistory, $parking_idparking, $plaque_idplaque)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idhistory
     * @param integer $parking_idparking
     * @param string $plaque_idplaque
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idhistory, $parking_idparking, $plaque_idplaque)
    {
        if (($model = History::findOne(['idhistory' => $idhistory, 'parking_idparking' => $parking_idparking, 'plaque_idplaque' => $plaque_idplaque])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
