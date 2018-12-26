<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MensagemForm */
/* @var $form ActiveForm */
$star = 0;

?>


<div class="site-comentario">
    <h1 class="comentarios"> Comentários </h1>
    <p class="line-comentarios"> _____</p>

    <?php $form = ActiveForm::begin(['id' => 'comentario-form']); ?>
    <div class="comentario-center">

        <?= $form->field($model, 'avaliacao', ['labelOptions'=>['class' => 'comentario-titulo']])->hiddenInput() ?>

        <div class="star">
            <i class="fa fa-star star1" onclick="rating()"></i>
            <i class="fa fa-star star2" onclick="rating()"></i>
            <i class="fa fa-star star3" onclick="rating()"></i>
            <i class="fa fa-star star4" onclick="rating()"></i>
            <i class="fa fa-star star5" onclick="rating()"></i>
        </div>

        <h1 class="comentario-titulo"> Escreva aqui o seu comentário </h1>


        <div class="comentarios-div">
            <?= $form->field($model, 'assunto')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'mensagem')->textarea(['rows' => 4, 'cols' => 130]) ?>
        </div>

        <div class="login">
            <?= Html::submitButton('Comentar', ['class' => 'login-button', 'name' => 'btn-comentario']) ?>
        </div>


    <?php ActiveForm::end(); ?>

</div>

