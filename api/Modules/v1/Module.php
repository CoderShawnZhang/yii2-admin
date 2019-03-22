<?php
/**
 * v1模块类
 */
namespace api\Modules\v1;

use api\common\BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'api\Modules\v1\controllers';

    public $version = 'v1';
}