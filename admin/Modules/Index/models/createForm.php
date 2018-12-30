<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/26
 * Time: 下午3:31
 */

namespace admin\Modules\Index\models;

use yii\base\Model;

class createForm extends Model
{
    public $name;

    public function rules()
    {
        return [
          [['name'],'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称'
        ];
    }
}