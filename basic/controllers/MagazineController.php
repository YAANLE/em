<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:01
 */
namespace  app\controllers;

use app\models\Magazine;
use yii\web\Controller;

/**
 * 杂志控制器
 * Class AdminController
 * @package app\controllers
 */
class  MagazineController extends  Controller{
    function actionDeleteMagazine(){
        $model=new Magazine();
        $model->id=6;
        if(!$model==null){
            if ($model->id){
                Magazine::findOne($model->id)->delete();
                print_r("删除成功！");die();
            }
            else{
                print_r("没找到id");die();
            }
        }
        else
        {
            print_r("id为空");die();
        }
    }
}