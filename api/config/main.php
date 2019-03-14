<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params_local.php'
);

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\Controllers',
    'bootstrap' => ['log','v1','v2'],
    'modules' => [
        'v1' => [
            'class' => 'api\Modules\v1\Module',
        ],
        'v2' => [
            'class' => 'api\Modules\v2\Module',
        ],
        'ApiView' => [
            'class' => 'Anlewo\ApiView\Module',
            'apiConfig' =>  require __DIR__.'/apiConfig.php',
        ]
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'error_file' => [
                    'logFile' => 'runtime/logs/api/error' . date('Ymd') . '.log',
                    'class' => 'yii\log\FileTarget',
                    'maxLogFiles' => 500,
                    'levels' => ['error'],
                ],
                'warning_file' => [
                    'logFile' => 'runtime/logs/api/warning' . date('Ymd') . '.log',
                    'class' => 'yii\log\FileTarget',
                    'maxLogFiles' => 500,
                    'levels' => ['warning'],
                ],
                'info_file' => [
                    'logFile' => 'runtime/logs/api/info' . date('Ymd') . '.log',
                    'class' => 'yii\log\FileTarget',
                    'maxLogFiles' => 500,
                    'levels' => ['info'],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [

            ]
        ],
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
    ],
    'params' => $params,
];