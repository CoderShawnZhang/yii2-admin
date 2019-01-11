<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/9
 * Time: 下午3:38
 */
namespace admin\Modules\System\Controllers;

use admin\controllers\BaseController;
use admin\Modules\System\models\SearchTags;

class TagController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new SearchTags();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        return $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}