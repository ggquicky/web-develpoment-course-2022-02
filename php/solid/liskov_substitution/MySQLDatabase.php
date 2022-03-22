<?php

require_once __DIR__.'/Database.php';

class MySQLDatabase implements Database
{
    public function all(): array
    {
        return [];
    }
}
