<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
// use app\model\User; 
/**
 * Signup form
 */
class Register extends Model
{
 
    public $username;
    public $email;
    public $password;
    public $img;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            [['email'], 'required'],
            ['email', 'email'],            
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = md5($this->password);
        return $user->save() ? $user : null;
    }

    
 
}
