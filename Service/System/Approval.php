<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/14
 * Time: 下午4:15
 */

namespace Service\System;

use admin\Widgets\ActionColumn;
use Codeception\Exception\ElementNotFound;
use Service\Base\Service;
use Service\System\Models\ApprovalProcessModel;
use Service\System\Models\ApprovalTypeModel;
use Service\System\Models\Search\ApprovalProcessSearch;
use yii\helpers\Html;
use yii\helpers\Url;

class Approval extends Service
{
    /**
     * tag 列表,GridView列
     *
     * @return array
     */
    public static function tagColumns()
    {
        $columns = [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['width' => '10','style'=>['text-align'=>'center']],
                'contentOptions' => ['class' => 'text-center'],
                'name' => 'id',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model->id];
                },
            ],
            [
                'attribute' => 'type_name',
                'header' => '类型名',
                'headerOptions' => ['width' => '120'],
                'value' => function($model){
                    return $model->type_name;
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
                    return $model->created;
                }
            ],
            [
                'headerOptions' =>['width' => '50'],
                'format' => 'raw',
                'header' => '操作',
                'value' => function ($model) {
                    $deleteUrl = Url::toRoute(['delete']);
                    $html = '<a href="<?= Yii::$app->urlManager->createUrl([\'System/approval-process/update\', \'id\' => $val->id]) ?>">[编辑]</a>';
                    $html .= '&nbsp;&nbsp;';
                    $html .= '<a href="#" class="action-del" data-url="'.$deleteUrl.'" data-id="'.$model->id.'">[删除]</a>';
                    return $html;
                },
            ],
        ];
        return $columns;
    }

    public static function searchModal($data = [])
    {
        $ApprovalProcessSearch = new ApprovalProcessSearch();
        $ApprovalProcessSearch->load($data);
        return $ApprovalProcessSearch;
    }

    public static function getApprovalProcessModal()
    {
        $model = new ApprovalProcessModel();
        if($model===null){
            throw new ElementNotFound('');
        }
        return $model;
    }

    public static function addApprovalType($data)
    {
        $modal = new ApprovalTypeModel();
        $modal->load($data,'');
        $modal->isDel = 1;
        $modal->creater = \Yii::$app->user->identity->username;
        $modal->save();
    }

    public static function getApprovalTypeList()
    {
        return ApprovalTypeModel::find()->where(['!=','isDel',ApprovalTypeModel::APPROVAL_IS_DEL])->asArray()->all();
    }

    public static function delete($condition)
    {
        $modal = ApprovalProcessModel::find()->where($condition)->one();
        $modal->isDel = 0;
        $modal->save();
    }
}