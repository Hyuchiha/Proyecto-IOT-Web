<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $username
 * @property string $hash_password
 * @property string $email
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'hash_password', 'email'], 'required'],
            [['hash_password'], 'required', 'except' => ['update']],
            [['username', 'email'], 'string', 'max' => 128],
            [['hash_password'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'hash_password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
        ];
    }
}
