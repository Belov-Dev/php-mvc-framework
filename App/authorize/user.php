<?php

return [
    'all' => [
        'login',
        'add',
        'task',
        'task/add',
    ],

    'admin' => [
        'task',
        'logout',
        'add',
        'edit',
        'task/edit',
        'task/edit{:id\d+}',
        'delete',
        'delete{:id\d+}',
    ],
];