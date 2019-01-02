<?php
/**
 * 1：文本框
 * 2：下拉列表框
 * 3：日期选择框
 * 4：数值范围框
 * 5：图片上传
 *
 */
namespace  admin\Widgets;;

use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use common\widgets\Button as CommonButton;
use common\widgets\Tag as CommonTag;

trait SearchActiveFormTrait
{
    public $searchModel;

    /**
     * 文本框
     * @param $attribute
     * @return mixed
     */
    public function fieldText($attribute)
    {
        return $this->outPut(
          $this->field($this->searchModel,$attribute,[
              'inputOptions' => [
                  'placeholder' => $this->searchModel->getAttributeLabel($attribute),
                  'class' => 'form-control',
              ]
          ])->label(false)
        );
    }

    /**
     * select2 下拉框
     * @param $attribute
     * @param array $data
     * @param bool $multiple
     * @return mixed
     */
    public function fieldSelect2($attribute, $data = [], $multiple = false)
    {
        return $this->outPut(
            $this->field($this->searchModel, $attribute)->widget(Select2::className(),[
                'data' => $data,
                'options' => [
                    'multiple' => $multiple,
                    'placeholder' => $this->searchModel->getAttributeLabel($attribute),
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label(false)
        );
    }

    /**
     * 日期
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
     * 确认按钮
     * @param string $route
     * @return string
     * @throws \Exception
     */
    public function buttonSubmit($route = '')
    {
        $config = [
            'label' => '开始搜索',
            'route' => $route,
            'options' => [
                'type' => 'submitButton',
                'class' => 'btn btn-info mr5',
            ]
        ];
        return CommonButton::widget($config);
    }

    /**
     * 重置按钮
     * @param $route
     * @return string
     * @throws \Exception
     */
    public function buttonReset($route = '')
    {
        $config = [
            'text' => '重置',
            'route' => [$route,'type'=>'reset'],
            'options' => [
                'class' => 'btn btn-default btn-w82',
            ],
        ];
        return CommonTag::widget($config);
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