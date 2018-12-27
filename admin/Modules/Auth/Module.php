<?php

namespace admin\Modules\Auth;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\Auth\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}