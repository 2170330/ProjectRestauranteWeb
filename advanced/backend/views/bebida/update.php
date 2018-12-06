<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bebida */

$this->title = 'Update Bebida: ' . $model->descricao;

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="bebida-update, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/bebida/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <div class="backend-cores">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
