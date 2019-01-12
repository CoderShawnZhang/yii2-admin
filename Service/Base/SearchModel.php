<?php
/**
 * Service模型查询基础类
 */

namespace Service\Base;

use yii\data\ActiveDataProvider;

class SearchModel extends Model
{
    public $query;
    public $pageSize = 1;
    public $page;

    public function page($page = 1)
    {
        $this->page = $page;
        return $this;
    }

    public function pageSize($limit = '')
    {
        if(!isset($this->pageSize)){
           $limit = !empty($limit) && is_numeric($limit) ? $limit : static::PAGE_SIZE;
           $this->pageSize = $limit;
        }
        return $this;
    }

    /**
     * 返回 DataProvider
     */
    public function dataProvider()
    {
        $pagination['pageSize'] = $this->pageSize;
        if(isset($this->page) && $this->page > 0){
            $pagination['page'] = $this->page - 1;
        }
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $this->query,
                'sort' => false,
                'pagination' => $pagination
            ]
        );
        return $dataProvider;
    }
}