<?php
use kartik\select2\Select2;
?>
<div class="box boxList">
    <div class="box-body">
        <?php
        $item = [
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list min-w1800'],
            'layout' => '{items}<div class="box-footer clearfix"><div class="pull-right">{pager}</div></div>',
            'pager' => [
                'class' => 'admin\Widgets\LinkPager',
                'template' => '<div class="box-footer clearfix pagination-box"><div class="pull-right"><div class="form-inline">{summary}{pageButtons}</div></div></div>',
            ],
            'columns'=>[
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'headerOptions' => ['width' => '30'],
                    'name' => 'paymentId',
                    'checkboxOptions' => function ($model, $key, $index, $column) {
                        return ['value' => $model->id];
                    },
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
                    'value' => function($model){
                        return $model->name;
                    }
                ],
                [
                    'attribute' => 'name',
                    'header' => '加盟商',
                    'value' => function(){
                        return '广东惠州惠东县级店';
                    }
                ],
            ]
        ];
        echo \yii\grid\GridView::widget($item);
        ?>
    </div>
</div>