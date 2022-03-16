<?php

require_once __DIR__.'/Controller.php';
require_once __DIR__.'/Controller2.php';
require_once __DIR__.'/ControllerMethodsInterface.php';

use Controllers\Controller;
use Controllers\Controller2;
use Controllers\ControllerMethodsInterface;

class IndexController extends Controller implements ControllerMethodsInterface {
    use Controller2;

    protected array $urls = [
        '' => 'index',
    ];

    public function index()
    {
        $this->log();

        require_once __DIR__.'/../views/index.view.php';
    }
};

return new IndexController();
