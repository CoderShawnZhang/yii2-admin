<?php
use kartik\select2\Select2;
$this->registerJs($this->render('js/_index_script.js'));
?>
<!--Header-->
<?php $this->beginBlock('content-header'); ?>
    <h1><span>订单管理</span></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
    </ol>
<?php $this->endBlock(); ?>
<!--Search-->
<div class="box search-box" id="searchBox">
    <!-- 搜索表单开始 -->
    <div class="box-body">
        <form id="order-after-sale-search" class="search-form form-vertical" action="/Orders/orders-engineering/index" method="get">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group field-ordersn has-success">
                        <input type="text" id="ordersn" class="form-control" name="orderSn" placeholder="订单号">
                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group field-ordersn has-success">
                        <input type="text" id="ordersn" class="form-control" name="orderSn" placeholder="订单号">
                        <div class="help-block"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submitButton" id="w1" class="btn btn-info mr5">开始搜索</button>
                    <a id="w2" class="btn btn-default btn-w82" href="/Orders/orders-engineering/index?type=reset"><sapn class="">重置</sapn></a>
                </div>
            </div>
        </form>
    </div>
</div>
<!--List-->
<div class="box boxList">
    <div class="box-body">
        <?php
        echo \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed'],
            'layout' => '{items}<div class="box-footer clearfix"><div class="pull-right">{pager}</div></div>',
            'filterModel' => $searchModel,
            'pager' => [
                    'class' => 'yii\widgets\LinkPager'
            ],
            'columns'=>[
                [
                    'attribute' => 'id',
                    'header'=>'用户编号',
                    'format' => 'raw',
                    'headerOptions' => ['width' => '100'],
                    'value' => function($model){
                        return $model->id;
                    },
                    'filter' => Select2::widget([
                            'model'=>$searchModel,
                            'attribute' =>'id',
                            'data' => [''=>'无',1=>1,2=>2,3=>3]
                    ])
                ],
                [
                  'attribute' => 'username',
                  'header' => '账号',
                    'value' => function($model){
                        return $model->username;
                    }
                ],
                [
                    'attribute'=>'created_at',
                    'value'=>function($model){return date("Y-m-d H:i:s",$model->created_at);},
                    'label'=>'时间'
                ],
            ]
        ]);
        ?>
    </div>
</div>