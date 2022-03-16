<?php

class UserController {
    protected array $urls = [
        '/users' => 'index',
        '/users/1' => 'show',
        '/users/1/edit' => 'edit',
    ];

    public function load(string $uri): void
    {
        $method = $this->urls[$uri] ?? null;

        if (! $method) {
            throw new Exception('Method not found.');
        }

        $this->$method();
    }

    public function edit()
    {
        $user = [
            'first_name' => 'Oscar',
            'last_name' => 'Molina',
        ];

        require_once __DIR__.'/../views/users/edit.view.php';
    }

    public function index()
    {
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
