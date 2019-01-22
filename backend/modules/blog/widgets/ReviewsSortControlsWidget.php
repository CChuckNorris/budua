<?php

namespace backend\modules\blog\widgets;

use yii\base\Widget;

/**
 * Class ReviewsSortControlsWidget
 * @package frontend\components
 */
class ReviewsSortControlsWidget extends Widget
{
    public $entity_id;

    public $target_url = 'review-sorting/index';

    public $sort;

    public $sort_desc;

    public function run()
    {
        return $this->render("review-sort-control-widget/view", [
            "entity_id" => $this->entity_id,
            "target_url" => $this->target_url,
            "sort" => $this->sort,
            "sort_desc" => $this->sort_desc
        ]);
    }



}
