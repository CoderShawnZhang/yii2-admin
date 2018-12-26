<?php

namespace admin\Modules\Test;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\Test\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}