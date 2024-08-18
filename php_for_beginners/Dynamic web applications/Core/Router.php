<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }

    public function post($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }

    public function put($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT'
        ];
    }

    public function patch($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH'
        ];
    }

    public function delete($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
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
        if ($error_code === $error_code) {
            require base_path("views/{$error_code}.php");
        } else {
            require base_path('views/generic_error.php');
        }
        die();
    }

}
