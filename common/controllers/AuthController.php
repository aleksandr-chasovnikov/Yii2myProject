<?

namespace common\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

class AuthController extends Controller
{
    /**
     * Подключаемый шаблон представления
     */
    public $layout = 'inner';

    /**
     * @inheritdoc
     */
    public function init()
    {
        Yii::$app->view->registerJsFile('http://maps.googleapis.com/maps/api/js?sensor=false', ['position' => \yii\web\View::POS_HEAD]);
    }

    /**
     * Поведения
     */
    public function behaviors()
    {
        $behaviors = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];

        return $behaviors;
    }

}