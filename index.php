<?php

use App\Core\Router;

require_once 'App/Lib/dev.php';
require_once '.env';
require_once 'autoload.php';

session_start();

$router = new Router;
$router->run();