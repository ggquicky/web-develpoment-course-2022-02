<?php

require_once './Router.php';

$router = new Router(
    [
        '' => 'controllers/IndexController.php',
        '/users' => 'controllers/UserController.php',
        '/users/1' => 'controllers/UserController.php',
        '/users/1/edit' => 'controllers/UserController.php',
    ]
);

$router->load();
