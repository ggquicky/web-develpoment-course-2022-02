<?php

namespace Controllers\Api;

abstract class Controller {
    protected array $urls = [];

    abstract public function index();
}
