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
            <i class="fa fa-star" value="5" onclick="rate(this)"></i>
            <i class="fa fa-star" value="4" onclick="rate(this)"></i>
            <i class="fa fa-star" value="3" onclick="rate(this)"></i>
            <i class="fa fa-star" value="2" onclick="rate(this)"></i>
            <i class="fa fa-star" value="1" onclick="rate(this)"></i>
        </div>

        <h1 class="comentario-titulo"> Escreva aqui o seu comentário </h1>

        <div class="comentarios-div">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'avaliacao')->hiddenInput()->label(false) ?>

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