<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="login-iniciar"> Iniciar sessão </h1>
    <p class="line"> _____</p>

    <div class="row">
        <div class="form-login">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="forgot-password">
                    Esqueceu-se da sua palavra-passe? <?= Html::a('repõe aqui', ['site/request-password-reset']) ?>.
                </div>

                <div class="login">
                    <?= Html::submitButton('Login', ['class' => 'login-button', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
