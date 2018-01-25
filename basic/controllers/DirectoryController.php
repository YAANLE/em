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
use yii\web\Controller;
use yii\web\Response;

/**
 * 目录控制器
 * Class AdminController
 * @package app\controllers
 */
class  DirectoryController extends Controller
{


    function actionAddDirectory()
    {
        $directoryMode = new Directory();
        $directoryMode->directoryName = "诞节疯";
        $directoryMode->magazineCode = 1;

        if ($directoryMode->validate()) {
            //判断Magazine表是否有相关的ID 和 判断栏目标题是否小于255

            if (Magazine::findOne($directoryMode->magazineCode)) {

                $directoryMode->insert();
                print_r("插入成功!");
                die;
            } else {
                print_r("找不到该书!");
                die;
            }
        } else {
            print_r("请输入0~255之间的字符 ");
            die;
        }
    }

    function actionDeleteDirectory()
    {
        $directoryMode = new Directory();
        $directoryMode->id = 1;
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
    function actionUpdateDirectory(){
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format=Response::FORMAT_JSON;

        $directoryModel = new Directory();
        $directoryModel->id=6;
        $directoryModel=Directory::findOne($directoryModel->id);
        if (empty($directoryModel->id)) {



        }else{
//           var_dump( Directory::findOne($directoryMode->id));
            $directoryModel->directoryName="他是萨比";
           // $directoryMode->directoryName=$NewDirectoryName;
            $directoryModel->save();
          //  print_r("修改成功");
          return ['errorCode'=>"200",'message'=>"不可添加，所属杂志为空",'list'=>$directoryModel];

        }

    }
}