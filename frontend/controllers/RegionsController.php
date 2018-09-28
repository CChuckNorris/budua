<?php

namespace frontend\controllers;

use common\data_mappers\ActivityDirectionDataMapper;
use common\data_mappers\CompanyDataMapper;
use common\data_mappers\RegionDataMapper;
use common\models\Company;
use common\models\Region;
use Yii;
use common\models\ActivityDirection;
use common\models\ActivityDirectionSearch;
use yii\base\InvalidConfigException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        /** @var Region $Region */
        $Region = $regionDataMapper->getdByName($region);

        $result = $companyDataMapper->getCompaniesByRegion($region);

        return $this->render("index",
            [
                "items" => $result,
                "region" => $Region
            ]
        );
    }
}
