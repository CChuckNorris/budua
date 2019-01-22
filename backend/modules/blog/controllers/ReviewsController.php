<?php
namespace backend\modules\blog\controllers;

use backend\modules\blog\modules\dashboard\managers\PostManager;

use backend\modules\blog\modules\dashboard\managers\ReviewManager;
use backend\modules\blog\modules\dashboard\models\Post;
use backend\modules\blog\modules\dashboard\models\Reviews;
use yii\base\Module;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Class PostsController
 * @package backend\modules\blog\controllers
 */
class ReviewsController extends Controller
{

    public function actionAddReviewAjax()
    {
        $reviewManager = new ReviewManager(new Reviews());
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $reviewManager->setData(\Yii::$app->request);

        if (!$reviewManager->save())
        {
            return ["status" => false];
        }

        return $this->renderAjax("index", ["post_id" => $reviewManager->getPostID()]);
    }


    public function actionAddReview()
    {
        $reviewManager = new ReviewManager(new Reviews());

        $reviewManager->setData(\Yii::$app->request);

        if (!$reviewManager->save())
        {

        }
        return $this->redirect(\Yii::$app->request->referrer."#sortreviews");
    }



}