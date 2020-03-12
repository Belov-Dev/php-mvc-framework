<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'autoload.php';

function dd ($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
    exit;
};