<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 上午10:15
 */

namespace common\widgets;


use admin\components\widgets\AjaxActiveForm;
use kartik\select2\Select2;
use kartik\widgets\ColorInput;
use yii\helpers\ArrayHelper;

class DetailActiveForm extends AjaxActiveForm
{
    public $detailModel;

    public static function begin($config = [])
    {
        $config = ArrayHelper::merge([
           'fullSpan' => 10,
           'formConfig' => [
               'labelSpan' => 3,
           ],
            'options' => [
                'enctype' => 'multipart/form-data',
                'class' => 'form-horizontal form-detail',
            ],
        ],$config);
        return parent::begin($config);
    }

    /**
     * 文本框
     * @param $attribute
     * @param array $options
     * @return \kartik\form\ActiveField
     */
    public function fieldInput($attribute,$options = [])
    {
        return $this->field($this->detailModel,$attribute,$options);
    }

    /**
     * 颜色选择
     *
     * @param $attribute
     * @param array $options
     * @param array $widgetOptions
     * @return $this
     */
    public function fieldColor($attribute, $options = [], $widgetOptions = [])
    {
        $widgetOptions = ArrayHelper::merge([],$widgetOptions);
        return parent::field($this->detailModel,$attribute,$options)->widget(ColorInput::className(),$widgetOptions);
    }

    /**
     * 内容文本框
     * @param $attribute
     * @param array $options
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function fieldTextArea($attribute, $options = [])
    {
        return$this->field($this->detailModel,$attribute)->textarea($options);
    }

    public function fieldSelect2($attibute, $options = [],$widgetOptions = [])
    {
        $widgetOptions = ArrayHelper::merge([
            'data' => [],
            'options' => [
               'multips' => false,
               'placeholder' => '请选择',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ],$widgetOptions);
        $model = isset($options['model']) && !empty($options['model']) ? $options['model'] : $this->detailModel;
        return $this->field($model,$attibute,$options)->widget(Select2::className(),$widgetOptions);
    }
}