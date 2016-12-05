<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Json;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Parking;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::className(),
            'only' => ['logout'],
            'rules' => [
            [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
        ],
            [
            'actions' => ['dashboard'],
            'allow' => true,
            'roles' => ['@'],
        ],
        ],
        ],
            'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
            'logout' => ['post'],
        ],
        ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
            'class' => 'yii\web\ErrorAction',
        ],
            'captcha' => [
            'class' => 'yii\captcha\CaptchaAction',
            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        return $this->redirect(Url::to(['site/dashboard']));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['site/dashboard']));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Url::to(['site/dashboard']));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays dashboard page.
     *
     * @return string
     */
    public function actionDashboard()
    {
        $parkings = new Parking();
        $parkings = $parkings->getParkings();

        return $this->render('dashboard', [
            'parkings' => $parkings,
        ]);
    }

    public function actionParkings()
    {
        $parkings = new Parking();
        $parkings = $parkings->getParkings();
        $statusParkings = array();
        foreach ($parkings as $parking) {
            if (strcmp($parking['current_status'], 'Available') == 0)
                $statusParkings[$parking['id_parking']] = 'success';
            else
                $statusParkings[$parking['id_parking']] = 'danger';
        }
        echo Json::encode($statusParkings);
    }

    public function actionGraphic()
    {
        $today = date("Y-m-d");
        $yesterday = (strtotime($today) - 3600);
        $records = Yii::$app->db->createCommand('SELECT * FROM record WHERE create_at>=:yesterday AND create_at<=:today AND update_at>create_at ORDER BY create_at ASC')
            ->bindValue(':yesterday', date("Y-m-d", $yesterday)." 23:00:00")
            ->bindValue(':today', $today." ".date("H").":00:00")
            ->queryAll();

        $minTime = 10000.0;// MM.SS
        $aveTime = 0.0;// MM.SS
        $maxTime = 0.0;// MM.SS
        $tot = 0; 
        $currentHour = 0; $hr = date("H"); $lastRecordTime = 23;
        $currentRecordTime = NULL;
        $respond = array();
        $now = [
            "minTime" => $minTime,
            "aveTime" => $aveTime,
            "maxTime" => $maxTime,
        ];
        for($h = 0; $h <= $hr; $h++) {
            $respond[$h] = $now = [
                "minTime" => 0,
                "aveTime" => $aveTime,
                "maxTime" => $maxTime,
            ];
        }
        for($i = 0; $i < count($records); $i++) {
            $record = $records[$i];
            $currentRecordDateTime = explode(' ', $record['create_at']);
            $currentRecordTime = explode(':', $currentRecordDateTime[1]);
            $time = explode(':', $record['time_parking']);
            $recordTime = (float)$time[1] + ((float)$time[2] * 0.01);
            if((int)$currentRecordTime[0] == $lastRecordTime) {
                $minTime = $this->minTime($minTime, $recordTime);
                $maxTime = $this->maxTime($maxTime, $recordTime);
                $aveTime = $this->aveTime($aveTime, $recordTime);
                $now["minTime"] = $minTime;
                $now["aveTime"] = $aveTime;
                $now["maxTime"] = $maxTime;
                $tot++;
            }else {
                $now["aveTime"] = $aveTime / $tot;
                $respond = $this->fillRespond($respond,$now,$currentHour,(int)$currentRecordTime[0]);
                //$respond[$currentHour] = $now;
                $lastRecordTime = (int)$currentRecordTime[0];
                $currentHour = (int)$currentRecordTime[0];
                $i--;
            }
            if((int)$currentRecordTime[0] == $hr) {
                $now["aveTime"] = $aveTime / $tot;
                $respond = $this->fillRespond($respond,$now,$currentHour,$hr);
            }
        }
        
        echo Json::encode($respond);
    }

    private function minTime($minTime, $recordTime){
        if($recordTime<=$minTime)
            return $recordTime;
        return $minTime;
    }

    private function maxTime($maxTime, $recordTime){
        if($recordTime>=$maxTime)
            return $recordTime;
        return $maxTime;
    }

    private function aveTime($aveTime, $recordTime){
        $average = $aveTime + $recordTime;
        return $average;
    }
    
    private function fillRespond($respond, $now, $hour, $limit){
        for(;$hour < $limit; $hour++) {
            $respond[$hour] = $now;
        }
        return $respond;
    }
    
}
