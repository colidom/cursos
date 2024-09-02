<?php

namespace  Core;

use Exception;

class Container
{
    protected array $bindings = [];

    /**
     * @param $key
     * @param $resolver
     * @return void
     */
    public function bind($key, $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }


    /**
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function resolve($key): mixed
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception('No matching binding found for key: ' . $key);
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}