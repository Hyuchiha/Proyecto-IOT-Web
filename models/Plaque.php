<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plaque".
 *
 * @property string $idplaque
 * @property string $file
 *
 * @property History[] $histories
 */
class Plaque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plaque';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idplaque', 'file'], 'required'],
            [['idplaque'], 'string', 'max' => 45],
            [['file'], 'string', 'max' => 255],
            [['file'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idplaque' => Yii::t('app', 'Idplaque'),
            'file' => Yii::t('app', 'File'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['plaque_idplaque' => 'idplaque']);
    }
}
