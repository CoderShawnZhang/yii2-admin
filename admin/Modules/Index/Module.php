<?php

namespace admin\Modules\Index;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'admin\Modules\Index\Controllers';
    public function init()
    {
        parent::init();
        $this->viewPath = '@admin/views';
    }
}