<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/infrastructure/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/infrastructure/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => $_ENV['MARIADB_HOST'],
            'name' => $_ENV['MARIADB_DATABASE'],
            'user' => $_ENV['MARIADB_USER'],
            'pass' => $_ENV['MARIADB_PASSWORD'],
            'port' => $_ENV['MARIADB_PORT'],
            'charset' => $_ENV['MARIADB_CHARSET']
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
