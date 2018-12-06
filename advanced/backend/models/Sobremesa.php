<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sobremesa".
 *
 * @property int $id
 * @property string $descricao
 * @property string $preco
 * @property string $imagem
 *
 * @property Itens[] $itens
 */
class Sobremesa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sobremesa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'preco', 'imagem'], 'required'],
            [['preco'], 'number'],
            [['descricao'], 'string', 'max' => 100],
            [['imagem'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItens()
    {
        return $this->hasMany(Itens::className(), ['id_sobremesa' => 'id']);
    }
}
