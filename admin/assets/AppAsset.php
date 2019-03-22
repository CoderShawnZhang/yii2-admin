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
        'css/resetAdminLte.css',
    ];
    public $js = [
        'js/searchBox.js',
        'js/ajaxForm.js',
    ];
    public $depends = [
        'common\assets\CommonAsset',
    ];
}
