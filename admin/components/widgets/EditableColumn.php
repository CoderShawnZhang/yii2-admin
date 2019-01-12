<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 下午2:19
 */

namespace admin\components\widgets;

use kartik\editable\Editable;
use kartik\popover\PopoverX;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumn as BaseEditableColumn;
use mdm\admin\components\Helper;

class EditableColumn extends BaseEditableColumn
{
    public function init()
    {
        parent::init();
        $auth = true;
        $route = '';

        if (is_array($this->editableOptions) && isset($this->editableOptions['route'])) {
            $route = $this->editableOptions['route'];
            unset($this->editableOptions['route']);
        }

        if (!empty($route)) {
            $auth = Helper::checkRoute($route);
        }

        $this->readonly = $auth ? false : true;
    }

    /**
     * @param $attribute
     * @param array $config
     * @return array
     */
    public static function textColumn($attribute, $config = [])
    {
        return self::outPut($attribute,
            [
                'editableOptions' => ArrayHelper::merge(self::getEditableOptions(),$config)
            ]
        );
    }

    /**
     * 颜色编辑框
     *
     * @param $attribute
     * @param array $configs
     * @return array
     */
    public static function colorColumn($attribute, $configs = [])
    {
        return self::outPut($attribute,
            [
                'editableOptions' => function ($model) use ($configs,$attribute) {
                    return ArrayHelper::merge(self::getEditableOptions(), [
                        'inputType' => Editable::INPUT_COLOR,
                        'editableValueOptions' => [
                            'class' => 'kv-editable-value kv-editable-link color-column tag-style',
                            'style' => 'color:' . $model->$attribute . '; min-width: 60px; padding:3px; border: 1px solid ' . $model->$attribute,
                        ]
                    ], $configs);
                },
            ]
        );
    }

    /**
     * 下拉选择
     * @param $attribute
     * @param array $data
     * @param array $config
     * @return array
     */
    public static function select2Column($attribute, $data = [], $config = [])
    {
        return self::outPut(
            $attribute,
            [
                'editableOptions' => function ($model) use ($config,$data) {
                    return ArrayHelper::merge(self::getEditableOptions(),[
                       'inputType' => Editable::INPUT_SELECT2,
                       'displayValue' => $model->objects,
                       'options' => [
                           'data' => $data,
                           'options' => [
                               'multiple' => true,
                               'placeholder' => '请选择',
                           ],
                       ]
                    ],$config);
                }
            ]
        );
    }

    public static function dateColumn($attribute, $configs = [])
    {
        return self::outPut(
          $attribute,
          [
              'editableOptions' => function ($model) use ($configs) {
                return ArrayHelper::merge(self::getEditableOptions(),[
                   'inputType' => Editable::INPUT_DATE,
                   'options' => [
                       'pluginOptions' => [
                           'autoclose' => true,
                           'format' => 'yyyy/mm/dd',
                           'todayHighlight' => false
                       ],
                   ]
                ],$configs);
              }
          ]
        );
    }

    /**
     * Editable基础属性
     * @return array
     */
    public static function getEditableOptions()
    {
        return [
           'size' => 'md',
            'inputType' => Editable::INPUT_TEXT,
            'formOptions' => ['action' => ['edit']],
            'asPopover' => true,
            'placement' => PopoverX::ALIGN_BOTTOM_LEFT,
            'showButtonLabels' => true,
            'submitButton' => [
                'icon' => '<i class="fa fa-save"></i>',
                'label' => '保存',
                'class' => 'btn btn-sm btn-primary',
            ],
        ];
    }

    /**
     * @param $attribute
     * @param array $configs
     * @return array
     */
    public static function outPut($attribute,$configs = [])
    {
        return ArrayHelper::merge([
           'class' =>  'admin\components\widgets\EditableColumn',
            'attribute' => $attribute,
        ],$configs);
    }
}