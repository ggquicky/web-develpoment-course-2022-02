<?php

require_once __DIR__.'/SleepInterface.php';
require_once __DIR__.'/WorkerInterface.php';

class Person implements SleepInterface, WorkerInterface
{
    public function sleep()
    {
    }

    public function work()
    {
    }
}