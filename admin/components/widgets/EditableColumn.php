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
            $auth = \mdm\admin\components\Helper::checkRoute($route);
        }

        $this->readonly = $auth ? false : true;
    }

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
     * @param $attribute
     * @param string $action
     * @return array
     */
    public static function colorColumn($attribute, $configs = [])
    {
        return self::outPut($attribute,
            [
                'editableOptions' => function ($model) use ($configs) {
                    return ArrayHelper::merge(self::getEditableOptions(), [
                        'inputType' => \kartik\editable\Editable::INPUT_COLOR,
                        'editableValueOptions' => [
                            'class' => 'kv-editable-value kv-editable-link color-column tag-style',
                            'style' => 'color:' . $model->color . '; min-width: 60px; padding:3px; border: 1px solid ' . $model->color,
                        ]
                    ], $configs);
                },
            ]
        );
    }

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

    public static function outPut($attribute,$configs = [])
    {
        return ArrayHelper::merge([
           'class' =>  'admin\components\widgets\EditableColumn',
            'attribute' => $attribute,
        ],$configs);
    }
}