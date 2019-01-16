<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/16
 * Time: 上午9:33
 */

namespace Service\System\Models\Search;

use Service\Base\SearchModel;
use Service\System\Models\ApprovalProcessModel;

class ApprovalProcessSearch extends SearchModel
{
    public $query;

    public $type_name;

    public function rules()
    {
        return [
            [['type_name'],'string']
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
        $query = ApprovalProcessModel::find()
            ->andFilterWhere(['like','type_name',$this->type_name]);
        $query->notDel();
        $this->query = $query;
        return $this;
    }
}