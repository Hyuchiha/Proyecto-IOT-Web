<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property string $id_record
 * @property integer $parking_id_parking
 * @property string $plaque_id_plaque
 * @property string $create_at
 * @property string $update_at
 * @property string $time_parking
 *
 * @property Parking $parkingIdParking
 * @property Plaque $plaqueIdPlaque
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parking_id_parking', 'plaque_id_plaque'], 'required'],
            [['parking_id_parking'], 'integer'],
            [['create_at', 'update_at', 'time_parking'], 'safe'],
            [['plaque_id_plaque'], 'string', 'max' => 45],
            [['parking_id_parking'], 'exist', 'skipOnError' => true, 'targetClass' => Parking::className(), 'targetAttribute' => ['parking_id_parking' => 'id_parking']],
            [['plaque_id_plaque'], 'exist', 'skipOnError' => true, 'targetClass' => Plaque::className(), 'targetAttribute' => ['plaque_id_plaque' => 'id_plaque']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_record' => Yii::t('app', 'Id Record'),
            'parking_id_parking' => Yii::t('app', 'Parking Number'),
            'plaque_id_plaque' => Yii::t('app', 'Plaque Number'),
            'create_at' => Yii::t('app', 'Occupied At'),
            'update_at' => Yii::t('app', 'Available At'),
            'time_parking' => Yii::t('app', 'Time Parking'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkingIdParking()
    {
        return $this->hasOne(Parking::className(), ['id_parking' => 'parking_id_parking']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaqueIdPlaque()
    {
        return $this->hasOne(Plaque::className(), ['id_plaque' => 'plaque_id_plaque']);
    }
}
