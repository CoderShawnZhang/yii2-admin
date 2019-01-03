<?php
namespace admin\Modules\Index\Controllers;

use admin\Modules\Index\models\SearchOrder;
use admin\Modules\Index\models\createForm;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actonIndex()
    {
        var_dump(22222);die;
    }
    public function actionDesktop()
    {
//        for($i=0;$i<1000;$i++){
//            $t = new Test();
//            $t->name = $i.'-'.time();
//            $t->save();
//        }

        $searchModel = new SearchOrder();
        $searchModel1= new createForm();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        $count = [1,2,3,4,5,6,7,8,9,1,1,1,1,1,1,1,1,1,1,1,1,1,8,9];$stateList = [1,2,3,4,5,6,7,8,9,1,1,1,1,1,1,1,1,1,1,1,1,1,8,9];

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
}