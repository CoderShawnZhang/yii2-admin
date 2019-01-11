<?php

namespace admin\views\Tag\templates;

use admin\components\widgets\EditableColumn;
use admin\Widgets\ActionColumn;
use kartik\editable\Editable;
use yii\helpers\Url;

class listColumns
{
    public static function getColumns()
    {
        $deleteUrl = Url::toRoute(['delete']);
        $columns = [
            ActionColumn::deleteColumn($deleteUrl),
            EditableColumn::textColumn('name'),
            EditableColumn::colorColumn('color', ['options' => ['options' => ['readOnly' => true]]]),
            EditableColumn::textColumn('objects'),
            EditableColumn::textColumn('desc'),
        ];
        return $columns;
    }
}