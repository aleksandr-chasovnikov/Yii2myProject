<?

namespace common\cache;

use yii\caching\FileCache;

class Base64Cache extends FileCache
{
    /**
     * Добавление суффикса к каждому сохраненному файлу
     */
    public $cacheFileSuffix = '.base64';

    /**
     * Получить значение по ключу из кэша
     */
    protected function getValue($key)
    {
        $value = base64_decode(parent::getValue($key));
        return $value;
    }

    /**
     * Задать значение в кэш
     */
    protected function setValue($key, $value, $duration){
        $value = base64_encode($value);
        parent::setValue($key,$value,$duration);
    }

}