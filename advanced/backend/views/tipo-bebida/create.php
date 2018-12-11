<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoBebida */

$this->title = 'Create Tipo Bebida';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Bebidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-bebida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
