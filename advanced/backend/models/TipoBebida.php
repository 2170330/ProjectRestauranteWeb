<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_bebida".
 *
 * @property int $id
 * @property string $descricao
 *
 * @property Bebida $bebida
 */
class TipoBebida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_bebida';
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
    public function getBebida()
    {
        return $this->hasOne(Bebida::className(), ['id_tipo_bebida' => 'id']);
    }
}
