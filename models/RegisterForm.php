<?php

namespace app\models;

use yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $name;
    public $username;
    public $password;
    public $confirm_password;

    public function rules() {
        return [
            [['name', 'username', 'password', 'confirm_password'], 'required'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Nome',
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirmar Password',
        ];
    }

    public function register() {

        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        $user = new User([
            'name' => $this->name,
            'username' => $this->username,
            'password' => $hash,
        ]);

        return $user->save();
    }
}