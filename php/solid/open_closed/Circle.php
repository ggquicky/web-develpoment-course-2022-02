<?php

require_once __DIR__.'/Shape.php';

class Circle implements Shape
{
    public function __construct(private int $radius)
    {}

    public function area(): float
    {
        return $this->radius * $this->radius * pi();
    }
}
