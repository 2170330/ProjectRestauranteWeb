<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = $model->id;
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="menu-view backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/menu/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

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

    <div class="backend-cores">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'label' => 'Prato',
                    'attribute' => 'prato.descricao',
                ],
                [
                    'label' => 'Bebida',
                    'attribute' => 'bebida.descricao',
                ],
                [
                    'label' => 'Sobremesa',
                    'attribute' => 'sobremesa.descricao',
                ],
                'preco',
                'imagem',
            ],
        ]) ?>
    </div>

</div>
