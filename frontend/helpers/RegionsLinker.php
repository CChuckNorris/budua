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

    public function getRegionsLinked($company_regions)
    {
        $links = [];

        foreach ($company_regions as $region) {
            $links[] = \yii\helpers\Html::a($region["name"], \yii\helpers\Url::toRoute('regions/' . $region["alias"]));
        }

        return implode(", ", $links);
    }

}