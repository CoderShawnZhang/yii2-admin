<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/30
 * Time: 上午11:48
 */

namespace admin\Widgets;

use kartik\widgets\ActiveForm;
use admin\Modules\Index\models\SearchOrder;


class SearchActiveForm extends  ActiveForm
{
    use SearchActiveFormTrait;

    /**
     * 商品分类选择框
     * @param string $attribute model字段
     * @return \yii\widgets\ActiveField
     */
    public function fieldCate($attribute = 'cateId')
    {
        return $this->fieldSelect2($attribute, SearchOrder::getCate(),true);
    }

    /**
     * 商品分类选择框
     * @param string $attribute model字段
     * @return \yii\widgets\ActiveField
     */
    public function fieldCate1($attribute = 'cateId1')
    {
        return $this->fieldSelect2($attribute, SearchOrder::getCate());
    }
}