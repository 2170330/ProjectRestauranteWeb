<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "mensagem".
 *
 * @property int $id
 * @property int $avaliacao
 * @property int $mensagem
 * @property int $assunto
 * @property string $created_at
 * @property int $id_user
 *
 * @property User $user
 */
class MensagemForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avaliacao', 'mensagem', 'assunto', 'id_user'], 'required'],
            [['avaliacao', 'mensagem', 'assunto', 'id_user'], 'integer'],
            [['created_at'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avaliacao' => 'Avaliacao',
            'mensagem' => 'Mensagem',
            'assunto' => 'Assunto',
            'created_at' => 'Created At',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
