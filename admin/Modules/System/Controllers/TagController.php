<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/9
 * Time: 下午3:38
 */
namespace admin\Modules\System\Controllers;

use admin\controllers\BaseController;
use Service\Base\Exception;
use Service\System\Tag as TagService;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use Yii;

class TagController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views/System/Tag';
    }

    /**
     *
     * @return string
     * @throws Exception
     */
    public function actionIndex()
    {
        try{
            $request = Yii::$app->request->get();
            $searchModel = TagService::getList($request);
            $dataProvider = $searchModel->dataProvider();
            return $this->render('index',[
                'searchModel'=>$searchModel,
                'dataProvider' => $dataProvider
            ]);
        }catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function actionList()
    {
        try{
            $request = Yii::$app->request->get();
            $searchModel = TagService::getList($request);
            $dataProvider = $searchModel->dataProvider();
            return $this->renderAjax('list',[
                'searchModel'=>$searchModel,
                'dataProvider' => $dataProvider
            ]);
        }catch (\Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * 新增标签
     * @return array
     */
    public function actionAdd()
    {
        try{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $postData = Yii::$app->request->post();
            $data = ArrayHelper::getValue($postData, 'SearchTags');
            TagService::create($data);
            return ['data' => 'success', 'message' => '', 'success' => true];
        } catch (\Exception $e) {
            return ['data' => 'error', 'message' => $e->getMessage(), 'success' => false];
        }
    }

    /**
     * 编辑标签
     * @return array
     */
    public function actionEdit()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        try{
            $postData = Yii::$app->request->post();
            $attribute = $postData['editableAttribute'];
            $id = $postData['editableKey'];
            $value = $postData['SearchTags'][$postData['editableIndex']][$attribute];
            $params = [$attribute => $value];
            $model = TagService::edit($id,$params);
            return ['output' => $attribute == 'objectsArray' ? $model->objects : $model->$attribute, 'message' => ''];
        } catch (\Exception $e) {
            return ['output' => '', 'message' => $e->getMessage()];
        }
    }

    /**
     * 删除标签
     *
     * @return array
     */
    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['success'=>true];
    }
}