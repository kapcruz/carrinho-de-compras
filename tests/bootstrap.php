<?php

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['MARIADB_TEST_HOST'],
    'database' => $_ENV['MARIADB_TEST_DATABASE'],
    'username' => $_ENV['MARIADB_TEST_USER'],
    'password' => $_ENV['MARIADB_TEST_PASSWORD'],
    'charset' => $_ENV['MARIADB_TEST_CHARSET'],
    'collation' => $_ENV['MARIADB_TEST_COLLATION'],
    'prefix' => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)

$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
