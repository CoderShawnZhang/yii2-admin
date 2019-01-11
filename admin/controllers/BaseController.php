<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/27
 * Time: 上午10:23
 */

namespace admin\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionIndex()
    {
        $user = \Yii::$app->getUser();
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            $this->redirect(['Index/index/desktop']);
        }
    }
}