<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%em_coverinfo}}".
 *
 * @property int $id 序号
 * @property int $magazineCode 所属杂志
 * @property string $coverTitle 封面标题
 * @property string $coverPublishedInfo 封面出版信息
 * @property string $coverImgUrl 封面背景url
 */
class Coverinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%em_coverinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['magazineCode', 'coverTitle', 'coverPublishedInfo'], 'required'],
            [['magazineCode'], 'integer'],
            [['coverTitle', 'coverPublishedInfo', 'coverImgUrl'], 'string', 'max' => 255],
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
            'coverTitle' => 'Cover Title',
            'coverPublishedInfo' => 'Cover Published Info',
            'coverImgUrl' => 'Cover Img Url',
        ];
    }
}
