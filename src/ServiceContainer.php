<?php
declare(strict_types=1);

namespace Core;


class ServiceContainer implements \ArrayAccess
{
    private $values = [];

    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    public function offsetSet($key, $value): void
    {
        $this->values[$key] = $value;
    }

    public function offsetGet($key)
    {
        $val = $this->values[$key]();

        return $val;
    }

    public function offsetExists($offset): bool
    {
    }

    public function offsetUnset($offset): void
    {
    }
}