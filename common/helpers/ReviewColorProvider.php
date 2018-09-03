<?php

namespace common\helpers;

/**
 * Class ReviewColorProvider
 * @package common\helpers
 */
class ReviewColorProvider
{
    const LOW = "low-review-color";

    const MEDIUM = "medium-review-color";

    const EXCELLENT = "hight-review-color";

    public function getColoredClass($stars)
    {
        if ($stars <= 2) return self::LOW;

        if ($stars == 3) return self::MEDIUM;

        return self::EXCELLENT;
    }
}