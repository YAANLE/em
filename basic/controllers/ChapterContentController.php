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
use yii\web\Controller;

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
        $ContentModel->content = "dsads";


        if ($ContentModel->validate()) {
            //验证外键是否有效
            $Admin = Admin::findOne($ContentModel->editAdmin);

            if ($Admin != null) {
                $chapterCode = Chapter::findOne($ContentModel->chapterCode);
                if ($chapterCode != null) {

                    date_default_timezone_set('PRC');
                    $ContentModel->editTime = date("Y/m/d/H/i/s");

                    $ContentModel->insert();
                    print_r("插入成功");
                } else {
                    print_r("请重新选择所属章节.");
                }

            } else {
                print_r("请重新登录.");
            }
        } else {
            print_r("请输入相关数据");
        }
    }
}