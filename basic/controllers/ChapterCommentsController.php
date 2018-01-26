<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:03
 */

namespace app\controllers;

use app\models\Chaptercomments;
use app\models\Chaptercontent;
use app\models\User;
use Faker\Provider\DateTime;
use yii\web\Controller;
use yii\web\Response;

/**
 * 章节评论控制器
 * Class AdminController
 * @package app\controllers
 */
class  ChapterCommentsController extends BaseController
{
    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @return array
     */
    function actionSelectChapterComments()
    {
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $ChaptercommentsModel = new Chaptercomments();
        $ChaptercommentsModel->id = 12;
        if ($ChaptercommentsModel->id != null && $ChaptercommentsModel->id >= 0) {
            $ChaptercommentsModel=Chaptercomments::findOne($ChaptercommentsModel->id);
            if($ChaptercommentsModel != null){
                return ['errorCode' => "200", 'message' => "查询成功", 'list' => Chaptercomments::find()->where(['id' => $ChaptercommentsModel->id])->one()];
            }else{
                return ['errorCode' => "500", 'message' => "对象不存在"];
            }
        } else {
            return ['errorCode' => "500", 'message' => "查询失败！"];
        }
    }

    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @return array
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddChapterComments()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $ChaptercommentsModel = new Chaptercomments();
        date_default_timezone_get('PRC');
        $ChaptercommentsModel->user = 1;
        $ChaptercommentsModel->chapterContentCode = 1;
        $ChaptercommentsModel->CommentsContent = "百度god发嘎算法";
        $ChaptercommentsModel->createTime = date("Y/m/d/H/i/s");
        if ($ChaptercommentsModel->validate()) {
            if (User::findOne($ChaptercommentsModel->user) && Chaptercontent::findOne($ChaptercommentsModel->chapterContentCode)) {
                $ChaptercommentsModel->insert();
                return ['errorCode' => "200", 'message' => "插入成功"];
            } else {
                return ['errorCode' => "500", 'message' => "插入失败,user或chapterContentCode不存在！"];
            }
        } else {
            return ['errorCode' => "500", 'message' => "user或chapterContentCode输入错误"];
        }
    }

    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @return array
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    function actionDeleteChapterComments()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $ChaptercommentsModel = new Chaptercomments();
        $ChaptercommentsModel->id ="a0";

        if ($ChaptercommentsModel->id != null && $ChaptercommentsModel->id >= 0) {

            //判断是否存在，或者是已经被删除
            $ChaptercommentsModel = Chaptercomments::findOne($ChaptercommentsModel->id);
            if ($ChaptercommentsModel != null) {
                Chaptercomments::findOne($ChaptercommentsModel->id)->delete();
                return ['errorCode' => "200", 'message' => "删除成功"];
            }else{
                return ['errorCode' => "500", 'message' => "对象不存在"];
            }
        } else {
            return ['errorCode' => "500", 'message' => "删除失败"];
        }
    }
}