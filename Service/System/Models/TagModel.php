<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:42
 */
namespace Service\System\Models;

use Service\Base\Exception;
use Service\System\Models\Search\TagSearch;
use Service\System\Models\Tables\Tags;
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

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(),
            [
                'objectsArray' => '使用对象'
            ]
        );
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

    /**
     * @param $condition
     * @return TagSearch
     */
    public function getSearchModel($condition)
    {
        $model = new TagSearch();
        $model->load($condition);
        return $model;
    }
}