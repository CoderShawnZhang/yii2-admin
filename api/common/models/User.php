<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 下午2:45
 */
namespace api\common\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token,'status' => 0]);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => 0]);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getId()
    {

    }
}