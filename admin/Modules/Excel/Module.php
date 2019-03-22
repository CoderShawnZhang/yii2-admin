<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/2/28
 * Time: 下午3:13
 */
namespace admin\Modules\Excel;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\Excel\Controllers';

    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}