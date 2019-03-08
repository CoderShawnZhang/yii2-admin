<?php
/**
 * Excel重复项，查询服务
 */
namespace Service\Excel\models\Search;

use Service\Base\SearchModel;
use Service\Excel\Models\DistinctModel;
use Service\Excel\Models\ExcelModel;

class DistinctSearch extends SearchModel
{
    public $importTime;

    public function rules()
    {
        return [
            [['importTime'],'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'importTime' => '批次号'
        ];
    }

    /**
     * @param array $data
     * @param string $formName
     * @return bool
     */
    public function load($data, $formName = '')
    {
        $load = parent::load($data, $formName);
        $this->setCondition();
        return $load;
    }

    public function setCondition()
    {
        $query = ExcelModel::find()->andFilterWhere(['importTime' => $this->importTime]);
        $this->query = $query;
        return $this;
    }
}