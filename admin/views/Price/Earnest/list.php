<?php
use Service\Price\EarnestPrice as EarnestPriceService;

$columns = EarnestPriceService::earnest()->Columns();
$item = [
    'tableOptions' => ['class' => 'table table-striped table-bordered table-fixed table-index-list'],
    'dataProvider' => $dataProvider,
    'columns' => $columns
];
echo \admin\Widgets\GridView::indexWidget($item);