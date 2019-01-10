<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $nPessoas
 * @property string $data
 * @property int $id_user
 *
 * @property User $user
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nPessoas', 'data', 'id_user'], 'required'],
            [['nPessoas', 'id_user'], 'integer'],
            [['data'], 'safe'],
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
            'nPessoas' => 'N Pessoas',
            'data' => 'Data',
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
