<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:03
 */

namespace app\controllers;

use app\models\Magazine;
use app\models\User;
use yii\web\Controller;
use yii\web\Response;

/**
 * 用户控制器
 * Class AdminController
 * @package app\controllers
 */
class  UserController extends BaseController
{
    /*
     * 添加用户
     */
    function actionAddUser()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $UserModel = new User();
        date_default_timezone_set('PRC');
        $UserModel->createTime = date("Y/m/d/H/i/s");
        $UserModel->userName = "李四";
        $UserModel->password = "123";
        $UserModel->salt = "23";
        $UserModel->email = "12346";
        if (empty($UserModel->userName)) {
            print_r("用户名为空，请输入！");
        } else {

            $UserModel->insert();
            return ['errorCode' => "200", 'message' => "恭喜你注册成功！", 'list' => $UserModel];

        }

//            if (empty($UserModel->password)) {
//                print_r("密码为空，请输入！");
//                if(empty($UserModel->salt)){
//                    print_r("密码为空，请输入！");
//                }
    }


    /*zy
     * 用户删除
     */
    function actionDeleteUser()
    {
        $UserModel = new User();
        $UserModel->id = 3;
        if (empty($UserModel->id)) {
            print_r("id为空！");
        }else{
            if(User::findOne($UserModel->id)){
                User::findOne($UserModel->id)->delete();
                print_r("删除成功！");die();
            }else{
                print_r("找不到id");die();
            }
        }
    }

    /**
     * 用户修改
     */
    function actionUpdeta(){
        $UserModel= new User();

//        if(){
//
//        }
    }
}