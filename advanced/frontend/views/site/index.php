<?php

/* @var $this yii\web\View */

$this->title = 'C.D.R';
?>

<script>
    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(51.5, -0.12),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }
</script>

    <div class="inicio">
        <div class="informacao">
            <p> Av. Bernardino de Campos, 98 - São Paulo, SP 12345-678    |    Aberto de 18:00 às 02:00  </p>
        </div>

        <br><br><br><br><br><br><br><br><br>

        <p class="titulo">C.D.R</p>

        <p class="descricao">TUDO E MAIS ALGUMA COISA</p>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <p class="descricao">Reservas</p>

        <br><br>

        <div class="reservas">
            <input class="date-picker btn-reservar-date col-spaced" type="date">

            <select class="btn-reservar-white col-spaced">
                <option value="pessoa1">1 pessoa</option>
                <option value="pessoa2">2 pessoas</option>
                <option value="pessoa3">3 pessoas</option>
                <option value="pessoa4">4 pessoas</option>
                <option value="pessoa5">5 pessoas</option>
                <option value="pessoa6">6 pessoas</option>
            </select>

            <select class="btn-reservar-white col-spaced">
                <option value="00:00">00:00</option>
                <option value="00:15">00:15</option>
                <option value="00:30">00:30</option>
                <option value="00:45">00:45</option>
            </select>

            <a class="btn-reservar col-spaced" href="http://www.yiiframework.com">Reserve já</a>

            <br><br><br><br><br>
        </div>

    </div>


<div class="inicio-1">
    <br><br><br><br><br><br>

    <p class="titulo-1">Misturamos & Sacudimos </p> <br>


    <p class="paragrafo-1"> Sou um parágrafo. Clique aqui para adicionar o seu próprio texto e editar. Sou um ótimo espaço para você contar sua história para que seus usuários saibam um pouco mais sobre você.</p>

    <a class="btn-ver-menu" href="http://www.yiiframework.com">Veja o nosso menu!</a>

    <br><br><br><br><br><br><br><br><br><br>
</div>

<div class="inicio-2 row">
    <div class="inicio-2-1 col-lg-6">
        <p class="titulo-2-1"> Desafio da Mistura</p>
        <p class="titulo-2-1-horario"> TODA TERÇA À NOITE</p>

        <br><br><br>

        <p class="paragrafo-2-1"> Sou um parágrafo. Clique aqui para adicionar o seu próprio texto e editar. Sou um ótimo espaço para você contar sua história para que seus usuários saibam mais sobre você. </p>


    </div>
    <div class="inicio-2-2 col-lg-6">
        <img class="inicio-2-2">
    </div>
</div>


<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2348.875403049507!2d-8.82088734495151!3d39.7354353225667!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcfaf619f4450fa76!2sPolit%C3%A9cnico+de+Leiria+%7C+ESTG+-+Escola+Superior+de+Tecnologia+e+Gest%C3%A3o_Edif%C3%ADcio+D!5e0!3m2!1spt-PT!2spt!4v1540287971315" frameborder="0" allowfullscreen></iframe>
