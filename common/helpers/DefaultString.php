<?php

namespace common\helpers;

/**
 * Class DefaultString
 * @package common\helpers
 */
class DefaultString
{
    public static function print_str($string, $default = "-")
    {
        return isset($string) && !empty($string) ? $string : $default;
    }
}