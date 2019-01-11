<?php
namespace admin\Widgets;
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 上午11:17
 */

class ActionColumn extends \kartik\grid\ActionColumn
{
    public static function deleteColumn($deleteUrl)
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'header' => '操作',
            'template' => '{delete}',
            'buttons' => [
                'delete' => function($url,$model) use ($deleteUrl){
                    return '<a class="action-del" href="javascript:void(0)" title="删除" data-url="'.$deleteUrl.'" data-id="'.$model->id.'"><span class="glyphicon glyphicon-trash"></span></a>';
                }
            ]
        ];
    }
}