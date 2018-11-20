<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;

/*public function __construct(){
    parent::__construct();
    $this->load->helper('url');
}*/
?>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function(e) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollBot: target.offset().top},
                    'slow');
                e.preventDefault();
            }
        });
    });
</script>

<div class="site-menu row">
    <div class="site-menu-1 col-lg-3">
        <ul class="site-menu-bar">
            <li class="site-menu-bar-li"><a href="#menu">Menu</a></li>
            <li class="site-menu-bar-li"><a href="#carne">Carne</a></li>
            <li class="site-menu-bar-li"><a href="#peixe">Peixe</a></li>
            <li class="site-menu-bar-li"><a href="#vegetariano">Vegetariano</a></li>
            <li class="site-menu-bar-li"><a href="#vegan">Vegan</a></li>
            <li class="site-menu-bar-li"><a href="#bebidas">Bebidas</a></li>
            <li class="site-menu-bar-li"><a href="#sobremesas">Sobremesas</a></li>
        </ul>
    </div>
    <div class="site-menu-2 col-lg-9">
        <p id="menu" class="titulo-menu"> Menus </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div class="site-menu-2 col-lg-9">
        <p id="carne" class="titulo-menu"> Carne </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div class="site-menu-2 col-lg-9">
        <p id="peixe" class="titulo-menu"> Peixe </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div class="site-menu-2 col-lg-9">
        <p id="vegetariano" class="titulo-menu"> Vegetariano </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div id="vegan" class="site-menu-2 col-lg-9">
        <p class="titulo-menu"> Vegan </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div class="site-menu-2 col-lg-9">
        <p id="bebidas" class="titulo-menu"> Bebidas </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>



    <div class="site-menu-2 col-lg-9">
        <p id="sobremesas" class="titulo-menu"> Sobremesas </p>
        <p class="line"> _____</p>

        <div class="site-menu-2-1 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> CARNI MAX </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 9.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> Salmão refogado com batatas</h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 15.00 € </p>
        </div>
        <div class="site-menu-2-2 col-lg-4">
            <img class="site-menu-2-image" src="../../web/img/mistura_comida.jpg">
            <h1 class="site-menu-2-titulo"> 12 Alimentos </h1>
            <p class="line-grey"> ____________</p>
            <p class="site-menu-2-paragrafo"> Esse é um item do seu menu. Adicione uma breve descrição </p>
            <p class="site-menu-2-preco"> 11.99 € </p>
        </div>
    </div>

</div>