<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/16
 * Time: 下午5:32
 */

namespace Service\System\Modules;

use Service\System\Models\ApprovalTypeModel;

class ApprovalTypeModule
{
    public static function getDetail($id)
    {
        return ApprovalTypeModel::getOne(['id'=>$id]);
    }

    public static function getList($condition = [])
    {
        return ApprovalTypeModel::getList($condition);
    }

    public static function add($data)
    {
        ApprovalTypeModel::insertData($data);
    }
}