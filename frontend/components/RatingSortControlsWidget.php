<?php

namespace frontend\components;

use yii\base\Widget;

/**
 * Class ReviewsSortControlsWidget
 * @package frontend\components
 */
class RatingSortControlsWidget extends Widget
{
    public $gist;

    public $entity_id;

    public $target_url = '/company-rating-sorting/index';

    public $sort;

    public $sort_desc;

    public $region_name = false;

    public function run()
    {
        return $this->render("rating-sort-control-widget/view", [
            "target_url" => $this->target_url,
            "sort" => $this->sort,
            "sort_desc" => $this->sort_desc,
            "region_name" => $this->region_name
        ]);
    }



}
