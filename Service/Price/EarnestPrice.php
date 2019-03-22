<?php
/**
 * 定金管理服务
 */
namespace Service\Price;

use Service\Price\Modules\EarnestPriceModule;

class EarnestPrice
{
    public static function earnest()
    {
        return new EarnestPriceModule();
    }

}