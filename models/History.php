<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property string $idhistory
 * @property integer $parking_idparking
 * @property string $plaque_idplaque
 * @property string $create_at
 * @property string $update_at
 * @property string $time_parking
 *
 * @property Parking $parkingIdparking
 * @property Plaque $plaqueIdplaque
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parking_idparking', 'plaque_idplaque'], 'required'],
            [['parking_idparking'], 'integer'],
            [['create_at', 'update_at', 'time_parking'], 'safe'],
            [['plaque_idplaque'], 'string', 'max' => 45],
            [['parking_idparking'], 'exist', 'skipOnError' => true, 'targetClass' => Parking::className(), 'targetAttribute' => ['parking_idparking' => 'idparking']],
            [['plaque_idplaque'], 'exist', 'skipOnError' => true, 'targetClass' => Plaque::className(), 'targetAttribute' => ['plaque_idplaque' => 'idplaque']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idhistory' => Yii::t('app', 'Idhistory'),
            'parking_idparking' => Yii::t('app', 'Parking Idparking'),
            'plaque_idplaque' => Yii::t('app', 'Plaque Idplaque'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'time_parking' => Yii::t('app', 'Time Parking'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkingIdparking()
    {
        return $this->hasOne(Parking::className(), ['idparking' => 'parking_idparking']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaqueIdplaque()
    {
        return $this->hasOne(Plaque::className(), ['idplaque' => 'plaque_idplaque']);
    }
}
