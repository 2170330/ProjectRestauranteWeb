<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bebida */

$this->title = 'Update Bebida: ' . $model->id;
?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="bebida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
