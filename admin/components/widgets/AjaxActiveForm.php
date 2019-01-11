<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 下午5:50
 */

namespace admin\components\widgets;

use kartik\widgets\ActiveForm;
use light\widgets\AjaxFormAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class AjaxActiveForm extends ActiveForm
{
    public $ajaxSubmitOptions = [];

    public $enableAjaxSubmit = true;

    public $layout;

    public function init()
    {
        if ($this->layout) {
            if (!in_array($this->layout,['default','horizontal','inline'])) {
                throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
            }
            if ($this->layout !== 'default'){
                Html::addCssClass($this->options, 'form-' . $this->layout);
            }
        }
        $this->ajaxSubmitOptions = ArrayHelper::merge(
            [
                'beforeSubmit' => new JsExpression('function(arr, $form) { return ajaxFormBeforeSubmit(arr, $form);}'),
                'success' => new JsExpression('function(response, xhr, msg, $form) { ajaxFormSuccess(response); }'),
                'error' => new JsExpression('function() {ajaxFormError();}')
            ],
            $this->ajaxSubmitOptions
        );
        parent::init();
    }

    public function run()
    {
        parent::run();
        if ($this->enableAjaxSubmit){
            $id = $this->options['id'];
            $view = $this->getView();
            AjaxFormAsset::register($view);
            $_options = Json::htmlEncode($this->ajaxSubmitOptions);
            $view->registerJs("jQuery('#$id').yiiActiveForm().on('beforeSubmit', function(_event) { jQuery(_event.target).ajaxSubmit($_options); return false; });");
        }
    }
}