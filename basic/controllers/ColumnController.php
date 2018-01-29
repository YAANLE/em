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
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * 栏目控制器
 * Class AdminController
 * @package app\controllers
 */
class  ColumnController extends BaseController
{
    /**
     *@牙牙乐
     *2018/1/26 0026
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddColumn()
    {
        $ColumnModel = new  Column();
        $ColumnModel->directoryCode = 5;

        \Yii::$app->response->format = Response::FORMAT_JSON;


        if (Yii::$app->request->isPost) {
            //获取前台ajax数据 并进行数据验证
            if ($ColumnModel->load(Yii::$app->request->post()) && $ColumnModel->validate()) {

                $results = $ColumnModel->insert();

                if ($results) {
                    return ['errorCode' => "200", 'message' => "添加成功"];
                } else {
                    return ['errorCode' => "200", 'message' => "添加失败,请重试"];
                }


            } else {
                if (mb_strlen($$ColumnModel->magazineTitle, 'utf8') > 255) return ['errorCode' => "500", 'message' => "数据长度超出范围"];
                return ['errorCode' => "500", 'message' => "请输入数据"];
            }
        }else{
            return ['errorCode' => "500", 'message' => "非POST请求"];
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