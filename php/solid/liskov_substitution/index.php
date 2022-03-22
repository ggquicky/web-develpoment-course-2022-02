<?php

require_once __DIR__.'/Database.php';
require_once __DIR__.'/MySQLDatabase.php';
require_once __DIR__.'/PostgreSQLDatabase.php';

class Users {
    public function list(Database $db): void
    {
        $db->all();

        var_dump('list');
    }
}

$u = new Users();

$u->list(new MySQLDatabase());
