<?php

class Coffee
{
    public function make(): void
    {
        $this->addMilk()
            ->addSugar();
    }

    public function addMilk()
    {
        return $this;
    }

    public function addSugar()
    {
        return $this;
    }
}

$c = new Caffee();

$c->make();
