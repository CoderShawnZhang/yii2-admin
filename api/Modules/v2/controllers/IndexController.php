<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 下午2:24
 */
namespace api\Modules\v2\controllers;

use common\models\User;
use api\common\controllers\BaseController;

class IndexController extends BaseController
{
    public $modelClass = 'api\Modules\v2\models\IndexModels';

    public function actionIndex()
    {
        return 4444;
    }
}