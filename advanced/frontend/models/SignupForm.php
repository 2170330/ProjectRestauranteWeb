<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $morada;
    public $nif;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'nome', 'morada', 'nif'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este utilizador já foi utilizado.'],
            [['username', 'email', 'nome', 'morada'], 'string', 'max' => 255],

            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este utilizador já foi utilizado.'],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já foi utilizado.'],
            
            ['password', 'string', 'min' => 6],

            ['nif', 'integer', 'min' => 9, 'message' => 'O nif tem de conter exatamente 9 carateres'],
            ['nif', 'unique', 'message' => 'Este nif já foi utilizado'],
            
            ['nome', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        /*if (!$this->validate()) {
        }*/

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        $user->nome = $this->nome;
        $user->morada = $this->morada;
        $user->nif = $this->nif;
        $user->save(false);

        // the following three lines were added:
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        $auth->assign($authorRole, $user->getId());

        return $user;

        //return null;
    }
}
