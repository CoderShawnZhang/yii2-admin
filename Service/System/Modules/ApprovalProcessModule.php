<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/16
 * Time: 下午5:32
 */
namespace Service\System\Modules;

use Codeception\Exception\ElementNotFound;
use Service\System\Models\ApprovalProcessModel;
use Service\System\Models\Search\ApprovalProcessSearch;
use yii\helpers\Url;
use Yii;

class ApprovalProcessModule
{
    /**
     * tag 列表,GridView列
     *
     * @return array
     */
    public function tagColumns()
    {
        $columns = [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['width' => '10','style'=>['text-align'=>'center']],
                'contentOptions' => ['class' => 'text-center'],
                'name' => 'id',
                'checkboxOptions' => function ($model) {
                    return ['value' => $model->id];
                },
            ],
            [
                'header' => '类型名',
                'headerOptions' => ['width' => '120'],
                'value' => function($model){
                    $typeModel = ApprovalTypeModule::getDetail($model->type_id);
                    return isset($typeModel->type_name) ? $typeModel->type_name : '';
                }
            ],
            [
                'attribute' => 'process_name',
                'header' => '流程名称',
                'headerOptions' => ['width' => '130'],
                'value' => function($model){
                    return $model->process_name;
                }
            ],
            [
                'attribute' => 'process_desc',
                'header' => '流程说明',
                'headerOptions' => ['width' => '130'],
                'value' => function($model){
                    return $model->process_desc;
                }
            ],
            [
                'attribute' => 'creater',
                'header' => '创建人',
                'headerOptions' => ['width' => '100'],
                'value' => function($model){
                    return $model->creater;
                }
            ],
            [
                'attribute' => 'created',
                'header' => '创建时间',
                'headerOptions' => ['width' => '100'],
                'value' => function($model){
                    return date('Y-m-d',$model->created);
                }
            ],
            [
                'headerOptions' =>['width' => '50'],
                'format' => 'raw',
                'header' => '操作',
                'value' => function ($model) {
                    $deleteUrl = Url::toRoute(['delete']);
                    $html = '<a href="'.Yii::$app->urlManager->createUrl(["System/approval/update", "id" => $model->id]).'">[编辑]</a>';
                    $html .= '&nbsp;&nbsp;';
                    $html .= '<a href="#" class="action-del" data-url="'.$deleteUrl.'" data-id="'.$model->id.'">[删除]</a>';
                    return $html;
                },
            ],
        ];
        return $columns;
    }

    public function searchModal($data = [])
    {
        $ApprovalProcessSearch = new ApprovalProcessSearch();
        $ApprovalProcessSearch->load($data);
        return $ApprovalProcessSearch;
    }

    public function getModal()
    {
        $model = new ApprovalProcessModel();
        if($model===null){
            throw new ElementNotFound('');
        }
        return $model;
    }

    public function getDetail($condition = [])
    {
        return ApprovalProcessModel::getOne($condition);
    }

    /**
     * @param $condition
     */
    public function delete($condition)
    {
        $modal = ApprovalProcessModel::find()->where($condition)->one();
        /** @var $modal ApprovalProcessModel */
        $modal->isDel = ApprovalProcessModel::IS_DEL;
        $modal->save();
    }

    /**
     * @param $data
     * @return int
     * @throws \yii\db\Exception
     */
    public function add($data)
    {
        $result = ApprovalProcessModel::insertData($data);
        return $result->id;
    }

    public function update($condition = [],$update = [])
    {
        return ApprovalProcessModel::updateData($condition,$update);
    }
}