<?php
$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'afasdfad123456789',
        ],
    ]
];

if(!YII_ENV_TEST){
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;