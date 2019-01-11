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
use yii\helpers\ArrayHelper;

class SearchTags extends Tags
{
    public $query;

    public $objectsArray;

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

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),[
            [['objectsArray'],'safe']
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(),[
            'objectsArray' => '使用对象',
        ]);
    }
}