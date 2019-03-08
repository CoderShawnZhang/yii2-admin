<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/7
 * Time: 下午4:36
 */

namespace Service\Excel\Models;


use Service\Excel\Models\Tables\ExcelTab;

class ExcelTabModel extends ExcelTab
{
    public static function getList($condition = [])
    {
        return self::find()->andFilterWhere($condition)->all();
    }
}