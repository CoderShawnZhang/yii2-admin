<?php
/**
 * 审批
 */

namespace Service\System\Models;

use Service\System\Tables\ApprovalProcess;
use Service\System\Querys\ApprovalProcessQuery;

/**
 * @property int $isDel
 * Class ApprovalProcessModel
 * @package Service\System\Models
 */
class ApprovalProcessModel extends ApprovalProcess
{
    /**
     * @return ApprovalProcessQuery|\yii\db\ActiveQuery
     */
    public static function find()
    {
        return new ApprovalProcessQuery(get_called_class(), ['tableName' => self::tableName()]);
    }
}