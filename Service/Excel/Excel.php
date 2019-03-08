<?php
/**
 * Excel操作，服务类入口
 */
namespace Service\Excel;

use Service\Excel\Modules\DistinctModule;

class Excel
{
    public static function distinct()
    {
        return new DistinctModule();
    }
}