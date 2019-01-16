<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/16
 * Time: 下午3:23
 */

namespace Service\Base;


use yii\behaviors\BlameableBehavior;

class UseNameBehavior extends BlameableBehavior
{
    public function getValue($event)
    {
        if ($this->value === null && \Yii::$app->has('user')) {
            return \Yii::$app->user->identity->username ? \Yii::$app->user->identity->username : null;
        } else if ($this->value === null && \Yii::$app->has('user' == false)) {
            return 'admin';
        }
        return parent::getValue($event);
    }
}