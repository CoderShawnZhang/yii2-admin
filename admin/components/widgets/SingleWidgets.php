<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/15
 * Time: 下午2:59
 */

namespace admin\components\widgets;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SingleWidgets
{
    public static function select2($data = [],$options = [],$val = '')
    {
        $options = isset($options['options']) ? $options['options'] : [];
        $multiple = isset($options['options']['multiple']) ? $options['options']['multiple'] : true;
        return Select2::widget([
            'data' => $data,
            'name' => 'sub_process[user_id][0][]',
            'value' => $val,
            'options' => ArrayHelper::merge(
                [
                    'placeholder' => '选择审批人',
                    'multiple' => $multiple,
                ],$options),
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    }

    public static function submitButton($model)
    {
        return Html::submitButton(($model->isNewRecord ? '创建' : '编辑'),
            [
                'id' => 'submitBtn',
                'class' => ($model->isNewRecord ? 'btn btn-info btn-w82 mr5' : 'btn btn-info btn-w82 mr5')
            ]);
    }
}