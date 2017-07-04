<?php

namespace frontend\models;

use Yii;
use yii\helpers\Url;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => Url::to(['main/captcha'])],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Подтвердите код',
            'name' => 'Имя',
            'email' => 'Электронный адрес',
            'subject' => 'Тема',
            'body' => 'Сообщение',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    // public function sendEmail($email)
    // {
    //     return Yii::$app->mail->compose()
    //         ->setTo($email)
    //         ->setFrom([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
    public function sendEmail($emailto)
    {
        if ($this->validate()) {

            Yii::$app->mailer->compose() 
                ->setFrom([$this->email => $this->name])
                ->setTo($emailto)
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;    
    }
    // {
    //     if (Yii::$app->mail->compose()
    //             ->setFrom($emailFrom)
    //             ->setTo( Yii::$app->params['adminEmail'] )
    //             ->setSubject($subject)
    //             ->setTextBody($text)
    //             ->send()) {

    //         // $this->trigger(self::EVENT_NOTIFY);

    //         return true;
    //     }
    //     return false;
    // }
}
