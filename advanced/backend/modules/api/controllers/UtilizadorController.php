<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class UtilizadorController extends ActiveController
{
    public $modelClass = 'backend\models\Utilizador';

    //conta o total de Utilizadores que existe
    public function actionTotal()
    {
        $Utilizador = new $this->modelClass;
        $contarUtilizadores = $Utilizador::find()->all();
        return ['total' => count($contarUtilizadores)];
    }

    //Mostra os que estao ativos
    public function actionAtivos()
    {
        $Utilizador = new $this->modelClass;
        $statusUtilizadores = $Utilizador::find()->where(['status' => 10])->all();
        return ['ativos' => $statusUtilizadores];
    }

    //Vai mostrando [utilizador1 + utilizador2, ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Utilizador = new $this->modelClass;
        $recordUtilizador = $Utilizador::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordUtilizador];
    }

    public function actionNovo() {
        $username=\Yii::$app->request->post('username');
        $morada=\Yii::$app->request->post('morada');
        $nome=\Yii::$app->request->post('nome');
        $nif=\Yii::$app->request->post('nif');
        $status=\Yii::$app->request->post('status');

        $Utilizador = new $this->modelClass;
        $Utilizador->username = $username;
        $Utilizador->morada=$morada;
        $Utilizador->nome=$nome;
        $Utilizador->nif = $nif;
        $Utilizador->status = $status;
        $save = $Utilizador->save(); return ['SaveError' => $save];
    }
}
