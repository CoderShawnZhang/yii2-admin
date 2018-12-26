<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@admin/assets/static';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/test.js',
    ];
    public $depends = [
        'common\assets\CommonAsset',
    ];
}