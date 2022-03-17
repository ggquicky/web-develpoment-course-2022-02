<?php

require_once __DIR__.'/Controller.php';
require_once __DIR__.'/Controller2.php';
require_once __DIR__.'/ControllerMethodsInterface.php';

use Controllers\{Controller,Controller2,ControllerMethodsInterface};

class UserController extends Controller implements ControllerMethodsInterface {
    use Controller2;

    protected array $urls = [
        '/users' => 'index',
        '/users/1' => 'show',
        '/users/1/edit' => 'edit',
        '/users/1/update' => 'update',
    ];

    public function edit()
    {
        $user = [
            'first_name' => 'Oscar',
            'last_name' => 'Molina',
        ];

        require_once __DIR__.'/../views/users/edit.view.php';
    }

    public function update()
    {
        $data = $_POST;

        header('Location: /');
        die;
    }

    public function index()
    {
        $this->log();

        $users = [
            [
                'first_name' => 'Hosmel',
                'last_name' => 'Quintana',
            ],
        ];

        require_once __DIR__.'/../views/users/index.view.php';
    }

    public function show()
    {
        $user = [
            'first_name' => 'Oscar',
            'last_name' => 'Molina',
        ];

        require_once __DIR__.'/../views/users/user.view.php';
    }
};

return new UserController();
