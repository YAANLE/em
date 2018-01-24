<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:02
 */
namespace  app\controllers;

use app\models\Directory;
use app\models\Magazine;
use yii\web\Controller;

/**
 * 目录控制器
 * Class AdminController
 * @package app\controllers
 */
class  DirectoryController extends  Controller{
    /**
     * 添加杂志目录演示
     */
    function actionAddDirectory(){
        $model=new Directory();
        $model->magazineCode=2;
        $model->directoryName="魔幻";
        //先验证#model 收到的数据，
        if($model->validate()){

            //假定数据验证成功，则根据此id进行外键关联查询；
            $DirectoryModel=Magazine::findOne($model->magazineCode);

            //判断外键是否存在，如果存在则进行数据效验，否则进行相关提示
            if(!$DirectoryModel==null){
                //print_r($MagazineModel->magazineTitle); die;
                $model->insert();
                print_r("添加成功！");
            }
            else{

                print_r("不可添加，所属杂志为空!");die();

            }
        }else{
            print_r("请输入相关数据 "); die;
        }

    }
    function actionDelete()
    {
        $model = new Directory();
        $model->id =6;
        if ($model == null) {
            print_r("id为空！");die();
        }else{
            if (!empty($model->id)) {
//                Directory::findOne($model->id)->delete();
                print_r("删除成功");die();
            } else {
                print_r("id不存在");
            }
        }
    }
}