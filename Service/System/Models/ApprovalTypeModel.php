<?php
/**
 * 审批类型
 */

namespace Service\System\Models;

use Service\System\Tables\ApprovalType;

class ApprovalTypeModel extends ApprovalType
{
    const APPROVAL_IS_DEL = 0;

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        return true;
    }
}