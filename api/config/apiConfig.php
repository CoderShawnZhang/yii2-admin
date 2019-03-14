<?php
/**
 * v1.0版本痛哦过配置文件生成文档
 * 预计v2.0版本根据反射生成文档
 */
    return [
        'v1'=>[
            'main' => [
                'groupName' => '测试1',
                'methods' => [
                    'index'=>['url'=>'/index/index','params'=>[
                            'access-token'=>['type'=>'int','value'=>'02818451399b5cde5f3c05bd00e72aab','description'=>'用户认证令牌access-token'],
                        ],
                        'apiDescription'=>'获取用户基本信息','verbs'=>'GET'
                    ],
                    'getUserName1'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                    'getUserName2'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                    'getUserName3'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                ]
            ],
            'fruitrue' => [
                'groupName' => '测试2',
                'methods' => [
                    'aaa' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'bbb' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'ccc' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'ddd' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                ]
            ]
        ],
        'v2' => [
            'main' => [
                'groupName' => '测试2',
                'methods' => [
                    'index'=>['url'=>'/index/index','params'=>[
                        'access-token'=>['type'=>'int','value'=>'02818451399b5cde5f3c05bd00e72aab','description'=>'用户认证令牌access-token'],
                    ],
                        'apiDescription'=>'获取用户基本信息','verbs'=>'GET'
                    ]
                ]
            ]
        ],
        'v3' => [
            'main' => [
                'groupName' => '测试3',
                'methods' => [
                    'index'=>['url'=>'/index/index','params'=>[
                        'access-token'=>['type'=>'int','value'=>'02818451399b5cde5f3c05bd00e72aab','description'=>'用户认证令牌access-token'],
                    ],
                        'apiDescription'=>'获取用户基本信息','verbs'=>'GET'
                    ]
                ]
            ]
        ]
    ];