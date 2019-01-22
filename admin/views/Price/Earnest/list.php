<?php
use Service\System\Tag as TagService;
$columns = TagService::tagColumns();
$item = [
    'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list'],
    'dataProvider' => $dataProvider,
    'columns' => $columns
];
echo \admin\Widgets\GridView::indexWidget($item);