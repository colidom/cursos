<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;
use Exception;

class Router
{
    protected array $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] === strtoupper($method)) {
                // Apply the middleware
                Middleware::resolve($route['middleware']);
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }
        $this->abort();
    }

    /**
     * @param int $error_code
     * @return void
     */
    function abort(int $error_code = Response::NOT_FOUND): void
    {
        http_response_code($error_code);

        $error_view = base_path("views/{$error_code}.php");

        if (file_exists($error_view)) {
            require $error_view;
        } else {
            require base_path('views/generic_error.php');
        }

        die();
    }

}
