<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parking".
 *
 * @property integer $idparking
 * @property string $min_time
 * @property string $max_time
 * @property string $average_time
 *
 * @property History[] $histories
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
            [['idparking', 'min_time', 'max_time', 'average_time'], 'required'],
            [['idparking'], 'integer'],
            [['min_time', 'max_time', 'average_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idparking' => Yii::t('app', 'Idparking'),
            'min_time' => Yii::t('app', 'Min Time'),
            'max_time' => Yii::t('app', 'Max Time'),
            'average_time' => Yii::t('app', 'Average Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['parking_idparking' => 'idparking']);
    }
}
