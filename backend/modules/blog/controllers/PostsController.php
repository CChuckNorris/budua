<?php
namespace backend\modules\blog\controllers;

use backend\modules\blog\modules\dashboard\managers\PostManager;

use backend\modules\blog\modules\dashboard\models\Post;
use yii\base\Module;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Class PostsController
 * @package backend\modules\blog\controllers
 */
class PostsController extends Controller
{

    public $layout = "/blog";

    /** @var mixed|\yii\web\Session **/
    protected $Session;

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->Session = \Yii::$app->session;
    }

    public function actionIndex()
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());

        $dataProvider = new ArrayDataProvider([
            'allModels' => $postManager->getPublished(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPost($slug)
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());

        if ($postManager->findEntityBySlug($slug))
        {
            return $this->render('_post', [
                'model' => $postManager->getEntity(),
            ]);
        }

        \Yii::$app->response->setStatusCode(404);
        $this->redirect('/site/404');

    }

}