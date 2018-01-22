<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_user}}".
 *
 * @property int $id
 * @property string $userName 用户名
 * @property string $password 密码
 * @property string $salt 盐值
 * @property string $email  电子邮箱
 * @property string $createTime 创建时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userName', 'password', 'salt', 'email'], 'required'],
            [['createTime'], 'safe'],
            [['userName', 'password', 'salt'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userName' => 'User Name',
            'password' => 'Password',
            'salt' => 'Salt',
            'email' => 'Email',
            'createTime' => 'Create Time',
        ];
    }
}
