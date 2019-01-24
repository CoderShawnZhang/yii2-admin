<?php
/**
 * 审批类型
 */

namespace Service\System\Models;

use Service\System\Querys\ApprovalTypeQuery;
use Service\System\Models\Tables\ApprovalType;

class ApprovalTypeModel extends ApprovalType
{
    const IS_DEL = 1;
    const NO_DEL = 0;

    public static function find()
    {
        return new ApprovalTypeQuery(get_called_class(),['tableName'=>self::className()]);
    }

    public static function getOne($condition)
    {
        return self::find()->where($condition)->notDel()->one();
    }

    public static function getList($condition)
    {
       return self::find()->where($condition)->notDel()->asArray()->all();
    }

    public static function insertData($data = [])
    {
        $modal = new self();
        $modal->load($data,'');
        $modal->isDel = ApprovalProcessModel::NO_DEL;
        $modal->save();
    }
}