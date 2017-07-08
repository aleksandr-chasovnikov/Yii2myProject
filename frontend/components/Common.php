<?
namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;


class Common extends Component
{
    /**
     * @inheritdoc
     */
    const EVENT_NOTIFY = 'notify_admin';

    /**
     * @inheritdoc
     */
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
        return false;
    }

    /**
     * @inheritdoc
     */
    public function notifyAdmin($event)
    {
        print "Notify Admin";
    }

    /**
     * Генерирует название для объявления
     */
    public static function getTitleAdvert($data)
    {
        return $data['bedroom'];
    }

    /**
     * Генерация пути для картинки
     */
    public static function getImageAdvert($data,$general = true,$original = false)
    {

        $image = [];
        $base = '/';

        if($general) {

            $image[] = $base.'uploads/adverts/'.$data['idadvert'].'/general/small_'.$data['general_image'];
        } else {

            $path = \Yii::getAlias("@frontend/web/uploads/adverts/".$data['idadvert']);
            $files = BaseFileHelper::findFiles($path);

            foreach($files as $file) {

                if (strstr($file, "small_") && !strstr($file, "general")) {
                    
                    $image[] = $base . 'uploads/adverts/' . $data['idadvert'] . '/' . basename($file);
                }
            }
        }

        return $image;
    }

    /**
     * @inheritdoc
     */
    public static function substr($text,$start=0,$end=50)
    {
        return mb_substr($text,$start,$end);
    }
    
    /**
     * @inheritdoc
     */
    public static function getType($row)
    {
        return ($row['sold']) ? 'Sold' : 'New';
    }
    
    /**
     * @inheritdoc
     */
    public function getUrlAdvert($row){

        return Url::to(['/main/main/view-advert', 'id' => $row['idadvert']]);
    }

}