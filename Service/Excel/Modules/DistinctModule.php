<?php
/**
 * 从Excel中找某列里的重复值
 */

namespace Service\Excel\Modules;

use Service\Excel\Models\ExcelModel;
use Service\Excel\Models\ExcelTabModel;
use Service\Excel\models\Search\DistinctSearch;

class DistinctModule
{
    public function getList($condition = [])
    {
        return ExcelModel::getList($condition);
    }

    public function searchModel($condition = [])
    {
        $model = new DistinctSearch();
        $model->load($condition);
        return $model;
    }

    public function getTabList($condition = [])
    {
        return ExcelTabModel::getList($condition);
    }

    public function deleteTab($condition = [])
    {
        return ExcelTabModel::deleteTab($condition);
    }
}