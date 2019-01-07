<?php
namespace admin\views\Index\template;

use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;

class listColumns
{
    public static function getColumns($searchModel){
        $columns = [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => ['width' => '30'],
                'name' => 'id',
                'checkboxOptions' => function ($model, $key, $index, $column) {
                    return ['value' => $model->id];
                },
            ],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '30px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detailUrl' => Url::to(['list-sub']),
                'enableRowClick' => false,
                'expandOneOnly' => true,
                'allowBatchToggle' => false,
                'expandIcon' => '<span class="waitOrder-Icon"></span>',
                'collapseIcon' => '<span class="waitOrder-Icon waitOrder-openIcon"></span>'
            ],
            [
                'attribute' => 'id',
                'header'=>'用户编号',
                'format' => 'raw',
                'headerOptions' => ['width' => '100'],
                'value' => function($model){
                    return $model->id;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' =>'id',
                    'data' => [''=>'无',1=>1,2=>2,3=>3]
                ])
            ],
            [
                'attribute' => 'name',
                'header' => '名称',
                'headerOptions' => ['width' => '150'],
                'value' => function($model){
                    return $model->name;
                }
            ],
            [
                'attribute' => 'name',
                'header' => '加盟商',
                'headerOptions' => ['width' => '180'],
                'value' => function(){
                    return '广东惠州惠东县级店';
                }
            ],
            [
                'attribute' => 'name',
                'header' => '加盟商',
                'value' => function(){
                    return '广东惠州惠东县级店';
                }
            ],
            [
                'attribute' => 'name',
                'header' => '订单类型',
                'headerOptions' => ['width' => '180'],
                'format' => 'raw',
                'value' => function(){
                    return Html::tag('span','售后订单',['class'=>'label label-bg-blue label-tag']);
                }
            ],
        ];
        return $columns;
    }
}