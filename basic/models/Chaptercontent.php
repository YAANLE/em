<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_chaptercontent}}".
 *
 * @property int $id 序号
 * @property int $chapterCode 所属章节
 * @property int $editAdmin 编辑人
 * @property string $content 章节内容
 * @property string $editTime 编辑时间
 */
class Chaptercontent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_chaptercontent}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chapterCode', 'editAdmin', 'content'], 'required'],
            [['chapterCode', 'editAdmin'], 'integer'],
            [['content'], 'string'],
            [['editTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chapterCode' => 'Chapter Code',
            'editAdmin' => 'Edit Admin',
            'content' => 'Content',
            'editTime' => 'Edit Time',
        ];
    }
}
