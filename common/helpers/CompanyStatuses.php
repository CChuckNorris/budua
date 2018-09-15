<?php

namespace common\helpers;

class CompanyStatuses
{
    const CHECKED_STATUS = 'checked';

    const VIP_STATUS = 'vip';

    const RISK_STATUS = 'risk';

    public static function getStatuses($with_labels = true)
    {
        if ($with_labels) {
            return [
                self::VIP_STATUS => 'Vip',
                self::CHECKED_STATUS => 'Проверенный',
                self::RISK_STATUS => 'Рискованный'];
        }
        return [self::VIP_STATUS, self::CHECKED_STATUS, self::RISK_STATUS];
    }
}