<?php

interface DBInterface
{
    public function all(): array;
}

class Database implements DBInterface
{
    public function all(): array
    {
//        $data = json_decode(
//            file_get_contents('./db.json'),
//            true
//        );

        return [];
    }
}

class CacheDecorator implements DBInterface
{
    private DBInterface $db;

    public function __construct(DBInterface $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
//        if (Redis::has('data')) {
//            return Redis::get('data');
//        }

        $data = $this->db->all();

//        Redis::set('data', $data);

        return $data;
    }
}

$db = new CacheDecorator(new Database());

$db->all();