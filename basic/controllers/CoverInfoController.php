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
use Yii;
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


        $CoverInfoModel = new Coverinfo();
        $CoverInfoModel->magazineCode = 1;
        $CoverInfoModel->coverImgUrl = "img.jpg";

        \Yii::$app->response->format = Response::FORMAT_JSON;


        if (Yii::$app->request->isPost) {
            //获取前台ajax数据 并进行数据验证
            if ($CoverInfoModel->load(Yii::$app->request->post()) && $CoverInfoModel->validate()) {

                $results = $CoverInfoModel->insert();

                if ($results) {
                    return ['errorCode' => "200", 'message' => "添加成功"];
                } else {
                    return ['errorCode' => "200", 'message' => "添加失败,请重试"];
                }


            } else {
                if (mb_strlen($CoverInfoModel->magazineTitle, 'utf8') > 255) return ['errorCode' => "500", 'message' => "数据长度超出范围"];
                return ['errorCode' => "500", 'message' => "请输入数据"];
            }
        }else{
            return ['errorCode' => "500", 'message' => "非POST请求"];
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