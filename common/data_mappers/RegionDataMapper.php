<?php

namespace common\data_mappers;

use common\models\Region;

/**
 * Class RegionDataMapper
 * @package common\data_mappers
 */
class RegionDataMapper
{
    private $repository;

    public function __construct(Region $region)
    {
        $this->repository = $region;
    }

    public function getByName($name)
    {
        return $this->repository->find()->where(['name' => $name])->one();
    }
    public function getByAlias($alias)
    {
        return $this->repository->find()->where(['alias' => $alias])->one();
    }

    public function getAll()
    {
        return $this->repository->find()->asArray()->all();
    }
}