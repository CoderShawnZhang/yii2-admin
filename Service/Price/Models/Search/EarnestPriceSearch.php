<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/23
 * Time: 下午3:02
 */
namespace Service\Price\Models\Search;

use Service\Base\SearchModel;
use Service\Price\Models\EarnestPriceModel;

class EarnestPriceSearch extends SearchModel
{
    public $query;

    public $name;

    public function rules()
    {
        return [
            [['name'],'string']
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
        $query = EarnestPriceModel::find()
            ->andFilterWhere(['like','name',$this->name]);
//        $query->notDel();
        $this->query = $query;
        return $this;
    }
}