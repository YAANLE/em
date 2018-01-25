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

    /**
     *
     */
    function actionAddTitle(){
        $MagazineModel=new Magazine();
        $MagazineModel->magazineTitle="啛啛喳喳错";
       //验证$MagazineModel->magazineTitle

        if(!empty($MagazineModel->magazineTitle)){
            if(mb_strlen($MagazineModel->magazineTitle,'utf8') <= 255){
                    $MagazineModel->insert();
                print_r("插入成功！！");die();
            }else{
                print_r("标题大于255！");die();
            }
        }else{
            print_r("标题为空！");die();
        }
    }


}