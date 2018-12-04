<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bebida */

$this->title = 'Create Bebida';

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="bebida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
