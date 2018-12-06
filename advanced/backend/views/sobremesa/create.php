<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sobremesa */

$this->title = 'Create Sobremesa';

?>
<?= $this->render('@backend/views/layouts/submenu.php'); ?>
<div class="sobremesa-create, backend-form">

    <h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

    <i>  <?= Html::a('', ['/bebida/index'], ['class'=>'fas fa-arrow-left  voltar-button']) ?> </i>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
