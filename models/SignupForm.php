<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model //модеь-прослойка
{

    public $username;
    public $email;
    public $password;

    public function rules() // Эти правила будут использоваться при валидации: формы ввода, с помощью вызова метода validate(), при попытки сохранения в таблицу БД
    {
        return [
            [['username', 'email'], 'trim'],
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'string', 'min' => 6, 'max'=>50],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Это имя пользователя уже существует'], // 'username' в модели \app\models\User(то есть в таблице user(вспоминаем ActivityRecords) должна быть уникальна) 
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот email уже существует'],
        ];
    }

    public function attributeLabels() // Используется для локализации
    {
        return [
            'username' => 'Логин',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    public function signup() // Регистрация
    {
        $user = new User(); // Используем AcriveRecord User
        $user->username = $this->username; // Определяем свойства объекта
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = time();

        return $user->save(); // Сохраняем свойства в таблицу(метод ActivityRecord) user если переменная не равна null
    }
}
