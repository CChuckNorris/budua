<?php
namespace backend\modules\blog\controllers;


use backend\modules\blog\modules\dashboard\managers\CategoriesManager;
use backend\modules\blog\modules\dashboard\managers\PostManager;
use backend\modules\blog\modules\dashboard\models\Category;
use backend\modules\blog\modules\dashboard\models\Post;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Class CategoriesController
 * @package backend\modules\blog\controllers
 */
class CategoriesController extends Controller
{
    public $layout = "/blog";

    public function actionCategory($slug)
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());
        $categoryManager = new CategoriesManager(new Category());
        if ($model = $categoryManager->findBySlug($slug))
        {
            $dataProvider = new ArrayDataProvider([
                'allModels' => $postManager->getByCategorySlug($slug),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            return $this->render('category', [
                'dataProvider' => $dataProvider,
                'model' => $model
            ]);
        }

        \Yii::$app->response->setStatusCode(404);
        $this->redirect('/site/404');

    }

}