<?php
namespace admin\Modules\Index\Controllers;

use admin\controllers\BaseController;
use admin\Modules\Index\models\SearchOrder;
use admin\Modules\Index\models\createForm;
use yii\web\Response;
use Yii;
use yii\web\Session;

class IndexController extends BaseController
{
    public function actionDesktop()
    {
        $_SESSION['AA'] = 9999;
        $searchModel = new SearchOrder();
        $searchModel1= new createForm();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        $count = [1,2,3,4,5,6,7,8];$stateList = [1,2,3,4,5,6,7,8];

        return $this->render('desktop',[
          'searchModel'=>$searchModel,'dataProvider' => $dataProvider,
            'searchModel1'=>$searchModel1,
            'count'=>$count,'stateList'=>$stateList
        ]);
    }

    public function actionList()
    {
        $searchModel = new SearchOrder();
        $searchModel1= new createForm();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        return $this->renderAjax('list',[
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1'=>$searchModel1
        ]);
    }

    public function actionListSub()
    {
        $searchModel = new SearchOrder();
        $dataProvider = $searchModel->search();
        return $this->renderAjax('template/list-sub',['searchModel'=>$searchModel,'dataProvider' => $dataProvider]);
    }

    public function actionEditName()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        $attribute = Yii::$app->request->post('editableAttribute', '');

        var_dump($attribute);
        return ['success'=>true,'result' => 1];
    }

    public function actionDetail()
    {
        $searchModel = new SearchOrder();
        $dataProvider = $searchModel->search();
        return $this->render('detail1',['searchModel'=>$searchModel,'dataProvider' => $dataProvider]);
    }
}