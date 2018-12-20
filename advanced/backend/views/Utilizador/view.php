<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Utilizador */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="utilizador-view backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/utilizador/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'backend-criar']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'backend-apagar',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="views-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email:email',
                'status',
                'created_at',
                'updated_at',
                'nome',
                'morada',
                'nif',
            ],
        ]) ?>
    </div>

</div>
