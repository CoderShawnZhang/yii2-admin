<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 上午11:38
 */
namespace api\Modules\v2;

use api\common\BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'api\Modules\v2\controllers';

    public $version = 'v2';
}