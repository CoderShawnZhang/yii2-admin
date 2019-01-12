<?php
use Service\System\Tag as TagService;
$columns = TagService::tagColumns();
$item = [
    'dataProvider' => $dataProvider,
    'columns' => $columns
];
echo \admin\Widgets\GridView::indexWidget($item);