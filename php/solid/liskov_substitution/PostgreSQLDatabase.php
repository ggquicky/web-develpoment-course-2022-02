<?php

require_once __DIR__.'/Database.php';

class PostgreSQLDatabase implements Database
{
    public function all(): array
    {
        return [];
    }
}
