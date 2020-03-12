<?php

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    $path = __DIR__ . '/' . $path;

    if (file_exists($path)) {
        require_once $path;
    };
});