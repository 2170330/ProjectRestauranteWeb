<?php
use kartik\datetime\DateTimePicker;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */

/* @var $form yii\widgets\ActiveForm */

$this->title = 'C.D.R';
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="inicio">
    <div class="informacao">
        <p> Bernardino de Campos, 98 - São Paulo, SP 12345-678 &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Aberto de 12:00 às 3:00 e das 19:00 às 22:00 </p>
    </div>

    <br><br><br><br><br><br><br><br><br>

    <h1 class="titulo">C.D.R.</h1>

    <p class="descricao">TUDO E MAIS ALGUMA COISA</p>


    <link class="person" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <p class="descricao">Reservas</p>
    <br><br>

    <div class="reservas row">
        <?php $form = ActiveForm::begin(); ?>

        <div class="btn-reservar-datepicker col-spaced col-lg-4">
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
                ])->label(false);
            ?>
        </div>

        <div class=" col-spaced col-lg-4">
            <?= $form->field($model, 'nPessoas')->dropDownList(
                array(['1' => '1 pessoa',
                       '2' => '2 pessoas',
                       '3' => '3 pessoas',
                       '4' => '4 pessoas',
                       '5' => '5 pessoas',
                       '6' => '6 pessoas']), ['class' => 'btn-reservar-npessoas'])->label(false) ?>
        </div>

        <?php $model->id_user = Yii::$app->user->getId(); ?>
        <?= $form->field($model, 'id_user')->hiddenInput(['value' => $model->id_user])->label(false) ?>

        <div class="col-spaced col-lg-4">
            <?= Html::submitButton('Comentar', ['class' => 'btn-reservar']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <br><br><br><br><br>
    </div>

</div>

<div class="inicio-1">
    <br><br><br><br><br><br>

    <h1 class="titulo-1"> OS NOSSOS MENUS</h1> <br>


    <p class="paragrafo-1"> Todos os menus aqui são elaborados coma precisão de agradar todos os clientes, diversificando todas as nossas ementas e costumizar o seu prato à sua escolha. </p>
    <a class="btn-ver-menu" href="http://www.yiiframework.com">Veja o nosso menu!</a>

    <br><br><br><br><br><br><br><br><br><br>
</div>

<div class="inicio-2 row">
    <div class="inicio-2-1 col-lg-6">
        <h1 class="titulo-2-1"> Jazz </h1>
        <h1 class="titulo-2-1">&</h1>
        <h1 class="titulo-2-1"> Blues</h1>
        <p class="titulo-2-1-horario">TODAS SEXTA À NOITE</p>

        <br><br><br>

        <p class="paragrafo-2-1"> Vários tipos de concertos Jazz & Blues para animar a noite.</p>


    </div>
    <div class="inicio-2-2 col-lg-6">
        <img class="inicio-2-2">
    </div>
</div>


<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2348.875403049507!2d-8.82088734495151!3d39.7354353225667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfaf619f4450fa76!2sPolit%C3%A9cnico+de+Leiria+%7C+ESTG+-+Escola+Superior+de+Tecnologia+e+Gest%C3%A3o_Edif%C3%ADcio+D!5e0!3m2!1spt-PT!2spt!4v1540287971315" frameborder="0" allowfullscreen></iframe>
