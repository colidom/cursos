<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => GUEST::class,
        'auth' => AUTH::class
    ];

    public static function resolve($key) {
        if (!$key) return;

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching Middleware found for key $key");
        }

        (new $middleware)->handle();
    }
}