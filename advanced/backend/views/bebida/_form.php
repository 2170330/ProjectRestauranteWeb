<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoBebida;


/* @var $this yii\web\View */
/* @var $model app\models\Bebida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bebida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_bebida')->textInput() ?>

    <?= $form->field($model, 'id_tipo_bebida')->dropDownList(ArrayHelper::map(TipoBebida::find()->all(), 'id', 'descricao')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
