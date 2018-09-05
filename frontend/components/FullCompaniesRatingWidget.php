<?php

namespace frontend\components;

use yii\helpers\Url;

class FullCompaniesRatingWidget extends CompaniesRatingWidget
{

    private $img_dir = "/frontend/web/mt/img/";


    public function run()
    {
        return $this->render("full-companies-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getCompanyLink($alias)
    {
        return Url::toRoute(['main/company', 'alias'=>$alias]);
    }

    public function getLogoPath($item)
    {
        return $this->img_dir . $item['logo'];
    }

    /**
     * @param $regions
     * @param int $limit
     * @return string
     */
    public function getLimitedRegions($regions, $limit = 4)
    {
        if (!$regions) return "-";

        $regions_arr = explode(",", $regions);
        if (empty($regions_arr)) return $regions;

        if (count($regions_arr) <= $limit) return $regions;

        return implode(",", array_slice($regions_arr, 0, $limit));
    }

    public function checkValue($value)
    {
        return empty($value) || !$value ? false : true;
    }
}
