<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_magazine}}".
 *
 * @property int $id 序号
 * @property string $magazineTitle 杂志标题
 */
class Magazine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_magazine}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['magazineTitle'], 'required'],
            [['magazineTitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'magazineTitle' => 'Magazine Title',
        ];
    }
}
