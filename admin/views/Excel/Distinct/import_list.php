<div class="rules-explain-box">
    sfsfsdss
</div>
<div class="box box-solid no-mb" >
    <?php
    $columns = \Service\Excel\models\Search\Columns\distinctColumns::getColumns($searchModel);
    $item = [
        'id' => time(),
        'pjax' => false,
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list'],
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



