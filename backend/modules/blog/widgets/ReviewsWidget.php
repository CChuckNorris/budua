<?php

namespace backend\modules\blog\widgets;

use yii\base\Widget;

/**
 * Class ReviewsSortControlsWidget
 * @package frontend\components
 */
class ReviewsWidget extends Widget
{
    public $entity_name;

    public $comments;

    public $entity_id;

    public $sort;

    public $sort_desc;

    public function run()
    {
        return $this->render("reviews-widget/view", [
            "entity_id" => $this->entity_id,
            "entity_name" => $this->entity_name,
            "sort" => $this->sort,
            "sort_desc" => $this->sort_desc,
            "comments" => $this->comments
        ]);
    }



}
