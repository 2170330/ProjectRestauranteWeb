<?php
/**
 * Created by PhpStorm.
 * User: Utilizador
 * Date: 31/12/2018
 * Time: 09:58
 */

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;

class BebidaController extends ActiveController
{
    public $modelClass = 'backend\models\Bebida';

    //conta o total de Bebidas que existe
    public function actionTotal()
    {
        $Bebida = new $this->modelClass;
        $contarBebidas = $Bebida::find()->all();
        return ['total' => count($contarBebidas)];
    }

    //Vai mostrando [bebida1 + bebida2 + ...] dependendo do limite escolhido
    public function actionSet($id) {
        $Bebida = new $this->modelClass;
        $recordBebidas = $Bebida::find()->limit($id)->all();
        return ['limite' => $id, 'Records' => $recordBebidas];
    }

    //Mostra todos as Bebidas que tenham o tipo de bebida, dependendo do tipo que escolheu (id_tipo_bebida)
    public function actionTipo($id) {
        $Bebida = new $this->modelClass;
        $recordBebidas = $Bebida::find()->where(['id_tipo_prato' => $id])->all();
        return ['tipo' => $id, 'Records' => $recordBebidas];
    }

    //Cria uma Bebida
    public function actionCriar() {
        $descricao=Yii::$app->request->post('descricao');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');
        $tipo_bebida=Yii::$app->request->post('id_tipo_bebida');


        $Bebida = new $this->modelClass;
        $Bebida->descricao = $descricao;
        $Bebida->preco=$preco;
        $Bebida->imagem=$imagem;
        $Bebida->id_tipo_bebida = $tipo_bebida;

        $save = $Bebida->save();
        return ['SaveError' => $save];
    }

    //Atualiza uma Bebida
    public function actionAtualizar($id) {
        $descricao=Yii::$app->request->post('descricao');
        $preco=Yii::$app->request->post('preco');
        $imagem=Yii::$app->request->post('imagem');
        $tipo_bebida=Yii::$app->request->post('id_tipo_bebida');

        $Bebida = new $this->modelClass;
        $rec = $Bebida::find()->where("id=".$id)->one();

        if($rec) {
            $rec->descricao = $descricao;
            $rec->preco=$preco;
            $rec->imagem=$imagem;
            $rec->id_tipo_bebida = $tipo_bebida;

            $save = $rec->save();
            return ['SaveError' => $save];
        }

        throw new \yii\web\NotFoundHttpException("id da Bebida não encontrado");
    }

    //Apaga uma Bebida
    public function actionApagar($id)
    {
        $Bebida = new $this->modelClass;
        $ret=$Bebida->deleteAll("id=".$id);
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