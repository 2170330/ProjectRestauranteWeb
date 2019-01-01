<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MensagemForm */
/* @var $form yii\widgets\ActiveForm */

if(isset($_GET['rating'])) {
    $star = $_GET['rating'];
}
else{
    $star = 0;
}
?>

<div class="mensagem-form-form">

    <h1 class="comentarios"> Comentários </h1>
    <p class="line-comentarios"> _____</p>

    <div class="comentario-center">
        <div class="star">
            <i id="1" class="fa fa-star star1" onclick="ratingValue()"></i>
            <i id="2" class="fa fa-star star2" onclick="ratingValue()"></i>
            <i id="3" class="fa fa-star star3" onclick="ratingValue()"></i>
            <i id="4" class="fa fa-star star4" onclick="ratingValue()"></i>
            <i id="5" class="fa fa-star star5" onclick="ratingValue()"></i>
        </div>

        <h1 class="comentario-titulo"> Escreva aqui o seu comentário </h1>

        <div class="comentarios-div">
            <?php $form = ActiveForm::begin(); ?>

            <?php $model->avaliacao = $star ?>

            <?= $form->field($model, 'avaliacao')->textInput() ?>

            <?= $form->field($model, 'mensagem')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'assunto')->textInput(['maxlength' => true]) ?>

            <?php $model->id_user = Yii::$app->user->getId(); ?>

            <?= $form->field($model, 'id_user')->hiddenInput(['value' => $model->id_user])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Comentar', ['class' => 'btn-comentario']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>