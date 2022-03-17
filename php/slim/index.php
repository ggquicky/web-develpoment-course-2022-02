<?php

require __DIR__.'/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = AppFactory::create();
$twig = Twig::create('views', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));
$app->add(new MethodOverrideMiddleware());

$app->get('/', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'index.html', [
        'name' => 'Hosmel',
    ]);
});

$app->get('/users', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'users/index.html', [
        'users' => [
            [
                'id' => 1,
                'name' => 'Hosmel',
            ],
            [
                'id' => 2,
                'name' => 'Oscar',
            ],
        ],
    ]);
});

$app->get('/users/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'users/show.html', [
        'id' => $args['id'],
    ]);
});

$app->patch('/users/{id}', function (Request $request, Response $response, $args) {
    $params = (array) $request->getParsedBody();
    var_dump($params, $args);
    die;
});

$app->run();
