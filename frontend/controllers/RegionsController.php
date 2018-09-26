<?php

namespace frontend\controllers;

use common\data_mappers\ActivityDirectionDataMapper;
use common\data_mappers\CompanyDataMapper;
use common\models\Company;
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

        $result = $companyDataMapper->getCompaniesByRegion($region);

        return $this->render("index",
            [
                "items" => $result,
                "region" => $region
            ]
        );
    }
}
