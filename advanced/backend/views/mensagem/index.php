<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MensagemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mensagens';
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="mensagem-index, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criara Mensagem', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'avaliacao',
                'mensagem',
                'assunto',
                //'created_at',
                //'updated_at',
                [
                    'header' => 'Utilizador',
                    'attribute' => 'user.username',

                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
