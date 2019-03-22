<?php
/**
 * 审批
 */

namespace Service\System\Models;

use Service\System\Models\Tables\ApprovalProcess;
use Service\System\Querys\ApprovalProcessQuery;
use yii\db\Exception;

/**
 * @property int $isDel
 * Class ApprovalProcessModel
 * @package Service\System\Models
 */
class ApprovalProcessModel extends ApprovalProcess
{
    const IS_DEL = 1;
    const NO_DEL = 0;
    /**
     * @return ApprovalProcessQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new ApprovalProcessQuery(get_called_class(), ['tableName' => self::tableName()]);
    }

    public static function getOne($condition)
    {
        return self::find()->where($condition)->one();
    }

    /**
     * @param $data
     * @return ApprovalProcessModel
     * @throws Exception
     */
    public static function insertData($data)
    {
        $modal = new self();
        if(!$modal->load($data['ApprovalProcess'],'')){
            throw new Exception($modal->getErrors());
        }
        $modal->isDel = self::IS_DEL;
        $modal->save();
        return $modal;
    }

    public static function updateData($condition,$update)
    {
        self::updateAll($update,$condition);
    }
}