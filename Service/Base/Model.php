<?php
/**
 * 自定义模型基类
 */

namespace Service\Base;


class Model extends \yii\base\Model
{
    const PAGE_SIZE = 50;
    /**
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