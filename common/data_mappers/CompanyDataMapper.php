<?php

namespace common\data_mappers;

use common\models\Company;

/**
 * Class CompanyDataMapper
 * @package common\data_mappers
 */
class CompanyDataMapper
{
    private $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;
    }

    public function getAll()
    {
        return $this->basicQuery()->orderBy([ 'mod_rating' => SORT_DESC])->asArray()->all();
    }

    public function getCompaniesByActivity($activity_alias)
    {
        return $this->basicQuery()->where(["activity_direction.alias" => $activity_alias])->orderBy(['mod_rating' => SORT_DESC])->asArray()->all();
    }

    public function getCompaniesByRegion($region)
    {
        $query = $this->basicQuery()->where(['like', 'regions', $region])->orderBy(['mod_rating' => SORT_DESC]);
        return $query->asArray()->all();
    }

    public function getSortedBy($sort, $sort_desc)
    {
        $sort_type = $sort_desc == 'desc' ? SORT_DESC : SORT_ASC;

        if ($sort == 'popular') {
            return $this->basicQuery()->orderBy(['reviews' => $sort_type])->asArray()->all();
        }

        if ($sort == 'bad-good') {
            return $this->basicQuery()->joinWith('reviewsInfo')
                ->select('company.*, SUM(review.stars) as amountStars')->groupBy('company.id')->orderBy(['amountStars' => $sort_type])->asArray()->all();
        }

          return $this->basicQuery()->groupBy('company.id')->orderBy(['created_at' => $sort_type])->asArray()->all();

    }

    private function basicQuery()
    {
        return $this->repository->find()->joinWith($this->getRelations());
    }

    private function getRelations()
    {
        return ["casesFiles", "activities"];
    }
}