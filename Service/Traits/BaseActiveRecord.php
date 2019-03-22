<?php
/**
 * 数据库操作函数
 */

namespace Service\Traits;

use Service\Exception\NotFoundException;

trait BaseActiveRecord
{
    /**
     * @param $condition
     * @return mixed
     * @throws NotFoundException
     */
    public static function findOneOrFailed($condition)
    {
        $model = static::findOne($condition);
        if($model === null){
            throw new NotFoundException();
        }
        return $model;
    }
}