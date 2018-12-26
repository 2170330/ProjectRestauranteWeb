<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sobremesa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sobremesa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
