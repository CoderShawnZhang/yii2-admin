<?php
/**
 * 定金管理模块
 */

namespace Service\Price\Modules;

use Service\Price\Models\Search\EarnestPriceSearch;

class EarnestPriceModule
{
    public function Columns()
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
                'value' => function(){
                   return 123;
                }
            ]
        ];
        return $columns;
    }
    public function searchModal($data = [])
    {
      $modal = new EarnestPriceSearch();
      $modal->load($data);
      return $modal;
    }
}