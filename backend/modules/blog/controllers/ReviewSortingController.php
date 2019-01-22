<?php
namespace backend\modules\blog\controllers;

use backend\modules\blog\modules\dashboard\models\Reviews;
use backend\modules\blog\widgets\PostsReviewsWidget;
use common\models\Review;
use yii\web\Controller;

/**
 * Class ReviewSortingController
 * @package frontend\controllers
 */
class ReviewSortingController extends Controller
{
    public function actionIndex($id, $sort = null, $sort_desc = null)
    {
        $comments = Reviews::getAllComments($id, $sort, $sort_desc);

        return PostsReviewsWidget::widget(["items" => $comments]);
    }
}
