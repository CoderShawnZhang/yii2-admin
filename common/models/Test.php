<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2018/12/26
 * Time: 下午3:38
 */

namespace common\models;


use yii\db\ActiveRecord;

class Test extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tests}}';
    }
}