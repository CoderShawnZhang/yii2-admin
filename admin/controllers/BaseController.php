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
    private $desktop = 'Test/test/test';

    public function index()
    {
        var_dump(1);die;
        $user = \Yii::$app->getUser();
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            $this->redirect([$this->desktop]);
        }
    }
}