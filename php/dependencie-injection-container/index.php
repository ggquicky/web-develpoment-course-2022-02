<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/Database.php';

use League\Container\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$container = new Container();

$container->add('db', Database::class);

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");

    $db = $this->get('db');
    $db->dump();

    return $response;
});

$app->run();