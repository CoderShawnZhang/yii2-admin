<?php
namespace admin\Modules\Index\Controllers;

use admin\controllers\BaseController;
use admin\Modules\Index\models\SearchOrder;
use yii\web\Response;
use Service\Index\Index as IndexService;
use Yii;

class IndexController extends BaseController
{
    public function actionDesktop()
    {
        $searchModel = new SearchOrder();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        return $this->render('desktop',[
          'searchModel'=>$searchModel,'dataProvider' => $dataProvider
        ]);
    }

    public function actionListSub()
    {
        $searchModel = new SearchOrder();
        $dataProvider = $searchModel->search();
        return $this->renderAjax('template/list-sub',[
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionEditName()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = \Yii::$app->request->post();
        $attribute = $data['editableAttribute'];
        $index = $data['editableIndex'];
        $value = $data['SearchOrder'][$index][$attribute];
        $params = [
            'key' => $attribute,
            'value' => $value,
        ];
        $condition['id'] = $data['editableKey'];
        IndexService::tabList()->editColumns($condition,$params);
        return ['success'=>true,'result' => 1];
    }

    public function actionDetail()
    {
        $searchModel = new SearchOrder();
        $dataProvider = $searchModel->search();
        return $this->render('detail1',['searchModel'=>$searchModel,'dataProvider' => $dataProvider]);
    }
}
