<?php

namespace Core;

class Router
{
    protected array $routes = [];

r    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller) {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller) {
        $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller) {
        $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller) {
        $this->add('DELETE', $uri, $controller);
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
