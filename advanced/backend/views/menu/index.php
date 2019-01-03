<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="menu-index  backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Menu', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'header' => 'Prato',
                    'attribute' => 'prato.descricao',
                ],
                [
                    'header' => 'Bebida',
                    'attribute' => 'bebida.descricao',
                ],
                [
                    'header' => 'Sobremesa',
                    'attribute' => 'sobremesa.descricao',
                ],
                'preco',
                'imagem',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
