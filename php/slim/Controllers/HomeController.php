<?php

namespace Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class HomeController
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response): Response
    {
        $view = Twig::fromRequest($request);

        $this->container->get('db');

        return $view->render($response, 'index.html', [
            'name' => 'Hosmel',
        ]);
    }
}
