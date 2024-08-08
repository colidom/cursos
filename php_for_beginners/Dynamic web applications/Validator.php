<?php

class Validator {
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value, $min = 1, $max = INF): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}