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

    public static function getTitleAdvert($data){

        return $data['bedroom'].' Bed Rooms and '.$data['kitchen'].' Kitchen Room Aparment on Sale';
    }

    public static function getImageAdvert($data,$general = true,$original = false){

        $image = [];
        $base = '/';
        if($general){

            $image[] = $base.'uploads/adverts/'.$data['idadvert'].'/general/small_'.$data['general_image'];
        }
        else{
            $path = \Yii::getAlias("@frontend/web/uploads/adverts/".$data['idadvert']);
            $files = BaseFileHelper::findFiles($path);

            foreach($files as $file){
                if (strstr($file, "small_") && !strstr($file, "general")) {
                    $image[] = $base . 'uploads/adverts/' . $data['idadvert'] . '/' . basename($file);
                }
            }
        }

        return $image;
    }

    public static function substr($text,$start=0,$end=50){

        return mb_substr($text,$start,$end);
    }


    public static function getType($row){
        return ($row['sold']) ? 'Sold' : 'New';
    }




}