<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
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

routeToController($uri, $routes);
