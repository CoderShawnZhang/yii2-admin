<div class="box boxList">
    <div class="box-body">
        <?php
        $columns = \admin\views\Index\template\listColumns::getColumns($searchModel);
        $item = [
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list min-w1800'],
            'layout' => '{items}<div class="box-footer clearfix"><div class="pull-right">{pager}</div></div>',
            'pager' => [
                'class' => 'admin\Widgets\LinkPager',
                'template' => '<div class="box-footer clearfix pagination-box"><div class="pull-right"><div class="form-inline">{summary}{pageButtons}</div></div></div>',
            ],
            'columns'=>$columns
        ];
        echo \yii\grid\GridView::widget($item);
        ?>
    </div>
</div>