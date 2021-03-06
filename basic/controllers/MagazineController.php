<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:01
 */

namespace app\controllers;

use app\models\Magazine;
use Yii;
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
     * @author 伍锐保
     * @date 2018/1/29
     * @throws \Exception
     * @throws \Throwable
     */
    function actionAddTitle()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $MagazineModel = new Magazine();

        if (Yii::$app->request->isPost) {
            //获取前台ajax数据 并进行数据验证
            if ($MagazineModel->load(Yii::$app->request->post()) && $MagazineModel->validate()) {

                $results = $MagazineModel->insert();

                if ($results) {
                    return ['errorCode' => "200", 'message' => "添加成功"];
                } else {
                    return ['errorCode' => "200", 'message' => "添加失败,请重试"];
                }


            } else {
                if (mb_strlen($MagazineModel->magazineTitle, 'utf8') > 255) return ['errorCode' => "500", 'message' => "数据长度超出范围"];
                return ['errorCode' => "500", 'message' => "请输入数据"];
            }
        }else{
            return ['errorCode' => "500", 'message' => "非POST请求"];
        }



    }


    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    function actionDeleteMagazine()
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $MagazineModel = new Magazine();
        $MagazineModel->id = 12;
        if ($MagazineModel->id != null && $MagazineModel->id >= 0) {
            $MagazineModel=Magazine::findOne($MagazineModel->id);
            if ($MagazineModel != null) {
                Magazine::findOne($MagazineModel->id)->delete();
                return ['errorCode'=>"200",'message'=>"删除成功！"];
            } else {
                return ['errorCode'=>"500",'message'=>"对象不存在"];
            }
        }else{
            return ['errorCode'=>"500",'message'=>"删除失败"];
        }
    }

    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @return array
     */
    function actionEditMagazine()
    {
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format=Response::FORMAT_JSON;

        $MagazineModel = new Magazine();
        $MagazineModel->id = 2;
        $MagazineModel=Magazine::findOne($MagazineModel->id);
        if (empty($MagazineModel->id)) {
            print_r("杂志标题为空！");
            die();
        }else{
            $MagazineModel->magazineTitle="《记录片》";
            $MagazineModel->save();
           return ['errorCode'=>"200",'message'=>"修改成功",'list'=>$MagazineModel];
       }
    }

    /**
     *＠create 劳有豪
     * @date 2018/1/26
     * @return array
     */
    function actionSelectMagazine(){
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $MagazineModel =new Magazine();
        $MagazineModel->id=-1;
        if($MagazineModel->id != null && $MagazineModel->id >= 0){
            $MagazineModel=Magazine::findOne($MagazineModel->id);
            if($MagazineModel != null){
                return ['errorCode'=>"200",'message'=>'查询成功','list'=>$MagazineModel=Magazine::find()->where(['id'=>$MagazineModel->id])->one()];
            }else{
                return ['errorCode'=>"500",'message'=>"对象不存在"];
            }
        }else{
            return ['errorCode'=>"500",'message'=>"查询失败"];
        }

    }
}