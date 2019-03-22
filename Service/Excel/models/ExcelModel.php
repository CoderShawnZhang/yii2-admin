<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/6
 * Time: 下午2:21
 */
namespace Service\Excel\Models;

use Service\Excel\Models\Tables\Excel;

class ExcelModel extends Excel
{
    public static function getList($condition = [])
    {
        return self::find()->andFilterWhere($condition)->all();
    }
}