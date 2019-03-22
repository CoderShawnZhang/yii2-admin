<?php
/**
 * 审批等级
 */
namespace Service\System\Models;

use Service\Base\Exception;
use Service\System\Models\Tables\ApprovalProcessLevel;

class ApprovalProcessLevelModel extends ApprovalProcessLevel
{
    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public static function insertData($data = [])
    {
        $modal = new self();
        if(!$modal->load($data,'')){
            throw new Exception($modal->getErrors());
        }
        if(!$modal->save()){
            throw new Exception($modal->getErrors());
        }
        return true;
    }

    public static function updateData($condition,$update)
    {
        return self::updateAll($update,$condition);
    }

    public static function deleteData($condition = [])
    {
        return self::deleteAll($condition);
    }

    public static function getList($condition = [])
    {
        return self::find()->where($condition)->asArray()->all();
    }
}