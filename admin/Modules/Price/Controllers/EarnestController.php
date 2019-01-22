<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/18
 * Time: 下午2:20
 */
namespace admin\Modules\Price\Controllers;

class EarnestController extends \admin\controllers\BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views/Price/Earnest';
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        return $this->renderAjax('list');
    }
}