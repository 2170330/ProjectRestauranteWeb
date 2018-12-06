<?php

namespace backend\models;

use Yii;

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
            [['descricao', 'preco', 'imagem'], 'required'],
            [['preco'], 'number'],
            [['id_tipo_prato', 'id_dia_semana'], 'integer'],
            [['descricao'], 'string', 'max' => 100],
            [['imagem'], 'string', 'max' => 255],
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
}
