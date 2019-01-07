<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Bebida;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BebidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bebidas';

if(isset($_GET['id'])) {
    $tipo_id = $_GET['id'];

    if ($tipo_id != 0) {
        $query = Bebida::find()->where(['id_tipo_bebida' => $tipo_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query]);
    }
}
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="bebida-index backend-form">
    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Bebida', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'descricao',
                [
                    'header' => 'Tipo',
                    'attribute' => 'tipoBebida.descricao',
                ],
                [
                    'header' => 'Preço (€)',
                    'attribute' => 'preco',

                ],
                'imagem',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
