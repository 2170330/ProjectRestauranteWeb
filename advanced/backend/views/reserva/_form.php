<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use backend\models\Utilizador;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nPessoas')->dropDownList(
        array(['1' => '1 pessoa',
            '2' => '2 pessoas',
            '3' => '3 pessoas',
            '4' => '4 pessoas',
            '5' => '5 pessoas',
            '6' => '6 pessoas'
        ]))
    ?>

    <?= $form->field($model, 'data')->widget(DateTimePicker::className(),
        [
            'name' => 'datetime_10',
            'id' => 'datetime_10',
            'options' => ['placeholder' => 'Seleciona a hora de reserva ...', 'class' => 'datepickerCSS'],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'yyyy-dd-mm HH:MM:ss',
                'todayHighlight' => true,
                'minDate' => '-1969/12/31',
            ]
        ])->label('Data');
    ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        ArrayHelper::map(Utilizador::find()->all(), 'id', 'username')
    )->label('Utilizador') ?>

    <div class="form-group">
        <?= Html::submitButton('Criar', ['class' => 'backend-criar']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
