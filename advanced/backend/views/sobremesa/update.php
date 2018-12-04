<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sobremesa */

$this->title = 'Update Sobremesa: ' . $model->id;

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="sobremesa-update">
    <div class="backend-form">
    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <div class="backend-cores">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
    </div>
</div>
