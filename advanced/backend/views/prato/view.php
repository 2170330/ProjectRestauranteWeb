<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

$this->title = $model->id;
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="prato-view backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i> <?= Html::a('', ['/prato/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'backend-criar    ']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'backend-apagar',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="    views-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'descricao',
                'preco',
                'id_tipo_prato',
                'imagem',
                'id_dia_semana',
            ],
        ]) ?>
    </div>

</div>
