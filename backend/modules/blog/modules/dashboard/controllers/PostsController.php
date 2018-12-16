<?php
namespace backend\modules\blog\modules\dashboard\controllers;

use backend\modules\blog\modules\dashboard\managers\PostManager;
use backend\modules\blog\modules\dashboard\models\Post;
use backend\modules\blog\modules\dashboard\models\PostSearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Class PostsController
 * @package backend\modules\blog\modules\dashboard\controllers
 */
class PostsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());

        $postManager->setData(\Yii::$app->request->post());

        if ($postManager->save()) {
            return $this->redirect(['update', 'id' => $postManager->getEntityID()]);
        }
        return $this->render('create', [
            'model' => $postManager->getEntity(),
        ]);
    }

    public function actionUpdate($id)
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());
        $postManager->setData(\Yii::$app->request->post());

        if ($model = $postManager->findEntityByID($id)) {
            $postManager->initTags();
            if ($postManager->save()) {
                return $this->redirect(['update', 'id' => $postManager->getEntityID()]);
            }
        }
        return $this->render('update', ['model' => $postManager->getEntity()]);
    }


    public function actionDelete($id)
    {
        /** @var PostManager $postManager */
        $postManager = new PostManager(new Post());

        if ($model = $postManager->findEntityByID($id))
        {
            $postManager->delete();
        }
        $this->redirect(['index']);
    }
}