<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/6
 * Time: 下午4:02
 */
namespace Service\Excel\models\Search\Columns;
class distinctColumns
{
    public static function getColumns($searchModel){
        $columns = [
            [
                'attribute' => 'number',
                'header' => '加盟商',
                'headerOptions' => ['width' => '180'],
                'value' => function($m){
                    return $m->number;
                }
            ],
            [
                'attribute' => 'name',
                'header' => '加盟商<a href="www.baidu.com">aa</a>',
                'headerOptions' => ['width' => '180'],
                'value' => function($m){
                    return $m->title;
                }
            ],
            [
                'attribute' => 'age',
                'header' => '加盟商',
                'headerOptions' => ['width' => '180'],
                'value' => function($m){
                    return $m->age;
                }
            ]
        ];
        return $columns;
    }
}
