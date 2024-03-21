<?php 
ini_set('display_errors', '1');

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\ShoppingCart\Models\Product;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/ShoppingCart/bootstrap.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    
    $product = Product::all();
    var_dump($product);
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();
