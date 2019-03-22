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
        $searchModal = ApprovalService::process()->searchModal();
        $dataProvider = $searchModal->dataProvider();
        return $this->renderAjax('list',['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        if(Yii::$app->request->isPost){
            $data =  Yii::$app->request->post();
            for($i = 0; $i < count($data['sub_process']['level_name']); $i++){
                $data['sub_process']['approve_person'][$i] = implode(',',$data['sub_process']['approve_person'][$i]);
                $data['sub_process']['carbon_copy'][$i] = implode(',',$data['sub_process']['carbon_copy'][$i]);
            }
            $processId = ApprovalService::process()->add($data);
            ApprovalService::processLevel()->add($data,$processId);
            return $this->redirect('index');
        }else{
            $ApprovalProcessModel = ApprovalService::process()->getModal();
            $ApprovalType = ApprovalService::type()->getList();
            $userList = User::find()->all();
            return $this->render('create',['model' => $ApprovalProcessModel,'typeList' => $ApprovalType,'user'=>$userList]);
        }
    }

    public function actionUpdate()
    {
        if(Yii::$app->request->isPost){
            $data =  Yii::$app->request->post();
            foreach($data['sub_process']['level_name'] as $key => $val){
                $data['sub_process']['approve_person'][$key] = implode(',',$data['sub_process']['approve_person'][$key]);
                $data['sub_process']['carbon_copy'][$key] = implode(',',$data['sub_process']['carbon_copy'][$key]);
            }
            ApprovalService::process()->update(['id'=>$data['ApprovalProcess']['id']],$data['ApprovalProcess']);
            ApprovalService::processLevel()->update($data,$data['ApprovalProcess']['id']);
            return $this->redirect('index');
        }else{
            $processId = Yii::$app->request->get('id');
            $ApprovalProcessModel = ApprovalService::process()->getDetail(['id' => $processId]);
            $ApprovalType = ApprovalService::type()->getList();
            $userList = User::find()->all();
            $approval_level = ApprovalService::processLevel()->getList(['process_id'=>$processId]);
            return $this->render('update',['model' => $ApprovalProcessModel,'typeList' => $ApprovalType,'user'=>$userList,'approval_level'=>$approval_level]);
        }
    }

    public function actionAddType()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();
        ApprovalService::type()->add($data);
        return ['data' => 'success', 'message' => '', 'success' => true];
    }
    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request->get();
        $id = $request['id'];
        ApprovalService::process()->delete(['id'=>$id]);
        return ['success' => true,'message' => ''];
    }
}