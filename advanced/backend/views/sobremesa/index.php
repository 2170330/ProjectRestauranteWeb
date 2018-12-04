<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SobremesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sobremesas';

?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="sobremesa-index">
    <div class="backend-form">
        <div class="backend-titulo"><h1><?= Html::encode($this->title) ?></h1></div>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Sobremesa', ['create'], ['class' => 'backend-button']) ?>
        </p>
        <div class="backend-cores">
            <?= GridView::widget([
                'id' => 'sobremesa-gridviews',
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