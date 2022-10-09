<?php

namespace App;

class InMemoryKV implements KeyValueStorageInterface
{
    private $map;

    public function __construct($initial = [])
    {
        $this->map = $initial;
    }

    public function set($key, $value)
    {
        $this->map[$key] = $value;
    }

    public function unset($key)
    {
        unset($this->map[$key]);
    }

    public function get($key, $default = null)
    {
        return $this->map[$key] ?? $default;
    }

    public function toArray()
    {
        return $this->map;
    }

    // BEGIN (write your solution here)

    // END
}

