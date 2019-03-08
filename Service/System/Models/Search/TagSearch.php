<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/12
 * Time: 下午3:25
 */

namespace Service\System\Models\Search;

use Service\Base\SearchModel;
use Service\System\Models\TagModel;

class TagSearch extends SearchModel
{
    public $name;
    public $color;
    public $desc;
    public $objects;
    public $status;
    public $creater;
    public $objectsArray;

    public function rules()
    {
        return [
            [['name','color','desc','objects','creater'],'string'],
            [['status'],'integer']
        ];
    }

    public function load($data, $formName = null)
    {
        $load = parent::load($data, $formName);
        $this->setCondition();
        return $load;
    }

    public function setCondition()
    {
        $query = TagModel::find()->andFilterWhere(['like','name',$this->name]);
        $this->query = $query;
        return $this;
    }
}