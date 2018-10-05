<?php

namespace frontend\controllers;

use common\data_mappers\CompanyDataMapper;
use common\models\Company;
use yii\web\Controller;

/**
 * Class ReviewSortingController
 * @package frontend\controllers
 */
class CompanyRatingSortingController extends Controller
{
    public function actionIndex($sort = null, $sort_desc = null, $region_name = false)
    {
        $companyDataMapper = new CompanyDataMapper(new Company());

        return  \frontend\components\FullCompaniesRatingWidget::widget(['items' => $companyDataMapper->getSortedBy($sort, $sort_desc, $region_name)]);
    }
}
