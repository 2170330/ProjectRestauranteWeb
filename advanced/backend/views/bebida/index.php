<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BebidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bebidas';

?>
<div class="bebida-index">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <div id="sidebar">
        <h1 class="sidebar-titulo"> C.R.D.</h1>
        <ul class="nav-fall">
            <li class="sidebar-menu"> <i class="far fa-calendar-minus"></i> <a href="">Menus</a>
            <li class="sidebar-menu"> <i class="fas fa-utensils"></i> Pratos
                <ul class="sidebar-submenu">
                    <li><a href=""><i class="fas fa-drumstick-bite"></i> Carne</a></li>
                    <li><a href=""><i class="fas fa-fish"></i> Peixe</a></li>
                    <li><a href=""><i class="fas fa-cannabis"></i> Vegetariano</a></li>
                    <li><a href=""><i class="fas fa-apple-alt"></i> Vegan</a></li>
                </ul>
            </li>
            <li class="sidebar-menu"> <i class="fas fa-wine-glass-alt"></i> <?= Html::a('Bebidas', ['/bebida/index'], ['class'=>'']) ?>
            <li class="sidebar-menu"> <i class="fas fa-cookie"></i> <a href="">Sobremesas</a>
            <li class="sidebar-menu"> <i class="fas fa-chair"></i> <a href="">Mesas</a>
        </ul>
    </div>

    <div class="bebida-form">
        <h1 class="bebida-titulo"><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Nova Bebida', ['create'], ['class' => 'bebida-button']) ?>
        </p>

        <div class="bebida-cores">
            <?= GridView::widget([
                'id' => 'bebida-gridviews',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'descricao',
                    'preco',



                    ['class' => 'yii\grid\ActionColumn'],
                ],

            ]); ?>
        </div>
    </div>
</div>
