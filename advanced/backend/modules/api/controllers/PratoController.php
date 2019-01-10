<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 31/12/2018
 * Time: 09:59
 */

namespace backend\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class PratoController extends ActiveController
{
    public $modelClass = 'backend\models\Prato';

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
        if ($user && $user->validatePassword($password) && key(Yii::$app->authManager->getRolesByUser($user->id)) == 'admin')
        {
            return $user;
        }
        else{
            throw new \yii\web\NotFoundHttpException("Utilizador não encontrado ou não tem permissões");
        }
    }

    //conta o total de Pratos que existe
    public function actionTotal()
    {
        $Prato = new $this->modelClass;
        $contarPratos = $Prato::find()->all();
        return ['total' => count($contarPratos)];
    }

    //Vai mostrando [prato1 + prato2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Prato = new $this->modelClass;
        $recordPratos = $Prato::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordPratos];
    }

    //Mostra todos os Pratos que tenham o tipo de prato, dependendo do tipo que escolheu (id_tipo_prato)
    public function actionTipo($id) {
        $Prato = new $this->modelClass;
        $recordPratos = $Prato::find()->where(['id_tipo_prato' => $id])->all();
        return ['tipo' => $id, 'Records' => $recordPratos];
    }


    //Mostra todas os Pratos que tenham o prato da semana, dependendo da semana que escolheu (id_dia_semana)
    public function actionSemana($id) {
        $Prato = new $this->modelClass;
        $recordUtilizador = $Prato::find()->where(['id_dia_semana' => $id])->all();
        return ['tipo' => $id, 'Records' => $recordUtilizador];
    }

    /*
    //Cria um Prato
    public function actionCriar() {
        $descricao=Yii::$app->request->post('descricao');
        $tipo_prato=Yii::$app->request->post('id_tipo_prato');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');
        $semana=Yii::$app->request->post('id_dia_semana');


        $Prato = new $this->modelClass;
        $Prato->descricao = $descricao;
        $Prato->id_tipo_prato = $tipo_prato;
        $Prato->preco=$preco;
        $Prato->imagem=$imagem;
        $Prato->id_dia_semana = $semana;


        $save = $Prato->save();
        return ['SaveError' => $save];
    }

    //Atualiza um Prato
    public function actionAtualizar($id) {
        $descricao=Yii::$app->request->post('descricao');
        $tipo_prato=Yii::$app->request->post('id_tipo_prato');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');
        $semana=Yii::$app->request->post('id_dia_semana');

        $Prato = new $this->modelClass;
        $rec = $Prato::find()->where("id=".$id)->one();

        if($rec) {
            $rec->descricao = $descricao;
            $rec->id_tipo_prato = $tipo_prato;
            $rec->preco=$preco;
            $rec->imagem=$imagem;
            $rec->id_dia_semana = $semana;

            $save = $rec->save();
            return ['SaveError' => $save];
        }

        throw new \yii\web\NotFoundHttpException("id do Prato não encontrado");
    }

    //Apaga um Prato
    public function actionApagar($id)
    {
        $Prato = new $this->modelClass;
        $ret=$Prato->deleteAll("id=".$id);
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