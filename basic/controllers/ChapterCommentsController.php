<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 10:03
 */
namespace  app\controllers;

use app\models\Chaptercomments;
use Faker\Provider\DateTime;
use yii\web\Controller;
use yii\web\Response;

/**
 * 章节评论控制器
 * Class AdminController
 * @package app\controllers
 */
class  ChapterCommentsController extends  BaseController{
    /*
     *查询内容评论
     */
    function actionSelectChapterComments(){
        //代码中添加返回头信息,以j'son的形式返回
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $dasd = new Chaptercomments();
//        date_default_timezone_set('PRC');
//        $dasd->createTime=date("Y/m/d/H/i/s");
        $dasd->user=0;
        $dasd->chapterContentCode=0;
//        $dasd->insert();

       if(!empty($dasd->user)&&empty($dasd->chapterContentCode)){

           print_r("user或chapterContentCode为空！");die();

      }else{
           if(empty($dasd->id)){
               return ['errorCode'=>"200",'message'=>"不可修改，所属杂志为空",'list'=>Chaptercomments::find()->where(['chapterContentCode'=>1])->all()];
               die();
           }else{
               print_r("找不到id");die();
           }
        }
    }
}