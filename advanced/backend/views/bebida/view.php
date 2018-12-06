<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bebida */

$this->title = $model->descricao;
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="bebida-view, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/bebida/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="backend-cores">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'descricao',
                'preco',
                'imagem',
                'tipoBebida.descricao'
            ],
        ]) ?>
    </div>
</div>
