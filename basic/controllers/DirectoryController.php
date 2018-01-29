<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:02
 */

namespace app\controllers;

use app\models\Directory;
use app\models\Magazine;
use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * 目录控制器
 * Class AdminController
 * @package app\controllers
 */
class  DirectoryController extends BaseController
{

    /**
     *@牙牙乐
     *2018/1/26 0026
     * @throws \Exception
     * @throws \Throwable
     */

    function actionAddDirectory()
    {
        $DirectoryMode = new Directory();
        $DirectoryMode->magazineCode = 1;

        \Yii::$app->response->format = Response::FORMAT_JSON;


        if (Yii::$app->request->isPost) {
            //获取前台ajax数据 并进行数据验证
            if ($DirectoryMode->load(Yii::$app->request->post()) && $DirectoryMode->validate()) {

                $results = $DirectoryMode->insert();

                if ($results) {
                    return ['errorCode' => "200", 'message' => "添加成功"];
                } else {
                    return ['errorCode' => "200", 'message' => "添加失败,请重试"];
                }


            } else {
                if (mb_strlen($DirectoryMode->directoryName, 'utf8') > 255) return ['errorCode' => "500", 'message' => "数据长度超出范围"];
                return ['errorCode' => "500", 'message' => "请输入数据"];
            }
        }else{
            return ['errorCode' => "500", 'message' => "非POST请求"];
        }

    }

    function actionDeleteDirectory()
    {
        $directoryMode = new Directory();
        $directoryMode->id = 4;
        if (empty($directoryMode->id)) {
            print_r("ID不能为空！");
            die();

        } else {
            if (Directory::findOne($directoryMode->id)) {
                Directory::findOne($directoryMode->id)->delete();

                print_r("删除成功！");
                die();
            } else {
                print_r("未找到该ID！");
                die();
            }
        }

    }

//修改
    function actionUpdateDirectory()
    {
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $directoryModel = new Directory();
        $directoryModel->id = 6;
        $directoryModel = Directory::findOne($directoryModel->id);
        if (empty($directoryModel->id)) {

            print_r("未找到该ID！");

        } else {
//           var_dump( Directory::findOne($directoryMode->id));

            // print_r($directoryModel->directoryName);//查看原先的内容
            //修改过程
            $directoryModel->directoryName = "jlll";
            // $directoryMode->directoryName=$NewDirectoryName;
            //修改之后保存保存
            $directoryModel->save();
            //  print_r("修改成功");
            return ['errorCode' => "200", 'message' => "不可添加，所属杂志为空", 'list' => $directoryModel];

        }

    }

    //查询
    function actionSelectDirectory()
    {
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $DirectoryModel = new Directory();
        $MagazineCode = 1;
        //判断Magazine表 有没有对应的ID
        $MagazineModel = Magazine::findOne($MagazineCode);
        //判断Directory表有没有对应的MagazineCode
        $Magazine_Code = Directory::find()->where(['magazineCode' => $MagazineCode])->all();

        if ($MagazineModel != null && $Magazine_Code != null) {
            //  print_r("不为空");
            print_r($DirectoryModel->magazineCode);
            return ['errorCode' => "200", 'message' => "", 'list' => $Magazine_Code];
        } else {
            print_r("没有对应的栏目");
        }


    }


}
