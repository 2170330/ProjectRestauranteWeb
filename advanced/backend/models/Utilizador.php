<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $nome
 * @property string $morada
 * @property int $nif
 *
 * @property Comentario[] $comentarios
 * @property Encomenda[] $encomendas
 * @property Fatura[] $faturas
 * @property Mensagem[] $mensagems
 * @property Reserva[] $reservas
 */

class Utilizador extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $password;
    public $admin;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /*
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','email', 'nome', 'morada', 'nif', 'status', 'password'], 'required', 'message' => 'É preciso preencher este campo'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'password_reset_token', 'email', 'nome', 'morada', 'password_hash'], 'string', 'max' => 255, 'message' => 'Não pode ter mais de 255 carateres'],
            ['auth_key', 'string', 'max' => 32, 'message' => 'Não pode ter mais de 32 carateres'],

            ['username', 'trim'],
            ['username', 'unique', 'message' => 'Este username já foi utilizado'],

            ['email', 'unique', 'message' => 'Este email já foi utilizado'],
            ['email', 'email', 'message' => 'Este email não é válido'],
            ['email', 'trim'],

            ['nif', 'integer', 'length' => ['min' => 9, 'max' => 9], 'message' => 'O nif tem de conter exatamente 9 carateres'],
            ['nif', 'unique', 'message' => 'Este nif já foi utilizado'],

            ['password_reset_token', 'unique'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            ['password_hash', 'required', 'on' => 'insert'],

            ['password', 'string', 'min' => 6, 'message' => 'O nif tem de conter pelo menos 6 carateres'],

            ['admin', 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" não está implementado.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates "remember me" authentication key
     * @throws \yii\base\Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     * @throws \yii\base\Exception
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function beforeSave($insert) {
        if ($insert) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $this->generateAuthKey();
            $this->generatePasswordResetToken();
        } else {
            $this->setPassword($this->password);
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $model = AuthAssignment::find()->where(['user_id' => $this->id])->one();

        if ($insert) {
            if ($this->admin == 1) {
                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('admin');
                $auth->assign($authorRole, $this->getId());
            }
            else{
                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('author');
                $auth->assign($authorRole, $this->getId());
            }
        }
        else {
            if ($this->admin == 1) {
                $model->delete();
                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('admin');
                $auth->assign($authorRole, $this->id);
            } else {
                $model->delete();
                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('author');
                $auth->assign($authorRole, $this->id);
            }
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    public function delete()
    {
        $model = AuthAssignment::find()->where(['user_id' => $this->id])->one();
        if ($model != null) {
            $model->delete();
        }
        return parent::delete();
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        //$this->password_hash = $password;
    }
}