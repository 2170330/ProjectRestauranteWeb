<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-comentario">
    <h1 class="comentarios"> Comentários </h1>
    <p class="line"> _____</p>

    <div class="star">
        <i class="fa fa-star star1" onclick="rating()"></i>
        <i class="fa fa-star star2" onclick="rating()"></i>
        <i class="fa fa-star star3" onclick="rating()"></i>
        <i class="fa fa-star star4" onclick="rating()"></i>
        <i class="fa fa-star star5" onclick="rating()"></i>
    </div>

</div>