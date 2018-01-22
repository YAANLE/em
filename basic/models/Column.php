<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_column}}".
 *
 * @property int $id 序号
 * @property int $directoryCode 所属目录
 * @property string $columnName 栏目名称
 * @property string $columnNotation 栏目批注
 */
class Column extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_column}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['directoryCode', 'columnName'], 'required'],
            [['directoryCode'], 'integer'],
            [['columnName', 'columnNotation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'directoryCode' => 'Directory Code',
            'columnName' => 'Column Name',
            'columnNotation' => 'Column Notation',
        ];
    }
}
