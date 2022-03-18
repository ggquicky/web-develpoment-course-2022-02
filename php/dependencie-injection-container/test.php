<?php

class Database {
    public function dump(): void
    {
        var_dump('Hola!');
    }
}

class Container {
    protected static array $container = [];

    public static function add(string $key, mixed $value): void
    {
        static::$container[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return static::$container[$key] ?? null;
    }
}

Container::add(Database::class, new Database());
Container::add('config', [
    'DB_PASSWORD' => 'perritofrito',
]);

$db = Container::get(Database::class);

$db->dump();
var_dump($db);