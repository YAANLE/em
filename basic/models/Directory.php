<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_directory}}".
 *
 * @property int $id 序号
 * @property int $magazineCode 所属杂志
 * @property string $directoryName 目录名称
 */
class Directory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_directory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['magazineCode', 'directoryName'], 'required'],
            [['magazineCode'], 'integer'],
            [['directoryName'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'magazineCode' => 'Magazine Code',
            'directoryName' => 'Directory Name',
        ];
    }
}
