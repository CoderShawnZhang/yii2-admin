<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/2
 * Time: 下午4:13
 */

namespace common\widgets;

use mdm\admin\components\Helper;
use yii\bootstrap\Html as BootstrapHtml;
use yii\bootstrap\Widget as BootstrapWidget;
use yii\helpers\Url;

class Tag extends BootstrapWidget
{
    public $text = '';
    public $route = '';
    public $disabled = true;

    public function init()
    {
        parent::init();
        $this->clientOptions = false;
    }

    public function run()
    {
        $this->registerPlugin('tag');
        $auth = true;
        unset($this->options['href']);
        if(!empty($this->route)){
            $route = is_array($this->route) ? $this->route[0] : $this->route;
            $auth = Helper::checkRoute($route);
            if($auth){
                $this->options['href'] = Url::to($this->route);
            } else {
                $class = empty($this->options['class']) ? '' : $this->options['class'];
                $class .= ' disabled';
                $this->options['class'] = $class;
            }
        }
        $content = '';
        if($auth || $this->disabled){
            $content .= BootstrapHtml::beginTag('a',$this->options);
            $content .= BootstrapHtml::tag('span',$this->text,['class'=>'disabled']);
            $content .= BootstrapHtml::endTag('a');
        }
        return $content;
    }

    public static function widget($config = [])
    {
        return parent::widget($config);
    }

    /**
     * @param string $route
     * @param string $text
     * @return string
     * @throws \Exception
     */
    public static function addButton($route = 'add',$text = '新增')
    {
        return static::widget([
           'text' => $text,
            'route' => [$route],
            'visabled' =>false,
            'options' => [
                'class' => 'btn btn-orange btn-w82 ml5',
                'target' => '_blank',
            ]
        ]);
    }
}