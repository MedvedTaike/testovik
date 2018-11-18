<?php

namespace app\assets;

use yii\web\AssetBundle;

class ViewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/web/bootstrap/css/bootstrap.min.css',
        '/web/css/custom.css'
    ];
    public $js = [
        '/web/js/jquery-3.3.1.min.js',
        '/web/js/popper.min.js',
        '/web/bootstrap/js/bootstrap.min.js'
    ];
    public $depends = [
    ];
}