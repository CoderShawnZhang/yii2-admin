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

    /**
     * 格式化错误信息
     * @return string
     */
    public function getErrorStr()
    {
        $errors = [];
        foreach($this->getErrors() as $error) {
            $errors[] = implode(' ',$error);
        }
        return implode(' ',$errors);
    }
}