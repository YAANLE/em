<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_chaptercomments}}".
 *
 * @property int $id
 * @property int $user 评论者
 * @property int $chapterContentCode 所评章节
 * @property string $CommentsContent 评论内容
 * @property string $createTime  评论时间
 */
class Chaptercomments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_chaptercomments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'chapterContentCode', 'CommentsContent'], 'required'],
            [['user', 'chapterContentCode'], 'integer'],
            [['CommentsContent'], 'string'],
            [['createTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'chapterContentCode' => 'Chapter Content Code',
            'CommentsContent' => 'Comments Content',
            'createTime' => 'Create Time',
        ];
    }
}
