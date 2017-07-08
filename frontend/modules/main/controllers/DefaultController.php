<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\web\Controller;
use yii\db\Query;

class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $this->layout = "bootstrap";

        $query = new Query();

        $query_advert = $query->from('advert')->orderBy('idadvert desc');
        $command = $query_advert->limit(5); // ограничение для слайдера
        $result_general = $command->all();
        $count_general = $command->count(); // кружочки индикации слайдера

        $featured = $query_advert->limit(15)->all();
        $recommend_query  = $query_advert->where("recommend = 1")->limit(5);
        $recommend = $recommend_query->all();
        $recommend_count = $recommend_query->count(); // кружочки индикации слайдера

        return $this->render('index', compact(
                                'result_general', 
                                'count_general', 
                                'featured', 
                                'recommend', 
                                'recommend', 
                                'recommend_count'
                            ));
    }

    /**
     * Создание кэша
     */
    // public function actionService()
    // {
    //     $cache = \Yii::$app->cache;

    //     $cache->set("test",1);

    //     print $cache->get("test");

    // }

    /**
     * События
     */
    public function actionEvent()
    {
        $component = \Yii::$app->common; //new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail("test@domain.com","Test","Test text");
        $component->off(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);

    }

    /**
     * @inheritdoc
     */
    public function actionPath()
    {        // @yii
        // @app
        //@runtime
        //@webroot
        //@web
        //@vendor
        //@bower
        //@npm
        // @frontend
        // @backend

        print \Yii::getAlias('@test');
    }

    /**
     * @inheritdoc
     */
    public function actionCacheTest()
    {
        $locator = \Yii::$app->locator;
        $locator->cache->set('test',1);

        print   $locator->cache->get('test');
    }

    /**
     * @inheritdoc
     */
    public function actionLoginData()
    {
        print \Yii::$app->user->identity->username;
    }
}
