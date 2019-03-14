<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 下午2:24
 */
namespace api\Modules\v1\controllers;

class IndexController extends \api\common\controllers\BaseController
{
    public $modelClass = 'api\Modules\v1\models\IndexModels';

    public function actionIndex()
    {
       return 123;
    }
}