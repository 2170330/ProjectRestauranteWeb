<?php
/**
 * Created by PhpStorm.
 * User: rafae
 * Date: 19/12/2018
 * Time: 12:33
 */

use backend\models\Prato;

class PratoTest extends \Codeception\Test\Unit
{

    public function testGetPratoIngredientes()
    {

    }

    public function testAttributeLabels()
    {

    }

    public function testGetTipoPrato()
    {

    }

    public function testRules()
    {

    }

    public function testTableName()
    {

        $prato = new Prato();

        $prato->descricao = "Chouriça";

        $prato->preco = 2.3;
        $prato->id_tipo_prato = 1;
        $prato->imagem = "chouriça.png";
        $prato->id_dia_semana = 1;

        $prato->save(true);


    }

    public function testGetDiaSemana()
    {

    }

    public function testGetItens()
    {

    }

}
