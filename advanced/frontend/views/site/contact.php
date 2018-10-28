<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contato">
    <h1 class="contato"> Contato </h1>
    <p class="line"> _____</p>


    <div class="row">
        <div class="map-contato-div col-lg-6">
            <iframe class="map-contato" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2348.875403049507!2d-8.82088734495151!3d39.7354353225667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfaf619f4450fa76!2sPolit%C3%A9cnico+de+Leiria+%7C+ESTG+-+Escola+Superior+de+Tecnologia+e+Gest%C3%A3o_Edif%C3%ADcio+D!5e0!3m2!1spt-PT!2spt!4v1540287971315" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="form-contato col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?=$form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 4]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="login ">
                    <?= Html::submitButton('Submit', ['class' => 'login-button', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
