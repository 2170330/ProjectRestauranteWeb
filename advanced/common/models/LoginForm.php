<?php
namespace common\models;

use backend\models\Utilizador;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Login form
 */
class LoginForm extends ActiveRecord
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_utilizador;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            return Yii::$app->user->login($user);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return Utilizador|null
     */
    protected function getUser()
    {
        if ($this->_utilizador === null) {
            $this->_utilizador = Utilizador::findByUsername($this->username);
    }

        return $this->_utilizador;
    }
}
