<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:02
 */

namespace app\controllers;

use app\models\Admin;
use app\models\Chapter;
use app\models\Chaptercontent;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * 章节内容控制器
 * Class AdminController
 * @package app\controllers
 */
class  ChapterContentController extends BaseController
{
    /**
     *@牙牙乐
     *2018/1/26 16:56
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddChapterContent()
    {
        $ContentModel = new Chaptercontent();
        $ContentModel->chapterCode = 1;
        $ContentModel->editAdmin = 1;

        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->isPost) {
            //获取前台ajax数据 并进行数据验证
            if ( $ContentModel->load(Yii::$app->request->post()) &&  $ContentModel->validate()) {

                $results =  $ContentModel->insert();

                if ($results) {
                    return ['errorCode' => "200", 'message' => "添加成功"];
                } else {
                    return ['errorCode' => "200", 'message' => "添加失败,请重试"];
                }


            } else {
                if (mb_strlen( $ContentModel->directoryName, 'utf8') > 255) return ['errorCode' => "500", 'message' => "数据长度超出范围"];
                return ['errorCode' => "500", 'message' => "请输入数据"];
            }
        }else{
            return ['errorCode' => "500", 'message' => "非POST请求"];
        }

    }
}