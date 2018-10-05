<?php

namespace frontend\helpers;

use common\data_mappers\RegionDataMapper;
use common\models\Region;

/**
 * Class RegionsLinker
 * @package frontend\helpers
 */
class RegionsLinker
{
    public function __construct()
    {
        $this->dataMapper = new RegionDataMapper(new Region());
    }

    public function getRegionsLinked($company_regions)
    {
        $links = [];

        $regions_arr = explode(",", $company_regions);
        $regions_arr = array_filter(array_map("trim", $regions_arr));

        foreach ($this->dataMapper->getAll() as $region) {
            foreach ($regions_arr as $region_name) {
                if ($region_name == $region["name"]) {
                    $links[] = \yii\helpers\Html::a($region["name"], \yii\helpers\Url::toRoute('regions/' . $region["alias"]));
                }
            }
        }

        return implode(", ", $links);
    }

}