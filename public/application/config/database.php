<?php

return [
    'default-connection' => 'concrete',
    'connections' => [
        'concrete' => [
            'driver' => 'c5_pdo_mysql',
            'server' => 'localhost',
            'database' => 'shop4cdb',
            'username' => 'root',
            'password' => '5points',
            'charset' => 'utf8',
        ],
    ],
];
