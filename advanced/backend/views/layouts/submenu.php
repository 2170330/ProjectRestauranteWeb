<?php

use yii\helpers\Html;
use backend\models\Prato;

$pratos = Prato::find()->all();
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div id="sidebar">
    <h1 class="sidebar-titulo"> C.D.R.</h1>
    <ul class="nav-fall">
        <li class="sidebar-menu"> <i class="fas fa-users"></i> <?= Html::a('Utilizador', ['/utilizador/index'], ['class'=>'']) ?>
        <li class="sidebar-menu"> <i class="far fa-calendar-minus"></i> <a href="">Menus</a>
        <li class="sidebar-menu"> <i class="fas fa-utensils"></i> <?= Html::a('Pratos', ['/prato/index', 'id' => 0], ['class'=>'']) ?>
            <ul class="sidebar-submenu">
                <li><i class="fas fa-drumstick-bite"></i> <?= Html::a('Carne', ['/prato/index', 'id' => 1], ['class'=>'']) ?> </li>
                <li><i class="fas fa-fish"></i> <?= Html::a('Peixe', ['/prato/index', 'id' => 2], ['class'=>'']) ?> </li>
                <li><i class="fas fa-cannabis"></i> <?= Html::a('Vegetariano', ['/prato/index', 'id' => 3], ['class'=>'']) ?> </li>
                <li><i class="fas fa-apple-alt"></i> <?= Html::a('Vegan', ['/prato/index', 'id' => 4], ['class'=>'']) ?> </li>
            </ul>
        </li>
        <li class="sidebar-menu"> <i class="fas fa-wine-glass-alt"></i> Bebibas
            <ul class="sidebar-submenu">
                <li><a href=""><i class="fas fa-glass-martini"></i> </a> <?= Html::a('Sumos', ['/bebida/index'], ['class'=>'']) ?> </li>
                <li><a href=""><i class="fas fa-wine-bottle"></i> Vinhos </a></li>
                <li><a href=""> <i class="fas fa-beer"></i> Outros </a></li>
            </ul>
        <li class="sidebar-menu"> <i class="fas fa-cookie"></i> <?= Html::a('Sobremesas', ['/sobremesa/index'], ['class'=>'']) ?>
        <li class="sidebar-menu"> <i class="fas fa-chair"></i> <a href="">Mesas</a>
    </ul>
</div>

