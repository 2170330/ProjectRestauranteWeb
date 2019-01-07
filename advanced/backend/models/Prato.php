<?php

namespace backend\models;

use backend\mosquitto\phpMQTT;
use stdClass;
use Yii;
use yii\base\ErrorException;
use yii\base\NotSupportedException;
use yii\db\Exception;
use yii\web\UploadedFile;

/**
 * This is the model class for table "prato".
 *
 * @property int $id
 * @property string $descricao
 * @property string $preco
 * @property int $id_tipo_prato
 * @property string $imagem
 * @property int $id_dia_semana
 *
 * @property Itens[] $itens
 * @property TipoPrato $tipoPrato
 * @property DiasSemana $diaSemana
 * @property PratoIngrediente[] $pratoIngredientes
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'preco', 'imagem'], 'required', 'message' => 'É preciso preencher este campo'],
            [['preco'], 'number'],
            [['id_tipo_prato', 'id_dia_semana'], 'integer'],
            [['descricao'], 'string', 'max' => 100],
            [['imagem'], 'file', 'extensions' => 'png, jpg, gif'],
            [['id_tipo_prato'], 'exist', 'skipOnError' => true, 'targetClass' => TipoPrato::className(), 'targetAttribute' => ['id_tipo_prato' => 'id']],
            [['id_dia_semana'], 'exist', 'skipOnError' => true, 'targetClass' => DiasSemana::className(), 'targetAttribute' => ['id_dia_semana' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'preco' => 'Preco',
            'id_tipo_prato' => 'Id Tipo Prato',
            'imagem' => 'Imagem',
            'id_dia_semana' => 'Id Dia Semana',
        ];
    }

   public function delete()
   {

       if ($this->id_tipo_prato == 1) {
           if (file_exists('img/carne/' . $this->imagem)) {
               unlink('img/carne/' . $this->imagem);
           }
       }
       else if ($this->id_tipo_prato == 2) {
           if (file_exists('img/peixe/' . $this->imagem)) {
               unlink('img/peixe/' . $this->imagem);
           }
       }
       else if ($this->id_tipo_prato == 3) {
           if (file_exists('img/vegetariano/' . $this->imagem)) {
               unlink('img/vegetariano/' . $this->imagem);
           }
       }
       else{
           if (file_exists('img/vegan/' . $this->imagem)) {
               unlink('img/vegan/' . $this->imagem);
           }
       }
       return parent::delete();
   }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItens()
    {
        return $this->hasMany(Itens::className(), ['id_prato' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPrato()
    {
        return $this->hasOne(TipoPrato::className(), ['id' => 'id_tipo_prato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiaSemana()
    {
        return $this->hasOne(DiasSemana::className(), ['id' => 'id_dia_semana']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPratoIngredientes()
    {
        return $this->hasMany(PratoIngrediente::className(), ['id_prato' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        //Obter dados do registo em causa
        $id = $this->id;
        $descricao = $this->descricao;
        $tipo_prato = $this->id_tipo_prato;
        $preco = $this->preco;
        $imagem = $this->imagem;
        $semana = $this->id_dia_semana;

        $myObj = new stdClass();
        $myObj->id = $id;
        $myObj->descricao = $descricao;
        $myObj->id_tipo_prato = $tipo_prato;
        $myObj->preco = $preco;
        $myObj->imagem = $imagem;
        $myObj->id_dia_semana = $semana;
        $myJSON = json_encode($myObj);

        if($insert) $this->FazPublish("INSERT",$myJSON);
        else $this->FazPublish("UPDATE",$myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $id = $this->id;
        $myObj = new stdClass();
        $myObj->id=$id;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }

    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "Prato"; // unique!

        $mqtt = new phpMQTT($server, $port, $client_id);
        try{
            $mqtt->connect(true, NULL, $username, $password);
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }catch (ErrorException $e){

        }
    }
}
