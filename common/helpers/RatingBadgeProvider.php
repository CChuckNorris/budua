<?php

namespace common\helpers;

/**
 * Class RatingBadgeProvider
 * @package common\helpers
 */
class RatingBadgeProvider
{
    const RISK_CLASS = 'risk-badge';
    const CHECKED_CLASS = 'checked-badge';
    const VIP_CLASS = 'vip-badge';

    public function getBadgeClass($risk = 0, $checked = 0, $vip = 0)
    {
        if ($risk) return self::RISK_CLASS;

        if ($checked) return self::CHECKED_CLASS;

        if ($vip) return self::VIP_CLASS;

        return '';
    }
}