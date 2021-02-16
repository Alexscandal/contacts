<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use \yii\helpers\StringHelper;

class Users extends \yii\db\ActiveRecord
{
     
    public function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required', 'message' => 'Обязательно для заполенния.'],
            ['email', 'email', 'message' => 'Некорректный email.'],
            ['name', 'checkName'],
            ['email', 'checkEmail'],
            ['phone', 'checkPhone']
        ];
    }
    
    public function checkName()
    {
          $user = Users::find()
          ->where(['name'=>$this->name])
          ->one();
          if ($user) $this->addError('name', 'Пользователь с таким именем существует.');
    }

    public function checkEmail()
    {
          $user = Users::find()
          ->where(['email'=>$this->email])
          ->one();
          if ($user) $this->addError('email', 'Пользователь с таким адресом существует.');
    }

    public function checkPhone()
    {
          $user = Users::find()
          ->where(['phone'=>$this->phone])
          ->one();
          if ($user) $this->addError('phone', 'Пользователь с таким номером телефона существует.');
    }

}
