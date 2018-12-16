<?php
namespace backend\modules\blog\controllers;


use backend\modules\blog\modules\dashboard\managers\PostManager;
use backend\modules\blog\modules\dashboard\managers\TagsManager;
use backend\modules\blog\modules\dashboard\models\Post;
use backend\modules\blog\modules\dashboard\models\Tag;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Class TagsController
 * @package backend\modules\blog\controllers
 */
class TagsController extends Controller
{

    public $layout = "/blog";

    public function actionTag($slug)
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());
        $tagManager = new TagsManager(new Tag());
        if ($model = $tagManager->findBySlug($slug))
        {
            $dataProvider = new ArrayDataProvider([
                'allModels' => $postManager->getByTagSlug($slug),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('tag', [
                'dataProvider' => $dataProvider,
                'model' => $model
            ]);
        }

        \Yii::$app->response->setStatusCode(404);
        $this->redirect('/site/404');

    }

}