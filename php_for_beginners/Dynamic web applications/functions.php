<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($error_code = 404)
{
    http_response_code($error_code);
    if ($error_code === 404) {
        require "views/{$error_code}.php";
    } else {
        require 'views/generic_error.php';
    }

    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}
