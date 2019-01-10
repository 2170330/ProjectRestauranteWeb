<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mensagem */

$this->title = 'Update Mensagem: ' . $model->id;

?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="mensagem-update, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/mensagem/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
