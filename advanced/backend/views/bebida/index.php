<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BebidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bebidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="bebida-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bebida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descricao',
            'preco',
            'imagem',
            'id_tipo_bebida',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
