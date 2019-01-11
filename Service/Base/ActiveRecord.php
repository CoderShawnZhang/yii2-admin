<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:56
 */

namespace Service\Base;

use Service\Traits\BaseActiveRecord;

class ActiveRecord extends \yii\db\ActiveRecord
{
    use BaseActiveRecord;
}