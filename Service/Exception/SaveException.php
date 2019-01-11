<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午4:00
 */

namespace Service\Exception;


use Service\Base\Exception;
use Throwable;

class SaveException extends Exception
{
    const CODE = 2;

    public function __construct(string $message = "")
    {
        parent::__construct($message ? $message : '服务器错误！');
    }
}