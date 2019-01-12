<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:42
 */
namespace Service\System\Models;

use Service\System\Tables\Tags;
use yii\helpers\ArrayHelper;

/**
 * Class TagModel
 * @package Service\System\Models
 */
class TagModel extends Tags
{
    public $objectsArray;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            [['objectsArray'],'required'],
            [['objectsArray'],'safe'],
        ]);
    }

    public function load($data, $formName = null)
    {
        if (parent::load($data, $formName)) {
            if (is_array($this->objectsArray) && !empty($this->objectsArray)){
                $this->objects = implode(',',$this->objectsArray);
            }
        }
        return true;
    }
}