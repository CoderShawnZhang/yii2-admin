<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@admin', dirname(dirname(__DIR__)) . '/admin');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('Service',dirname(dirname(__DIR__)).'/Service');
Yii::setAlias('api',dirname(dirname(__DIR__)).'/api');
Yii::setAlias('runtime',dirname(__DIR__).'/runtime');
Yii::setAlias('runtime/api',dirname(dirname(__DIR__)) . '/runtime/logs/api');
