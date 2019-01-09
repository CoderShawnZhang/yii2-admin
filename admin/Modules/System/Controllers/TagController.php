<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/9
 * Time: 下午3:38
 */
namespace admin\Modules\System\Controllers;

use admin\controllers\BaseController;

class TagController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}