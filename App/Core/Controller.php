<?php


namespace App\Core;

use App\Core\View;

abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;
    protected $right;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($this->route['controller']);
    }

    public function loadModel($name)
    {
        $path = 'App\Models\\' . ucfirst($name);

        if (!class_exists($path)) {
            return print_r("Модель [{$name}] не найдена ");
        }
        return new $path;
    }

    public function checkRight()
    {
        $this->right = require_once 'App/authorize/' . $this->route['controller'] . '.php';

        if ($this->isRight('all')) {
            return true;

        } elseif (isset($_SESSION['admin']) && $this->isRight('admin')) {
            return true;
        }
        return false;
    }

    public function adminRight()
    {
        $this->right = require_once 'App/authorize/' . $this->route['controller'] . '.php';

        if (isset($_SESSION['admin']) && $this->isRight('admin')) {
            return true;
        }
        return false;
    }

    public function isRight($key)
    {
        return in_array($this->route['method'], $this->right[$key]);
    }
}