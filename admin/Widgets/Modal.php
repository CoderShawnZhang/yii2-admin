<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 下午5:28
 */

namespace admin\Widgets;

use mdm\admin\components\Helper;

class Modal extends \yii\bootstrap\Modal
{
    public $route;

    public function init()
    {
        $auth = true;
        if (!empty($this->route)) {
            $route = is_array($this->route) ? $this->route[0] : $this->route;
            $auth = Helper::checkRoute($route);
        }
        if($auth){
            parent::init();
        }
    }
}