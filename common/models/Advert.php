<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use frontend\components\Common;

/**
 * This is the model class for table "advert".
 *
 * @property integer $idadvert
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * По умолчанию заполняет поля created_at, updated_at
     */
    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'type', 'recommend'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 50],
            //['general_image', 'file', 'extensions' => ['jpg','png','gif']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idadvert' => 'Idadvert',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent' => 'Fk Agent Detail',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Получить пользователя
     */
    public function getUser()
    {
        return $this->hasOne( User::className(),['id' => 'fk_agent']);
    }

    /**
     * Получить заголовок
     */
    public function getTitle()
    {
        return Common::getTitleAdvert($this);
    }

    /**
     * После валидации запоминаем id
     */
    public function afterValidate()
    {
        $this->fk_agent = Yii::$app->user->identity->id;
    }
    /**
     * После сохранения в БД поместить id в сессию
     */
    public function afterSave()
    {
        Yii::$app->locator->cache->set('id', $this->idadvert);
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}
