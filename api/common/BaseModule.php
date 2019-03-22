<?php
/**
 * API模块基础类，多个版本的API模块都要继承该类
 */
namespace api\common;

use yii\base\Module;
use yii\base\BootstrapInterface;

class BaseModule extends Module implements BootstrapInterface
{
    public $version;

    public function init()
    {
        parent::init();
    }

    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [$this->version . '/furniture'],
                'extraPatterns' => [
                    'PUT update' => 'update',
                ],
                'pluralize' => false,
            ],
            'GET,POST,PUT,HEAD ' . $this->version . '/<controller>/<action>' => $this->version . '/<controller>/<action>',
            'GET,POST,PUT,HEAD ' . $this->version . '/<controller:\w+>/<action>/<id:\d+>' => $this->version . '/<controller>/<action>',
        ]);
    }
}