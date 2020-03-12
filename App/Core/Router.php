<?php

namespace App\Core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arrRoutes = require_once 'App/conf/routes.php';

        foreach ($arrRoutes as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $getUrl = trim($_SERVER['REQUEST_URI'], '/');
        $url = explode('?',$getUrl);

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url[0], $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;

                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if (!$this->match()) {
            return print_r('Error 404 - маршрут не найден');
        }
        $path = 'App\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';

        if (!class_exists($path)) {
            return print_r("Контроллер [{$this->params['controller']}] не найден. [{$path}]" );
        }
        $method = $this->params['method'];

        if (!method_exists($path, $method)) {
            return print_r("Метод [{$method}] не найден ");
        }
        $controller = new $path($this->params);

        return $controller->$method();
    }
}