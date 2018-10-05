<?php

namespace frontend\controllers;

use common\data_mappers\CompanyDataMapper;
use common\data_mappers\RegionDataMapper;
use common\models\Company;
use common\models\Region;
use yii\web\Controller;


/**
 * ActivityDirectionsController implements the CRUD actions for ActivityDirection model.
 */
class RegionsController extends Controller
{
    public $layout = "common";

    public function actionIndex($region)
    {
        /** @var CompanyDataMapper $companyDataMapper */
        $companyDataMapper = new CompanyDataMapper(new Company());

        /** @var RegionDataMapper  $regionDataMapper */
        $regionDataMapper = new RegionDataMapper(new Region());

        $result = [];

        /** @var Region $Region */
        if ($Region = $regionDataMapper->getByAlias($region))
        {
            $result = $companyDataMapper->getCompaniesByRegion($Region->name);
        }

        return $this->render("index",
            [
                "items" => $result,
                "region" => $Region
            ]
        );
    }
}
