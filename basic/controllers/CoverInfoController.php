<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/22
 * Time: 20:12
 */

namespace app\controllers;

use app\models\Coverinfo;
use app\models\Magazine;
use yii\web\Controller;
use yii\web\Response;

/**
 * 杂志封面发布
 * Class _CoverInfoController
 * @package app\controllers
 */
class  CoverInfoController extends BaseController
{

    /**
     * 添加杂志封面演示
     */
    /**
     *@牙牙乐
     *2018/1/26 0026
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddCover()
    {


        $model = new Coverinfo();
        $model->magazineCode = 1;
        $model->coverTitle = "大话西游3";
        $model->coverImgUrl = "img.jpg";
        $model->coverPublishedInfo = "广西斌哥哥出版社";
        //先验证#model 收到的数据，
//        if ($model->load(Yii::$app->request->post()) && $model->validate()){
        if ($model->validate()) {

            //假定数据验证成功，则根据此id进行外键关联查询；
            $MagazineModel = Magazine::findOne($model->magazineCode);

            //判断外键是否存在，如存在则进行数据校验；否则进行相关提示
            if ($MagazineModel == null) {
                print_r("不可添加，所属杂志为空");
                die;
            } else {
                //print_r($MagazineModel->magazineTitle); die;

                $model->insert();
                print_r("添加成功");

            }

        } else {
            print_r("请输入相关数据 ");
            die;

        }


    }


    function  actionSelect(){
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format=Response::FORMAT_JSON;

        $CoverinfoModel=Coverinfo::find()->all();

        if ($CoverinfoModel != null){
            return ['errorCode'=>"200",'message'=>"查询成功",'list'=>$CoverinfoModel];
        }else{
            return ['errorCode'=>"500",'message'=>"查询为空"];
        }

    }


}