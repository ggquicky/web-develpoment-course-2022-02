<?php

interface Database
{
    public function connect();
}

class MySQLDatabase implements Database
{
    public function connect()
    {
    }
}

class MongoDB implements Database
{
    public function connect()
    {
    }
}

class Report
{
    public function __construct(private Database $db)
    {
    }
}

new Report(new MongoDB());
