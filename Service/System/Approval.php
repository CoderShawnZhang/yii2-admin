<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/14
 * Time: 下午4:15
 */

namespace Service\System;

use Service\Base\Service;
use Service\System\Modules\ApprovalProcessLevelModule;
use Service\System\Modules\ApprovalProcessModule;
use Service\System\Modules\ApprovalTypeModule;

class Approval extends Service
{
    public static function process()
    {
        return new ApprovalProcessModule();
    }

    public static function processLevel()
    {
        return new ApprovalProcessLevelModule();
    }

    public static function type()
    {
        return new ApprovalTypeModule();
    }
}