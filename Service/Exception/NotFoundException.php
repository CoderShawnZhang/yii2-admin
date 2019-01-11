<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:51
 */
namespace Service\Exception;

use Service\Base\Exception;

class NotFoundException extends Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct('资源未找到');
    }
}