<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 16:15
 */

namespace  app\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Controller;


/**
 * 此类设置跨域请求
 * Class BaseController
 * @package app\controllers
 */
class BaseController extends  Controller{

    public $enableCsrfValidation = false;//关闭csrf拦截
    public function behaviors()
    {
        return ArrayHelper::merge(
            [['class' => Cors::className(),],], parent::behaviors());//开启跨域
    }


}