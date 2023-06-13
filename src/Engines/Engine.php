<?php

namespace RyanChandler\Mathexpr\Engines;

interface Engine
{
    public function process(array $node): int|float;
}
