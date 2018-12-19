<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Utilizador;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UtilizadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilizadores';

$utilizadores = Utilizador::find()->all();

foreach ($utilizadores as $utilizador):
    if ($utilizador->status == 1){

    }
    else{

    }
endforeach;
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="utilizador-index backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Utilizador', ['create'], ['class' => 'backend-button']) ?>
    </p>

    <div class="backend-cores">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'username',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                [
                    'header' => 'Status',
                    'attribute' => 'status',
                    'value' => function ($data) {
                        if($data->status === 1){
                            $data->status = "Ativado";
                        } else {
                            $data->status = "Desativado";
                        }
                        return $data->status; // $data['name'] for array data, e.g. using SqlDataProvider.
                    },
                ],
                //'created_at',
                //'updated_at',
                'nome',
                'morada',
                'nif',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
