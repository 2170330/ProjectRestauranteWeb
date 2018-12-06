<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_prato".
 *
 * @property int $id
 * @property string $descricao
 *
 * @property Prato[] $pratos
 */
class TipoPrato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPratos()
    {
        return $this->hasMany(Prato::className(), ['id_tipo_prato' => 'id']);
    }
}
