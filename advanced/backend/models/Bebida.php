<?php

namespace app\models;

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
 * @property Itens[] $itens
 * @property TipoBebida $tipoBebida
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
            [['id_tipo_bebida'], 'unique'],
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
    public function getItens()
    {
        return $this->hasMany(Itens::className(), ['id_bebida' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoBebida()
    {
        return $this->hasOne(TipoBebida::className(), ['id' => 'id_tipo_bebida']);
    }
}
