<?php
namespace backend\modules\blog\modules\dashboard\controllers;


use backend\modules\blog\modules\dashboard\managers\PostManager;
use backend\modules\blog\modules\dashboard\managers\TagsManager;
use backend\modules\blog\modules\dashboard\models\Post;
use backend\modules\blog\modules\dashboard\models\Tag;
use backend\modules\blog\modules\dashboard\models\TagSearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class TagsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        /** @var TagsManager $tagManager */
        $tagManager = new TagsManager(new Tag());

        $tagManager->setData(\Yii::$app->request->post());

        if ($tagManager->save()) {
            return $this->redirect(['update', 'id' => $tagManager->getEntityID()]);
        }
        return $this->render('create', [
            'model' => $tagManager->getEntity(),
        ]);
    }

    public function actionUpdate($id)
    {
        /** @var TagsManager $tagManager */
        $tagManager = new TagsManager(new Tag());
        $tagManager->setData(\Yii::$app->request->post());

        if ($model = $tagManager->findEntityByID($id)) {
            if ($tagManager->save()) {
                return $this->redirect(['update', 'id' => $tagManager->getEntityID()]);
            }
        }
        return $this->render('update', ['model' => $tagManager->getEntity()]);
    }


    public function actionDelete($id)
    {
        /** @var TagsManager $tagManager */
        $tagManager = new TagsManager(new Tag());

        if ($model = $tagManager->findEntityByID($id))
        {
            $tagManager->delete();
        }
        $this->redirect(['index']);
    }
}