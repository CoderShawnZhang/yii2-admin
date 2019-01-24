<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/18
 * Time: 下午2:20
 */
namespace admin\Modules\Price\Controllers;

use Service\Price\EarnestPrice as EarnestPriceService;

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
        $searchModal = EarnestPriceService::earnest()->searchModal();
        $dataProvider = $searchModal->dataProvider();
        return $this->renderAjax('list',['dataProvider' => $dataProvider]);
    }
}