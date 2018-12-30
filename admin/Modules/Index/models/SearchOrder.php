<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/28
 * Time: 上午9:02
 */

namespace admin\Modules\Index\models;

use common\models\Test;
use yii\data\ActiveDataProvider;

class SearchOrder extends Test
{
    public $query;

    public $date_range;
    public $datetime_start;
    public $datetime_end;
    public $kvdate1;

    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['id'],'integer'],
                [['name','date_range'],'string']
            ]);
    }

    public function attributeLabels()
    {
        return [
            'id'=>'编号',
            'name'=>'名称',
            'date_range'=>'时间'
        ];
    }

    public function search()
    {
        $this->query = self::find()
            ->andFilterWhere(['id'=>$this->id])
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
        $this->query->orderBy('id');
        return $dataProvider;
    }
}