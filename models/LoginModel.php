<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginModel extends Model
{
    public $username;
    public $password;
    
    const user = 'admin';
    const pass = 'admin';

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }

    public function login() {
        if ($this->validate()) {
               $session = Yii::$app->session;
               if ($this->username == self::user && $this->password == self::pass) {
                    $session->set('auth', true);
                    return true;
               }
        }
        return false;
    }

}
