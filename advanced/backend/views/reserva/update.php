<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */

$this->title = 'Update Reserva: ' . $model->id;

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="reserva-update, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/reserva/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
