<?php

namespace app\controllers;

//use Yii;
//use yii\filters\AccessControl;
//use yii\web\Response;
//use yii\filters\VerbFilter;
use app\models\Post;
use yii\data\Pagination;

class PostController extends AppController
{
    /**
     * @inheritdoc
     */
    public function actionIndex()
    {
        $query = Post::find()
                ->select('id, title, abridgment')
                ->orderBy('id DESC');

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
            'pageSizeParam' => false,  // улучшить вид адресной строки
            'forcePageParam' => false, // улучшить вид адресной строки
        ]);

        $posts = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', compact('posts', 'pagination'));
    }

    /**
     * @inheritdoc
     */
    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $post = Post::findOne($id);

        if (empty($post)) throw new \yii\web\HttpException(404, 'Такой страницы нет...');

        return $this->render('view', compact('post'));
    }
}