<!--Header-->
<?php $this->beginBlock('content-header'); ?>
<h1>
    <span>详情</span>
</h1>
<?php $this->endBlock(); ?>
<div class="box box-solid no-mb">
    <div class="box-header">
        <button type="Button" id="w1" class="handle btn btn-purple mr5" data-type="1">接单</button>
        <button type="Button" id="w2" class="handle btn btn-purple" data-type="2">驳回</button>
    </div>
    <div class="box-body no-padding">
        <table class="table" style="table-layout:fixed;">
            <tbody>
            <tr>
                <td>
                    订单号：
                    <span class="label label-bg-blue label-tag mr5">补货</span>
                    <b class="kh-tel">360730001181229003</b>
                </td>
                <td>关联主材包：
                    <span class="label label-bg-red label-tag mr5">518主材包</span>
                    360730001181125003
                    <i class="ji_Icon" data-toggle="tooltip" data-container="body" data-placement="right" data-original-title="第5次补货">5</i>
                </td>
                <td>加盟店：江西赣州宁都县级店</td>
            </tr>
            <tr>
                <td>客户信息：苏李生(13766374800)</td>
                <td>提交人：张荣生</td>
                <td>提交时间：2018/12/29 21:50</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="box box-purple no-mb">
    <?php
    $columns = \admin\views\Index\template\listColumns::getColumns($searchModel);
    $item = [
        'id' => 'state'.Yii::$app->request->get('tabId',1),
        'pjax' => false,
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list min-w1800'],
        'layout' => '{items}<div class="box-footer clearfix"><div class="pull-right">{pager}</div></div>',
        'pager' => [
            'class' => 'admin\Widgets\LinkPager',
            'template' => '<div class="box-footer clearfix pagination-box"><div class="pull-right"><div class="form-inline">{summary}{pageButtons}</div></div></div>',
        ],
        'columns'=>$columns
    ];
    echo kartik\grid\GridView::widget($item);
    ?>
</div>
