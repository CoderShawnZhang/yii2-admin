<?php
namespace admin\Modules\System\models;
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 上午10:55
 */

use admin\Modules\System\models\Tables\Tags;
use yii\data\ActiveDataProvider;

class SearchTags extends Tags
{
    public $query;

    public function search()
    {
        $this->query = self::find()
            ->andFilterWhere(['like','name',$this->name]);
        $dataProvider = new ActiveDataProvider([
            'query' => $this->query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);
        return $dataProvider;
    }
}