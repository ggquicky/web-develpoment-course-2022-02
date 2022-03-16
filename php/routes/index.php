<?php

require_once './Router.php';

var_dump(Router::class);

$router = new Router(
    [
        '' => 'controllers/index.controller.php',
        '/users' => 'controllers/user.controller.php',
        '/users/1' => 'controllers/user.controller.php',
        '/users/1/edit' => 'controllers/user.controller.php',
    ]
);

$router->load();
