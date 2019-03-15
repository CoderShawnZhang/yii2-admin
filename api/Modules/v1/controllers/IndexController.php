<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 下午2:24
 */
namespace api\Modules\v1\controllers;

use common\models\User;
use api\common\controllers\BaseController;

class IndexController extends BaseController
{
    public function actionIndexa1()
    {
        echo \Yii::getAlias('@api/runtime');die;
        echo \Yii::getAlias('runtime');die;
       return User::findOn1e(['id'=>1]);
    }

    public function actionIndexb()
    {
        return ['a'=>123];
    }
}