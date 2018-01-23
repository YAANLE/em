<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 20:12
 */
namespace  app\controllers;

use app\models\Coverinfo;
use app\models\Magazine;
use yii\web\Controller;

/**
 * 杂志封面发布
 * Class _CoverInfoController
 * @package app\controllers
 */
class  CoverInfoController extends  Controller{

    /**
     * 添加杂志封面演示
     */
    function  actionAddCover(){


        $model = new Coverinfo();

        //先验证#model 收到的数据
        //if ($model->load(Yii::$app->request->post()) && $model->validate()){

            //首先验证所属杂志是否存在于数据库
           // $model->magazineCode;

        //假定前台传值的杂志外键为1，则根据此id进行外键关联查询；
        $model->magazineCode=1;
        $model->coverTitle="大话西游2";
        $model->coverImgUrl="img.jpg";
        $model->coverPublishedInfo="广西斌哥哥出版社";

        $MagazineModel=Magazine::findOne($model->magazineCode);

        //判断外键是否存在，如存在则进行数据校验；否则进行相关提示
        if($MagazineModel == null){
            print_r("不可添加，所属杂志为空");die;
        }else{
            //print_r($MagazineModel->magazineTitle); die;

            $model->insert();
            print_r("添加成功");



        }




      //  }


    }
}