<?php

namespace backend\modules\blog\modules\dashboard\controllers;

use backend\modules\blog\modules\dashboard\managers\CategoriesManager;
use backend\modules\blog\modules\dashboard\models\Category;
use backend\modules\blog\modules\dashboard\models\CategorySearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class CategoriesController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        /** @var CategoriesManager $tagManager */
        $categoriesManager = new CategoriesManager(new Category());

        $categoriesManager->setData(\Yii::$app->request->post());

        if ($categoriesManager->save()) {
            return $this->redirect(['update', 'id' => $categoriesManager->getEntityID()]);
        }
        return $this->render('create', [
            'model' => $categoriesManager->getEntity(),
        ]);
    }

    public function actionUpdate($id)
    {
        /** @var CategoriesManager $categoriesManager */
        $categoriesManager = new CategoriesManager(new Category());
        $categoriesManager->setData(\Yii::$app->request->post());

        if ($model = $categoriesManager->findEntityByID($id)) {
            if ($categoriesManager->save()) {
                return $this->redirect(['update', 'id' => $categoriesManager->getEntityID()]);
            }
        }
        return $this->render('update', ['model' => $categoriesManager->getEntity()]);
    }


    public function actionDelete($id)
    {
        /** @var CategoriesManager $categoriesManager */
        $categoriesManager = new CategoriesManager(new Category());
        if ($model = $categoriesManager->findEntityByID($id))
        {
            $categoriesManager->delete();
        }
        $this->redirect(['index']);
    }
}