<?php

class IndexController {
    protected array $urls = [
        '' => 'index',
    ];

    public function load(string $uri): void
    {
        $method = $this->urls[$uri] ?? null;

        if (! $method) {
            throw new Exception('Method not found.');
        }

        $this->$method();
    }

    public function index()
    {
        require_once __DIR__.'/../views/index.view.php';
    }
};

return new IndexController();
