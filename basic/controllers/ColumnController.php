<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:02
 */

namespace app\controllers;

use app\models\Column;
use app\models\Directory;
use yii\web\Controller;

/**
 * 栏目控制器
 * Class AdminController
 * @package app\controllers
 */
class  ColumnController extends BaseController
{

    function actionAddColumn()
    {
        $ColumnModel = new  Column();
        $ColumnModel->directoryCode = 4;
        $ColumnModel->columnName = "asdfadsfa";
        $ColumnModel->columnNotation = "2";

        if ($ColumnModel->validate()) {

            if (Directory::findOne($ColumnModel->directoryCode)) {
                $ColumnModel->insert();

                print_r("插入成功！");
            } else {
                print_r("所属目录不存在！");
            }
        } else {
            print_r("数据超出范围！");
        }

    }

    function actionDeleteColumn()
    {
        $ColumnModel = new  Column();
        $ColumnModel->id = 1;

        if (empty($ColumnModel->id)) {
            //id为空或者为0
            // var_dump(empty($ColumnModel->id));
            print_r("ID不能为空！");
            die();

        } else {

            if (Column::findOne($ColumnModel->id)) {
                //Column表中有对应的ID
                Column::findOne($ColumnModel->id)->delete();
                print_r("删除成功！");
                die();

            } else {
                //Column表中没有对应的ID
                print_r("未找到该ID！");
                die();
            }

        }

    }


}