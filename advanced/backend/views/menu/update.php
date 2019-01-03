<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */

$this->title = 'Update Menu: ' . $model->id;
?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<div class="menu-update  backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/menu/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <div class="backend-cores">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
