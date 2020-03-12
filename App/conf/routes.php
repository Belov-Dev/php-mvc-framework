<?php

return [
    // TaskController
    'index.php'=> [
        'controller' => 'task',
        'method' => 'index',
    ],

    '' => [
        'controller' => 'task',
        'method' => 'index',
    ],

    'task' => [
        'controller' => 'task',
        'method' => 'index',
    ],

    'task/page/{page:\d+}' => [
        'controller' => 'task',
        'method' => 'index',
    ],

    'task/edit/{id:\d+}' => [
        'controller' => 'task',
        'method' => 'edit',
    ],

    'task/edit/' => [
        'controller' => 'task',
        'method' => 'edit',
    ],

    'task/add' => [
        'controller' => 'task',
        'method' => 'add',
    ],

    'task/delete/{id:\d+}' => [
        'controller' => 'task',
        'method' => 'delete',
    ],

    // UserController
    'login' => [
        'controller' => 'user',
        'method' => 'login',
    ],

    'logout' => [
        'controller' => 'user',
        'method' => 'logout',
    ],
];