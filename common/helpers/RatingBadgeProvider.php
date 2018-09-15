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


    public function getBadgeClass($status)
    {
        if (CompanyStatuses::RISK_STATUS == $status) return self::RISK_CLASS;

        if (CompanyStatuses::CHECKED_STATUS == $status) return self::CHECKED_CLASS;

        if (CompanyStatuses::VIP_STATUS == $status) return self::VIP_CLASS;

        return '';
    }
}