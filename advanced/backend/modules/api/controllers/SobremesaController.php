<?php

namespace backend\modules\api\controllers;


use common\models\User;
use stdClass;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class SobremesaController extends ActiveController
{
    public $modelClass = 'backend\models\Sobremesa';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    //Utilizadores com admin podem mexer na api
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

    //conta o total de Sobremesas que existe
    public function actionTotal()
    {
        $Sobremesa = new $this->modelClass;
        $contarSobremesas = $Sobremesa::find()->all();
        return ['total' => count($contarSobremesas)];
    }

    // Mostra todas as Sobremesas que cujo o preco é inferior ou igual a 1 euro
    public function actionBarato()
    {
        $Sobremesa = new $this->modelClass;
        $contarSobremesas = $Sobremesa::find()->all();

        foreach ($contarSobremesas as $contarSobremesa){
            if ($contarSobremesa->preco <= 1) {
                return ['barato' => $contarSobremesa];
            }
        }

        throw new \yii\web\NotFoundHttpException("Não foi encontrado sobremesas baratas");
    }

    //Vai mostrando [sobremesa1 + sobremesa2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Sobremesa = new $this->modelClass;
        $recordSobremesas = $Sobremesa::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordSobremesas];
    }


    //Cria uma Sobremesa
    public function actionCriar() {
        $descricao=Yii::$app->request->post('descricao');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');


        $Sobremesa = new $this->modelClass;
        $Sobremesa->descricao = $descricao;
        $Sobremesa->preco=$preco;
        $Sobremesa->imagem=$imagem;

        $save = $Sobremesa->save();
        return ['SaveError' => $save];
    }

    //Atualiza uma Sobremesa
    public function actionAtualizar($id) {
        $descricao=Yii::$app->request->post('descricao');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');

        $Sobremesa = new $this->modelClass;
        $rec = $Sobremesa::find()->where("id=".$id)->one();

        if($rec) {
            $rec->descricao = $descricao;
            $rec->preco=$preco;
            $rec->imagem=$imagem;

            $save = $rec->save();
            return ['SaveError' => $save];
        }

        throw new \yii\web\NotFoundHttpException("id da Sobremesa não encontrado");
    }

    //Apaga uma Sobremesa
    public function actionApagar($id)
    {
        $Sobremesa = new $this->modelClass;
        $ret=$Sobremesa->deleteAll("id=".$id);
        if($ret) {
            Yii::$app->response->statusCode =200;
            return ['code'=>'ok'];
        }
        else {
            Yii::$app->response->statusCode = 404;
            return ['code' => 'erro'];
        }
    }
}
