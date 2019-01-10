<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Utilizador;

/* @var $this yii\web\View */
/* @var $model backend\models\Mensagem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensagem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'avaliacao')->dropDownList(
            array(['1' => '1 estrela',
                  '2' => '2 estrelas',
                  '3' => '3 estrelas',
                  '4' => '4 estrelas',
                  '5' => '5 estrelas']
            )) ?>

    <?= $form->field($model, 'mensagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        ArrayHelper::map(Utilizador::find()->all(), 'id', 'username')
    )->label('Utilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
