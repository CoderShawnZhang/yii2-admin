<?php
namespace admin\Modules\Index\Controllers;

use admin\controllers\BaseController;
use admin\Modules\Auth\models\User;
use admin\Modules\Index\models\SearchOrder;
use admin\Modules\Index\models\createForm;
use common\models\Test;
use yii\data\Pagination;
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

        return $this->render('desktop',[
          'searchModel'=>$searchModel,'dataProvider' => $dataProvider,
            'searchModel1'=>$searchModel1
        ]);
    }
}