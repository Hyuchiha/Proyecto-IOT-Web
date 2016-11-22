<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plaque".
 *
 * @property string $id_plaque
 * @property string $file
 *
 * @property Record[] $records
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
            [['id_plaque', 'file'], 'required'],
            [['id_plaque'], 'string', 'max' => 45],
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
            'id_plaque' => Yii::t('app', 'Plaque Number'),
            'file' => Yii::t('app', 'Photo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['plaque_id_plaque' => 'id_plaque']);
    }
}
