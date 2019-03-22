<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:56
 */

namespace Service\Base;

use Service\Traits\BaseActiveRecord;
use yii\behaviors\TimestampBehavior;

class ActiveRecord extends \yii\db\ActiveRecord
{
    use BaseActiveRecord;

    public function behaviors()
    {
        return [
            [
                  'class' => TimestampBehavior::className(),
                  'attributes' => [
                      ActiveRecord::EVENT_BEFORE_INSERT => ['created','modified'],
                      ActiveRecord::EVENT_BEFORE_UPDATE => ['modified'],
                  ],
            ],
            'blameable' => [
                'class' => UseNameBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['creater','modifier'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['modifier'],
                ],
            ],
        ];
    }

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