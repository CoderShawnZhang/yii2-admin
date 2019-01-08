<div class="box" >
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
        'panel' => [
            'type' => 'primary',
            'heading' => false,
            'footer' => false,
            'before' => false,
            'after' =>
                \yii\bootstrap\Button::widget([
                    'label' => '提交备货',
                    'options' => [
                        'class' => 'btn btn-success btn-w82 mr5 stocksUp',
                    ]]) .
                \yii\bootstrap\Button::widget([
                    'label' => '驳回至门店',
                    'options' => [
                        'class' => 'btn btn-danger reject',
                    ]]),
        ],

        'columns'=>$columns
    ];
    echo kartik\grid\GridView::widget($item);
    ?>
</div>