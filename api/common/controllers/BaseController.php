<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/13
 * Time: 下午2:24
 */
namespace admin\api\common\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class BaseController extends ActiveController
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
           'authenticator' => [
               'class' => CompositeAuth::className(),
               'except' => ['login'],
               'authMethods' => [
                   HttpBearerAuth::className(),
                   QueryParamAuth::className(),
               ],
           ],
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'appliction/json' => Response::FORMAT_JSON,
                ],
                'languages' => [
                    'en',
                ]
            ]
        ]);
    }

    public function actions()
    {

    }
}