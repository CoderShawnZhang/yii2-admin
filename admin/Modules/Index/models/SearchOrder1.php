<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/28
 * Time: 上午9:02
 */

namespace admin\Modules\Index\models;

use common\models\Test;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use yii\data\ActiveDataProvider;

class SearchOrder1 extends Test
{
    public $query;

    public $date_range;
    public $datetime_start;
    public $datetime_end;
    public $cateId;
    public $cateId1;

    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['id'],'integer'],
                [['name','date_range','cateId','cateId1'],'string']
            ]);
    }

    public function attributeLabels()
    {
        return [
            'id'=>'编号',
            'name'=>'名称',
            'date_range'=>'时间',
            'cateId'=>'分类',
            'cateId1'=>'分类1'
        ];
    }

    public function search()
    {
        $this->query = self::find()
            ->andFilterWhere(['id'=>$this->id])
            ->andFilterWhere(['like','name',$this->name])
            ->andFilterWhere(['id'=>1]);

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

    public static function getCate()
    {
        return [1,2,3,4,5,6,7,8,9];
    }
}
