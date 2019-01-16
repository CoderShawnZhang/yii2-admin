<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/14
 * Time: 下午3:41
 */

namespace admin\Modules\System\Controllers;


use admin\controllers\BaseController;
use common\models\User;
use Service\System\Approval as ApprovalService;
use Yii;
use yii\web\Response;

class ApprovalController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views/System/Approval';
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        $searchModal = ApprovalService::searchModal();
        $dataProvider = $searchModal->dataProvider();
        return $this->renderAjax('list',['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $ApprovalProcessModel = ApprovalService::getApprovalProcessModal();
        $ApprovalType = ApprovalService::getApprovalTypeList();
        $userList = User::find()->all();
        return $this->render('create',['model' => $ApprovalProcessModel,'typeList' => $ApprovalType,'user'=>$userList]);
    }

    public function actionAddType()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        ApprovalService::addApprovalType($data);
        return ['data' => 'success', 'message' => '', 'success' => true];
    }
    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->get();
        $id = $request['id'];
        ApprovalService::delete(['id'=>$id]);
        return ['success' => true,'message' => ''];
    }
}