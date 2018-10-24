<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;

/*public function __construct(){
    parent::__construct();
    $this->load->helper('url');
}*/
?>


<div class="row">
    <div class="site-menu-1 col-lg-3">
        <a class="btn-reservar col-spaced" href="http://www.yiiframework.com">Reserve já</a>
    </div>
    <div class="site-menu-2 col-lg-9">
        <p class="titulo-menu"> Menus </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
        </div>

    </div>
</div>