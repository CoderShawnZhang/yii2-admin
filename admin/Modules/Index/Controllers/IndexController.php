<?php
namespace admin\Modules\Index\Controllers;

use admin\controllers\BaseController;
use admin\Modules\Auth\models\User;
use admin\Modules\Index\models\SearchOrder;
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

        $searchModel = new SearchOrder();
        $searchModel->load(\Yii::$app->request->get());
        $dataProvider = $searchModel->search();
        $pageSize = 5;
        $p = \Yii::$app->request->get('page',1);
        $per = \Yii::$app->request->get('per-page',$pageSize);
        $name = \Yii::$app->request->get('name','');
        $pages = new Pagination(['totalCount' => User::find()->count(),'pageSize'=>$pageSize]);
        $list = User::find()->filterWhere(['like','username',$name])->offset($pageSize*($p-1))->limit($per)->orderBy("id asc")->all();
        return $this->render('desktop',[
            'list' => $list,'pages' => $pages,'searchModel'=>$searchModel,'dataProvider' => $dataProvider
        ]);
    }
}