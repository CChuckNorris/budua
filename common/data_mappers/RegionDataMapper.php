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

    public function getdByName($name)
    {
        return $this->repository->find()->where(['name' => $name])->one();
    }
}