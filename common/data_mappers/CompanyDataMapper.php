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
        $query = $this->basicQuery()->where(['region.name' => $region])->orderBy(['mod_rating' => SORT_DESC]);
        return $query->asArray()->all();
    }

    public function getSortedBy($sort, $sort_desc, $region_name= false)
    {
        $sort_type = $sort_desc == 'desc' ? SORT_DESC : SORT_ASC;

        $query = $this->basicQuery();

        if ($region_name) {
            $regions = array_filter(array_map("trim", explode(",", $region_name)));
            if (count($regions) > 1) {
                $query->where(["region.name" => $regions]);
            } else {
                $query->where(["region.name" => $region_name]);
            }

        }

        if ($sort == 'popular') {
            return $query->orderBy(['reviews' => $sort_type])->asArray()->all();
        }

        if ($sort == 'bad-good') {
            return $query->joinWith('reviewsInfo')
                ->select('company.*, SUM(review.stars) as amountStars')->groupBy('company.id')->orderBy(['amountStars' => $sort_type])->asArray()->all();
        }

          return $query->groupBy('company.id')->orderBy(['created_at' => $sort_type])->asArray()->all();

    }

    private function basicQuery()
    {
        return $this->repository->find()->joinWith($this->getRelations());
    }

    private function getRelations()
    {
        return ["casesFiles", "activities", "regions"];
    }
}