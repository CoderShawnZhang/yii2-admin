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


    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['id'],'integer'],
                [['name'],'string']
            ]);
    }

    public function attributeLabels()
    {
        return [
            'id'=>'1111',
            'name'=>'1111'
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
                'pageSize' => 5,
            ],
        ]);
        $this->query->orderBy('id');
        return $dataProvider;
    }
}