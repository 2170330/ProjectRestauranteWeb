<?php

namespace backend\models;

use backend\mosquitto\phpMQTT;
use ErrorException;
use stdClass;
use Yii;

/**
 * This is the model class for table "bebida".
 *
 * @property int $id
 * @property string $descricao
 * @property string $preco
 * @property string $imagem
 * @property int $id_tipo_bebida
 *
 * @property TipoBebida $tipoBebida
 * @property Itens[] $itens
 * @property Menu $menu
 */
class Bebida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bebida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'preco', 'imagem', 'id_tipo_bebida'], 'required'],
            [['preco'], 'number'],
            [['id_tipo_bebida'], 'integer'],
            [['descricao'], 'string', 'max' => 100],
            [['imagem'], 'string', 'max' => 255],
            [['id_tipo_bebida'], 'exist', 'skipOnError' => true, 'targetClass' => TipoBebida::className(), 'targetAttribute' => ['id_tipo_bebida' => 'id']],
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
            'imagem' => 'Imagem',
            'id_tipo_bebida' => 'Id Tipo Bebida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoBebida()
    {
        return $this->hasOne(TipoBebida::className(), ['id' => 'id_tipo_bebida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItens()
    {
        return $this->hasMany(Itens::className(), ['id_bebida' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id_bebida' => 'id']);
    }

    public function delete()
    {

        if ($this->id_tipo_bebida == 1) {
            if (file_exists('img/sumos/' . $this->imagem)) {
                unlink('img/sumos/' . $this->imagem);
            }
        }
        else if ($this->id_tipo_bebida == 2) {
            if (file_exists('img/vinhos/' . $this->imagem)) {
                unlink('img/vinhos/' . $this->imagem);
            }
        }
        else{
            if (file_exists('img/outros/' . $this->imagem)) {
                unlink('img/outros/' . $this->imagem);
            }
        }
        return parent::delete();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        //Obter dados do registo em causa
        $id = $this->id;
        $descricao = $this->descricao;
        $tipo_bebida = $this->id_tipo_bebida;
        $preco = $this->preco;
        $imagem = $this->imagem;

        $myObj = new stdClass();
        $myObj->id = $id;
        $myObj->descricao = $descricao;
        $myObj->id_tipo_bebida = $tipo_bebida;
        $myObj->preco = $preco;
        $myObj->imagem = $imagem;
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
        $client_id = "Bebida"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        try{
            $mqtt->connect(true, NULL, $username, $password);
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }catch (ErrorException $e){

        }
    }
}
