<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2019/3/22
 * Time: 下午3:00
 */

namespace Service\Index;

use Service\Index\Modules\tabListModule;

class Index
{
    public static function tabList()
    {
        return new tabListModule();
    }
}
