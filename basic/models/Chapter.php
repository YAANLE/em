<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_chapter}}".
 *
 * @property int $id 序号
 * @property int $columnCode 所属栏目
 * @property string $chapterName 章节名称
 * @property string $chapterNotation 章节批注
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_chapter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['columnCode', 'chapterName'], 'required'],
            [['columnCode'], 'integer'],
            [['chapterName', 'chapterNotation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'columnCode' => 'Column Code',
            'chapterName' => 'Chapter Name',
            'chapterNotation' => 'Chapter Notation',
        ];
    }
}
