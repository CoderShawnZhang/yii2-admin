<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/30
 * Time: 上午11:48
 */

namespace admin\Widgets;

use kartik\daterange\DateRangePicker;

class SearchActiveForm extends \kartik\form\ActiveForm
{
    public $searchModel;

    /**
     * @param $attribute
     * @param array $option
     * @return mixed|string
     */
    public function fieldDateRage($attribute, $options = [])
    {
        $prefixHtml = <<< HTML
        <div class="search-group form-date">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i>
                    </div>
HTML;
        $style = !empty($this->searchModel->$attribute) ? 'style="display:inline;"' : '';
        $suffixHtml = <<< HTML
        <span class="search-control-clear" {$style}>×</span>
                </div>
HTML;
        $options = array_merge([
            'model' => $this->searchModel,
            'attribute' => $attribute,
            'convertFormat' => true,
            'options' => [
                'placeholder' => $this->searchModel->getAttributeLabel($attribute),
                'readonly' => true,
                'class' => 'form-control select-warp-option  search-hight search-input-data-range-picker',
            ],
            'pluginOptions' => [
                'timePicker' => false,
                'locale' => [
                    'format' => 'Y/m/d',
                    'separator' => ' - ',
                ],
            ],
        ], $options);

        try {
            return $this->outPut($prefixHtml . DateRangePicker::widget($options) . $suffixHtml);
        } catch (\Exception $e) {
            return '';
        }
    }

    /**
     * 输出
     * @param $output
     * @return mixed
     */
    public function outPut($output)
    {
        $prefixHtml = <<< HTML
       <div class="col-md-2">
            <div class="form-group">
HTML;
        $suffixHtml = <<< HTML
       </div>
        </div>
HTML;
        return $prefixHtml . $output . $suffixHtml;
    }
}