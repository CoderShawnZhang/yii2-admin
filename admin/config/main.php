<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => ['log','admin'],
    "modules" => [
        "admin" => [
            "class" => "mdm\admin\Module",
        ],
        'Auth' => [
            'class' => 'admin\Modules\Auth\Module'
        ],
        'Index' => [
            'class' => 'admin\Modules\Index\Module',
        ],
        'System' => [
            'class' => 'admin\Modules\System\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ]
    ],
    "aliases" => [
        "@mdm/admin" => "@vendor/mdmsoft/yii2-admin",
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'admin\Modules\Auth\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/Auth/login/login',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        "authManager" => [
            "class" => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'base',
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'Auth/login/login',
            'Auth/login/logout',
            'base/index',
        ],
    ],
];
