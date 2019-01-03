<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'C.D.R.';
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="row col-lg-9 index">
    <h1 class="index-titulo"> C.D.R. </h1>
    <div class="borders">
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Utilizadores </h1>
            <button class="index-button"><i class="fas fa-users"></i></button>
        </div>
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Menus </h1>
            <button class="index-button"><i class="far fa-calendar-minus"></i></button>
        </div>
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Pratos </h1>
            <button class="index-button"><i class="fas fa-utensils"></i></button>
        </div>
    </div>
</div>

<div class="row col-lg-9 index">
    <div class="borders">
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Bebidas </h1>
            <button class="index-button"><i class="fas fa-cookie"></i></button>
        </div>
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Sobremesas </h1>
            <button class="index-button"><i class="fas fa-cookie"></i></button>
        </div>
        <div class="border-index col-lg-4">
            <h1 class="index-sub-titulo"> Mesas </h1>
            <button class="index-button"><i class="fas fa-chair"></i></button>
        </div>
    </div>
</div>