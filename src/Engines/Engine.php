<?php

namespace RyanChandler\Mathexpr\Engines;

use Closure;

interface Engine
{
    public function process(array $node): int|float;

    public function addFunction(string $name, Closure $callback): void;
}
