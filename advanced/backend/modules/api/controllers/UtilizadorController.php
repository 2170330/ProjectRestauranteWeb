<?php

namespace backend\modules\api\controllers;

use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use Yii;
use backend\models\Utilizador;

/**
 * Default controller for the `api` module
 */
class UtilizadorController extends ActiveController
{
    public $modelClass = 'backend\models\Utilizador';

    //Utilizadores com admin podem mexer na api
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    //Autenticacao do utilizador
    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            return $user;
        }
    }

    //conta o total de Utilizadores que existe
    public function actionTotal()
    {
        $Utilizador = new $this->modelClass;
        $contarUtilizadores = $Utilizador::find()->all();
        return ['total' => count($contarUtilizadores)];
    }

    //Mostra os Utilizadores que estao ativos
    public function actionAtivos()
    {
        $Utilizador = new $this->modelClass;
        $statusUtilizadores = $Utilizador::find()->where(['status' => 10])->all();
        return ['ativos' => $statusUtilizadores];
    }

    //Vai mostrando [utilizador1 + utilizador2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Utilizador = new $this->modelClass;
        $recordUtilizador = $Utilizador::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordUtilizador];
    }

    /*
    //Cria um utilizador
    public function actionCriar() {
        $username=Yii::$app->request->post('username');
        $morada=Yii::$app->request->post('morada');
        $email=Yii::$app->request->post('email');
        $nome=Yii::$app->request->post('nome');
        $nif=Yii::$app->request->post('nif');
        $status=Yii::$app->request->post('status');
        $password=Yii::$app->request->post('password');

        $Utilizador = new $this->modelClass;
        $Utilizador->username = $username;
        $Utilizador->email = $email;
        $Utilizador->morada=$morada;
        $Utilizador->nome=$nome;
        $Utilizador->nif = $nif;
        $Utilizador->status = $status;
        $Utilizador->password = $password;

        $save = $Utilizador->save();
        return ['SaveError' => $save];
    }

    //Atualiza um utilizador
    public function actionAtualizar($id) {
        $username=Yii::$app->request->post('username');
        $morada=Yii::$app->request->post('morada');
        $email=Yii::$app->request->post('email');
        $nome=Yii::$app->request->post('nome');
        $nif=Yii::$app->request->post('nif');
        $status=Yii::$app->request->post('status');
        $password=Yii::$app->request->post('password');

        $Utilizador = new $this->modelClass;
        $rec = $Utilizador::find()->where("id=".$id)->one();

        if($rec) {
            $rec->username = $username;
            $rec->email = $email;
            $rec->morada=$morada;
            $rec->nome=$nome;
            $rec->nif = $nif;
            $rec->status = $status;
            $rec->password = $password;

            $save = $rec->save();
            return ['SaveError' => $save];
        }

        throw new \yii\web\NotFoundHttpException("id do Utilizador não encontrado");
    }

    //Apaga um utilizador
    public function actionApagar($id)
    {
        $Utilizador = new $this->modelClass;
        $ret=$Utilizador->deleteAll("id=".$id);
        if($ret) {
            Yii::$app->response->statusCode =200;
            return ['code'=>'ok'];
        }
        else {
            Yii::$app->response->statusCode = 404;
            return ['code' => 'erro'];
        }
    }*/
}
