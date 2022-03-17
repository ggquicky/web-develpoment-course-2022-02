<?php

class User implements ArrayAccess, Countable {
    protected array $data = [
        'first_name' => 'Hosmel',
        'last_name' => 'Quintana',
    ];

    public function __call(string $name, array $arguments)
    {
        if ($name == 'fullName') {
            return $this->data['first_name'].' '.$this->data['last_name'];
        }

        echo "Method [$name] does not exists.";
    }

    public static function __callStatic(string $name, array $arguments)
    {
        $instance = new static();

        return $instance->$name(...$arguments);
    }

    public function __get(string $name): ?string
    {
        return $this->data[$name] ?? null;
    }

    public function __invoke()
    {
        var_dump('__invoke');
    }

    public function __set(string $name, mixed $value): void
    {
        if (! array_key_exists($name, $this->data)) {
            return;
        }

        $this->data[$name] = $value;
    }

    public function __toString(): string
    {
        return json_encode($this->data);
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }

    public function count(): int
    {
        return count($this->data);
    }
}

//$u = new User();

//var_dump($u->fullName());

//var_dump(User::fullName());

//$u();

//var_dump($u['first_name']);
//$u['first_name'] = 'Javier';
//var_dump($u['first_name']);
//var_dump(isset($u['first_name']));
//unset($u['first_name']);
//var_dump($u['first_name']);
//var_dump(isset($u['first_name']));
//var_dump(count($u));
