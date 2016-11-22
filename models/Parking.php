<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parking".
 *
 * @property integer $id_parking
 * @property string $min_time
 * @property string $max_time
 * @property string $average_time
 * @property integer $current_status
 *
 * @property Record[] $records
 */
class Parking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parking'], 'required'],
            [['id_parking', 'current_status'], 'integer'],
            [['min_time', 'max_time', 'average_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parking' => Yii::t('app', 'Parking Number'),
            'min_time' => Yii::t('app', 'Min Time'),
            'max_time' => Yii::t('app', 'Max Time'),
            'average_time' => Yii::t('app', 'Average Time'),
            'current_status' => Yii::t('app', 'Current Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['parking_id_parking' => 'id_parking']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParkings()
    {
        return $this->find()->all();
    }
}
