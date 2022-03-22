<?php

require_once __DIR__.'/Shape.php';

class Square implements Shape
{
    public function __construct(private int $size)
    {}

    public function area(): float
    {
        return $this->size * $this->size;
    }
}
