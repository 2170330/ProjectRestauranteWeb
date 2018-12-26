<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Prato;
use backend\models\TipoPrato;
use yii\log;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PratoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pratos';

$pratos = Prato::find()->all();


if(isset($_GET['id'])) {

    $tipo_id = $_GET['id'];

    if ($tipo_id != 0) {
        $query = Prato::find()->where(['id_tipo_prato' => $tipo_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query]);
    }
}

?>


<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="prato-index backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Prato', ['create'], ['class' => 'backend-button']) ?>
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
                    'attribute' => 'tipoPrato.descricao',

                ],
                'preco',
                'imagem',
                [
                    'header' => 'Prato do dia',
                    'attribute' => 'diaSemana.descricao',
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

