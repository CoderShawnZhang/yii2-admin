<?php
namespace admin\Widgets;
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/28
 * Time: 上午10:28
 */

class GridView extends \kartik\grid\GridView
{
    public static function indexWidget($config = [])
    {
        $config = \yii\helpers\ArrayHelper::merge([
           'options' => ['class' => 'grid-view'],
           'tableOptions' => ['class' => 'table table-striped table-bordered table-conter table-fixed table-index-list min-w1800'],
           'layout' => '{items}<div class="box-footer clearfix js-footer pagination-box"><div class="pull-right">{pager}</div></div>',
            'toolbar' => '',
            'panel' => [
                'type' => 'default',
                'heading' => false,
                'footer' => false,
                'after' => '{pager}',
                'before' => false
            ],
            'pager' => [
                'class' => 'admin\Widgets\LinkPager',
                'template' => '<div class="box-footer clearfix pagination-box"><div class="pull-right"><div class="form-inline">{summary}{pageButtons}</div></div></div>',
            ],
            'columns' => [],
        ],$config);
        try{
            return static::widget($config);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}