<?php

namespace App\Core;

class View
{
    private $path;
    private $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['method'];
    }

    public function render($title, $vars = [])
    {
        extract($vars, EXTR_PREFIX_SAME, "extra");
        $path = 'Views/' . $this->path . '.php';

        if (!file_exists($path)) {
            return print_r("Вид [{$this->path}] не найден");
        }
        ob_start();

        require_once $path;
        $content = ob_get_clean();

        require_once 'Views/layouts/' . $this->layout . '.php';
    }

    public function redirect($url)
    {
        return header("Location: ".$url);
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status,'message' => $message],  JSON_UNESCAPED_UNICODE));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url],  JSON_UNESCAPED_UNICODE));
    }
}