<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;

require '../../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
   //  $response->getBody()->write("Hello world!");
    var_dump('Hello world');
    return $response;
});

$app->run();