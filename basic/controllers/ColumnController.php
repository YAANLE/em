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
class  ColumnController extends Controller
{

    function actionAddColumn()
    {
        $ColumnModel = new  Column();
        $ColumnModel->directoryCode = 4;
        $ColumnModel->columnName = "asdfadsfa";
        $ColumnModel->columnNotation = "2";

        if ($ColumnModel->validate()) {

            if (Directory::findOne($ColumnModel->directoryCode) != null) {
                if (mb_strlen($ColumnModel->columnName <= 255)) {
                    $ColumnModel->insert();

                    print_r("插入成功！");
                } else {
                    print_r("字数大于255！");
                }
            } else {
                print_r("所属目录不存在！");
            }

        } else {
            print_r("请输入相关数据");
        }

    }

    function actionDeleteColumn($DeleteColumn)
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

    //修改
    function actionUpdateColumn()
    {
        $ColumnModel = new  Column();
        $ColumnModel->id;
        $ColumnModel->directoryCode = 5;
        $NewColumnName = "擦擦擦";
        $NewColumnNotation = "";
        $DirectoryCode = Directory::findOne($ColumnModel->directoryCode);
        if (!empty($DirectoryCode)) {
            $ColumnModel->columnName = $NewColumnName;
            $ColumnModel->columnNotation = $NewColumnNotation;
            $DirectoryCode->save();
            print_r("修改成功！");

        } else {

            print_r("没有找到该目录");
        }


    }

}