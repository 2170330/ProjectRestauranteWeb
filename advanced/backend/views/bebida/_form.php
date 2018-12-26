<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\TipoBebida;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Bebida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bebida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <?= $form->field($model, 'id_tipo_bebida')->dropDownList(
        ArrayHelper::map(TipoBebida::find()->all(), 'id', 'descricao')
    )->label('Tipo de Bebida') ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
