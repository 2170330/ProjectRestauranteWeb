<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 31/12/2018
 * Time: 10:00
 */

namespace backend\modules\api\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class MenuController extends ActiveController
{
    public $modelClass = 'backend\models\Menu';

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

    //conta o total de Menus que existe
    public function actionTotal()
    {
        $Menu = new $this->modelClass;
        $contarMenus = $Menu::find()->all();
        return ['total' => count($contarMenus)];
    }

    //Vai mostrando [menu1 + menu2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Menu = new $this->modelClass;
        $recordMenus = $Menu::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordMenus];
    }


    //Cria um Menu
    public function actionCriar() {
        $tipo_prato=Yii::$app->request->post('id_prato');
        $tipo_bebida=Yii::$app->request->post('id_bebida');
        $tipo_sobremesa=Yii::$app->request->post('id_sobremesa');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');


        $Menu = new $this->modelClass;
        $Menu ->id_prato = $tipo_prato;
        $Menu ->id_bebida=$tipo_bebida;
        $Menu ->id_sobremesa=$tipo_sobremesa;
        $Menu ->preco = $preco;
        $Menu ->imagem = $imagem;

        $save = $Menu ->save();
        return ['SaveError' => $save];
    }

    //Atualiza um Menu
    public function actionAtualizar($id) {
        $tipo_prato=Yii::$app->request->post('id_prato');
        $tipo_bebida=Yii::$app->request->post('id_bebida');
        $tipo_sobremesa=Yii::$app->request->post('id_sobremesa');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');

        $Menu = new $this->modelClass;
        $rec = $Menu::find()->where("id=".$id)->one();

        if($rec) {
            $rec->id_prato = $tipo_prato;
            $rec->id_bebida = $tipo_bebida;
            $rec->id_sobremesa = $tipo_sobremesa;
            $rec->preco = $preco;
            $rec->imagem = $imagem;

            $save = $rec->save();
            return ['SaveError' => $save];
        }

        throw new \yii\web\NotFoundHttpException("id do Menu não encontrado");
    }

    //Apaga um Menu
    public function actionApagar($id)
    {
        $Menu = new $this->modelClass;
        $ret=$Menu->deleteAll("id=".$id);
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