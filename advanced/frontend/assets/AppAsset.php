<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/inicio.css',
        'css/login.css',
        'css/menu.css',
        'css/encomendas.css',
        'css/comentarios.css',
        'css/contato.css',
        'css/header.css',
        'css/palavrapasse-pedir.css',
    ];
    public $js = [
        'js/site.js',
        'js/comentarios.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
    ];
}
