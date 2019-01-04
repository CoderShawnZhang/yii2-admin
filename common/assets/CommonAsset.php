<?php
/**
 * 前后端公用资源
 */

namespace common\assets;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{
    public $sourcePath = '@common/Assets/static';
    public $css = [];
    public $js = [
        'js/test.js',
        'js/CommonJs.js',
        'js/modal-tip.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'dmstr\web\AdminLteAsset',
    ];
}