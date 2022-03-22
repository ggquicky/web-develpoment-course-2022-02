<?php

require_once __DIR__.'/Circle.php';
require_once __DIR__.'/Square.php';

class AreaCalculator
{
    public function calculate(array $shapes): float
    {
        $area = [];

        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}

$ac = new AreaCalculator();

$area = $ac->calculate(
    [
        new Square(10),
        new Circle(12),
    ]
);

var_dump($area);