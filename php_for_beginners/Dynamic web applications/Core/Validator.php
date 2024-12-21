<?php

namespace Core;

class Validator {

    /**
     * @param $value
     * @param int $min
     * @param int|null $max
     * @return bool
     */
    public static function string($value, int $min = 1, int $max = null): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * @param $value
     * @param int $min
     * @param float $max
     * @return bool
     */
    public static function email($value, int $min = 1, float $max = INF): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function loginPassword($value): bool
    {
        return !empty(trim($value));
    }

}