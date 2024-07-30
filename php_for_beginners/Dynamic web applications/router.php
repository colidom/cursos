<?php

$routes = require('routes.php');

/**
 * @param $uri
 * @param $routes
 * @return void
 */
function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

/**
 * @param int $error_code
 * @return void
 */
function abort(int $error_code = Response::NOT_FOUND): void
{
    http_response_code($error_code);
    if ($error_code === $error_code) {
        require "views/{$error_code}.php";
    } else {
        require 'views/generic_error.php';
    }

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);
