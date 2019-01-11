<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/10
 * Time: 上午10:49
 */

namespace admin\Modules\System\models\Tables;

use \yii\db\ActiveRecord;

class Tags extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%tags}}";
    }

    public function rules()
    {
        return [
          [['name','color','desc','objects','creater'],'string'],
          [['status'],'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
          'name' => '标签名称',
          'color' => '标签颜色',
          'objects' => '使用对象',
          'desc' => '描述'
        ];
    }
}