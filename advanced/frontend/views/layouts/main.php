<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap ">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top header-border',
        ],
    ]);
    $menuItems = [
        ['label' => 'HOME', 'url' => ['/site/index']],
        ['label' => 'MENU', 'url' => ['/site/menu']],
        ['label' => 'ENCOMENDAS', 'url' => ['/site/encomendas']],
        ['label' => 'COMENTARIOS', 'url' => ['/site/blog']],
        ['label' => 'CONTATO', 'url' => ['/site/contact']],
        '<i class="fa fa-facebook header-icon header-facebook"></i>',
        '<i class="fa fa-twitter header-icon header-twitter" ></i>',
        '<i class="fa fa-whatsapp header-icon header-whatsapp"></i>',
        '<i class="fa fa-instagram header-icon header-instagram"></i>',

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label'=> 'LOGIN', 'url' => ['/site/contact']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer row">
   <div class="footer-site-1 col-lg-6">
        <p class="footer-titulo"> C.R.D </p>
        <p class="footer-descricao">TUDO E MAIS ALGUMA COISA</p>
    </div>
    <div class="footer-site-2 col-lg-6">
        <p class="footer-informacao"> Av. Bernardino de Campos, 98 São Paulo, SP 12345-678</p>
        <p class="footer-informacao"> Tel: (11) 3456-7890</p>
        <p class="footer-informacao"> Aberto de 12:00 às 02:00</p>
        <p class="footer-informacao"> Faça parte da nossa equipe.</p>
        <p class="footer-informacao"> Entre em contato pelo email info@meusite.com</p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
