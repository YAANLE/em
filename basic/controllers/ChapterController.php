<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:02
 */

namespace app\controllers;

use app\models\Chapter;
use app\models\Column;
use yii\web\Controller;

/**
 * 章节控制器
 * Class AdminController
 * @package app\controllers
 */
class  ChapterController extends BaseController
{

    /**
     *@牙牙乐
     *2018/1/26 0026
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddChapter()

    {
        $ChapterModel = new Chapter();

        $ChapterModel->columnCode = 3;
        $ChapterModel->chapterName = "jkdasjdj";
        $ChapterModel->chapterNotation = "sadsdsda";
        $Code = Column::findOne($ChapterModel->columnCode);
        if ($ChapterModel->validate()) {
            if (!empty($Code)) {
                if (mb_strlen($ChapterModel->chapterName, 'utf8') <= 255) {
                    $ChapterModel->insert();
                    print_r("插入成功");
                } else {
                    print_r("数据大于255");

                }
            } else {
                print_r("找不到相关的栏目");
            }

        } else {

            print_r("请输入相关数据");

        }


    }
}