<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/2/28
 * Time: 下午3:16
 */
namespace admin\Modules\Excel\Controllers;

use Anlewo\ApiView\MyPake;
use common\Excel\ExcelManager;
use admin\controllers\BaseController;
use Service\Excel\Excel;
use yii\web\Response;

class DistinctController extends BaseController
{
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views/Excel/Distinct';
    }

    public function actionIndex()
    {
        $myPack = new MyPake();
        echo $myPack->say();
        echo __DIR__.'/apiConfig.php';
        $tabList = Excel::distinct()->getTabList();

        return $this->render('index',['tabList' => $tabList,'tabActive' => count($tabList)-1]);
    }

    public function actionList()
    {
        $request = \Yii::$app->request;
        $isRequestPichNo = $request->get('pichNo');
        $searchModel = $this->getImportResult($isRequestPichNo);
        $dataProvider = $searchModel->dataProvider();

        $tabList = Excel::distinct()->getTabList();
        return $this->renderAjax('import_list',['searchModel' => $searchModel,'dataProvider'=>$dataProvider,'tabList' => $tabList]);
    }

    public function actionDelete()
    {
        $request = \Yii::$app->request;
        \Yii::$app->response->format = Response::FORMAT_JSON;
        echo ['success' => true,'message' => ''];
        $tabId = $request->post('tabId');
        if($request->isPost){
            $condition['importTime'] = $tabId;
            $res = Excel::distinct()->deleteTab($condition);
            if($res > 0){
                echo ['success' => true,'message' => ''];
            } else {
                echo ['success' => false,'message' => '删除失败！'];
            }
        }
    }

    /**
     * @throws \yii\base\Exception
     */
    public function actionImport()
    {
        $request = \Yii::$app->request;
        $isRequestPichNo = $request->get('pichNo');
        $pichNo = isset($isRequestPichNo) ? $isRequestPichNo : time();
        if($request->isPost){
            List($fileName,$filePath) = ExcelManager::uploadFile("myFile", 'cost');
            $data = ExcelManager::runImport($filePath);
            if(isset($data['error']) && $data['error'] != 0){

            }
            $list = isset($data['list']) ? $data['list'] : [];
            foreach($list[0] as $key => $val){
                ExcelManager::$_object->ExcelDataToInsertExcel('excel',$this->getSqlValStr($val),$pichNo);
            }
            ExcelManager::$_object->ExcelDataToInsertTab('excel_tab',$pichNo,$fileName);
        }
        return $this->redirect('index');
    }

    public function actionExport()
    {
        $request = \Yii::$app->request;
        $isRequestPichNo = $request->get('pichNo');
        $pichNo = isset($isRequestPichNo) ? $isRequestPichNo : '';
        if(!empty($pichNo)){
            $list = $this->getExportList($pichNo);
            ExcelManager::runExport($list);
        }
    }


    /**
     * private
     *
     * 组装SQL写入数据字符串。
     *
     * @param $excelDataRow
     * @return string
     */
    private function getSqlValStr($excelDataRow)
    {
        $mapArr = array_map(function($v){return "'".$v."'";},$excelDataRow);
        $sql_val_str = implode(',',$mapArr);
        return $sql_val_str;
    }

    /**
     * 从数据获取导入结果
     *
     * @param $pichNo
     * @return \Service\Excel\models\Search\DistinctSearch
     */
    private function getImportResult($pichNo)
    {
         $condition['importTime'] = $pichNo;
         return Excel::distinct()->searchModel($condition);
    }

    /**
     * @param $pichNo
     * @return array|\yii\db\ActiveRecord[]
     */
    private function getExportList($pichNo)
    {
        $condition['importTime'] = $pichNo;
        return Excel::distinct()->getList($condition);
    }
}