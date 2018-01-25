<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:01
 */

namespace app\controllers;

use app\models\Magazine;
use yii\web\Controller;
use yii\web\Response;

/**
 * 杂志控制器
 * Class AdminController
 * @package app\controllers
 */
class  MagazineController extends BaseController
{

    /**
     *
     */
    function actionAddTitle()
    {
        $MagazineModel = new Magazine();
        $MagazineModel->magazineTitle = "《xxxsss》";
        //验证$MagazineModel->magazineTitle

        if (!empty($MagazineModel->magazineTitle)) {
            if (mb_strlen($MagazineModel->magazineTitle, 'utf8') <= 255) {
                $MagazineModel->insert();
                print_r("插入成功！！");
                die();
            } else {
                print_r("标题大于255！");
                die();
            }
        } else {
            print_r("标题为空！");
            die();
        }
    }

    /**
     * @throws 杂志删除方法
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    function actionDeleteMagazine()
    {
        $model = new Magazine();
        $model->id = 0;
        if (empty($model->id)) {
            print_r("id为空！");
            die();
        } else {
            if (Magazine::findOne($model->id)) {
                Magazine::findOne($model->id)->delete();
                print_r("删除成功！");
                die();
            } else {
                print_r("没找到id");
                die();
            }
        }
    }

    /**
     * 杂志编辑
     */
    function actionEditMagazine()
    {
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format=Response::FORMAT_JSON;

        $model = new Magazine();
        $model->id = 7;
        $model=Magazine::findOne($model->id);
        if (empty($model->id)) {
            print_r("杂志标题为空！");
            die();
        }else{
           $model->magazineTitle="水电费第三方4";
           $model->save();
           return ['errorCode'=>"200",'message'=>"不可修改，所属杂志为空",'list'=>$model];
       }
    }

    /**
     * 杂志搜索
     */
    function actionSelectMagazine(){
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $model =new Magazine();


    }
}