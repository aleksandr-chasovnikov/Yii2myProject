<?
namespace frontend\components;

use Yii;
use yii\base\Component;

class Common extends Component
{

    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($subject, $text, $emailTo='k241285k@yandex.ru')
    {
        if (Yii::$app->mail->compose()
                    ->setFrom('k241285@yandex.ru')
                    ->setTo($emailTo)
                    ->setSubject($subject)
                    ->setHtmlBody($text)
                    ->send()) {

            $this->trigger(self::EVENT_NOTIFY);

            return true;
        }

            //         Yii::$app->mail->compose()
            // ->setFrom([ Yii::$app->params['supportEmail'] => Yii::$app->name])
            // ->setTo([$email => $name])
            // ->setSubject($subject)
            // ->setTextBody($body)
            // ->send();

        // $this->trigger(self::EVENT_NOTIFY);
        return false;
    }

    public function notifyAdmin($event){

        print "Notify Admin";
    }



}