<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/9
 * Time: 下午3:38
 */
namespace admin\Modules\Price;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\Price\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}