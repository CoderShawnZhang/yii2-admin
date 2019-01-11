<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 上午10:15
 */

namespace common\widgets;


use admin\components\widgets\AjaxActiveForm;
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
}