<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/2
 * Time: 下午3:15
 */

namespace common\widgets;

use mdm\admin\components\Helper;
use yii\bootstrap\Button as BootstrapButton;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/**
 * Button renders a button with Role Auth
 *
 * For example
 *
 * ```php
 * echo Button::widget([
 *      'label' => 'Action',
 *      'options' => ['class' => 'btn-lg'],
 * ]);
 * ```
 */
class Button extends BootstrapButton
{
    public $route = '';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Renders the widget.
     * @return string
     */
    public function run()
    {
        $this->registerPlugin('button');
        $auth = true;
        if (!empty($this->route)) {
            $route = is_array($this->route) ? $this->route[0] : $this->route;
            $auth = Helper::checkRoute($route);
        }
        return $auth ? Html::tag($this->tagName,$this->encodeLabel ? Html::encode($this->label) : $this->label,$this->options) : '';
    }

    /**
     * @param array $config
     * @return string
     * @throws \Exception
     */
    public static function widget($config = [])
    {
        return parent::widget($config);
    }

    /**
     * @param array $config
     * @return string
     * @throws \Exception
     */
    public static function submitButton($config = [])
    {
        $config = ArrayHelper::merge([
           'label' => '提交',
            'options' => [
                'type' => 'submitButton',
                'class' => 'btn btn-info mr5',
            ],
        ],$config);
        return static::widget($config);
    }
}