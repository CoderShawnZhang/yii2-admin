<?php
/**
 * v1.0版本痛哦过配置文件生成文档
 * 预计v2.0版本根据反射生成文档
 */
    return [
        'v1'=>[
            'main' => [
                'groupName' => '主材包',
                'methods' => [
                    'getUserName'=>['url'=>'change-sub','params'=>[
                            'cart_id'=>['type'=>'int','value'=>'123','description'=>'购物车ID,测试请传入1'],
                            'cart_id1'=>['type'=>'int','value'=>'123','description'=>'购物车ID,测试请传入1'],
                            'cart_id2'=>['type'=>'int','value'=>'123','description'=>'购物车ID,测试请传入1'],
                            'cart_id3'=>['type'=>'int','value'=>'123','description'=>'购物车ID,测试请传入1'],
                            'cart_id4'=>['type'=>'int','value'=>'123','description'=>'购物车ID,测试请传入1'],
                        ],
                        'apiDescription'=>'测试','verbs'=>'POST'
                    ],
                    'getUserName1'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                    'getUserName2'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                    'getUserName3'=>['url'=>'www.baidu.com','params'=>[],'apiDescription'=>'测试','verbs'=>'post'],
                ]
            ],
            'fruitrue' => [
                'groupName' => '家具包',
                'methods' => [
                    'aaa' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'bbb' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'ccc' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                    'ddd' => ['url'=>'www.baidu.com','params'=>'','apiDescription'=>'测试','verbs'=>'post'],
                ]
            ]
        ],
    ];