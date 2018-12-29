<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/28
 * Time: 上午9:02
 */

namespace admin\Modules\Index\models;

use admin\Modules\Auth\models\User;
use yii\data\ActiveDataProvider;

class SearchOrder extends User
{
    public $query;
    public $name;

    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['id'],'integer'],
                [['username'],'string']
            ]);
    }

    public function attributeLabels()
    {
        return [
            'id'=>'1111',
            'username'=>'1111'
        ];
    }

    public function search()
    {
        $this->query = self::find()
            ->andFilterWhere(['id'=>$this->id])
            ->andFilterWhere(['like','username',$this->username]);

        $dataProvider = new ActiveDataProvider([
            'query' => $this->query,
            'sort' => [
               'defaultOrder' => ['id' => SORT_DESC],
            ],
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        $this->query->orderBy('id');
        return $dataProvider;
    }
}