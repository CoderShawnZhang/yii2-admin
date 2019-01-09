<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/9
 * Time: 下午3:38
 */
namespace admin\Modules\System;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\System\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}