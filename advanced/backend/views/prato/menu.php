<?php

use backend\models\Prato;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Prato */

?>

<?= $this->render('@backend/views/layouts/submenu.php'); ?>

<h1 class="backend-titulo"><?= Html::encode($this->title) ?></h1>

<?php $pratos = Prato::find()->all() ?>
<ul>
    <?php foreach ($pratos as $prato):?>
    <li>
        <?= $prato->descricao ?>
        <?= $prato->preco ?>
    </li>
    <?php endforeach; ?>
</ul>
