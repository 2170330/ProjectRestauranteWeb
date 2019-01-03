<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-login">
    <h1 class="login-iniciar"> Registar </h1>
    <p class="login-line"> _____</p>

    <div class="row">
        <div class="form-login">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['value' => ''])->label('Password') ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nif')->textInput() ?>

                <div class="login">
                    <?= Html::submitButton('Signup', ['class' => 'login-button', 'name' => 'signup-button']) ?>
                </div>

                <div class="registar">
                    Já tem uma conta? <?= Html::a('faça login aqui', ['site/login']) ?>.
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
