<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Bebida;
use backend\models\Sobremesa;
use backend\models\Prato;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prato')->dropDownList(
        ArrayHelper::map(Prato::find()->all(), 'id', 'descricao')
    )->label('Prato') ?>

    <?= $form->field($model, 'id_bebida')->dropDownList(
        ArrayHelper::map(Bebida::find()->all(), 'id', 'descricao')
    )->label('Bebida') ?>

    <?= $form->field($model, 'id_sobremesa')->dropDownList(
        ArrayHelper::map(Sobremesa::find()->all(), 'id', 'descricao')
    )->label('Sobremesa') ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
