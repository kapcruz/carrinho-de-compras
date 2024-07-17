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
            'name' => $_ENV['MARIADB_TEST_DATABASE'],
            'host' => $_ENV['MARIADB_TEST_HOST'],
            'user' => $_ENV['MARIADB_TEST_USER'],
            'pass' => $_ENV['MARIADB_TEST_PASSWORD'],
            'port' => $_ENV['MARIADB_TEST_PORT'],
            'charset' => $_ENV['MARIADB_TEST_CHARSET']
        ]
    ],
    'version_order' => 'creation'
];
