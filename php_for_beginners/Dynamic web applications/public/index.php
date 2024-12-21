<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Router();
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($router->previousUrl());
}

Session::unflashit();
