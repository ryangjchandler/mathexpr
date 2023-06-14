<?php

namespace RyanChandler\Mathexpr\Engines;

use Closure;
use RyanChandler\Mathexpr\Exceptions\InvalidFunctionCallException;
use RyanChandler\Mathexpr\Exceptions\InvalidVariableException;
use RyanChandler\Mathexpr\NodeType;

class TreeWalk implements Engine
{
    protected array $environment = [];

    public function addFunction(string $name, Closure $callback): void
    {
        $this->environment[$name] = $callback;
    }

    public function addVariable(string $name, int|float $value): void
    {
        $this->environment[$name] = $value;
    }

    public function process(array $node): int|float
    {
        [$type, $args] = [$node[0], array_slice($node, 1)];

        return match ($type) {
            NodeType::Negate => -$this->process($args[0]),
            NodeType::Add => $this->process($args[0]) + $this->process($args[1]),
            NodeType::Subtract => $this->process($args[0]) - $this->process($args[1]),
            NodeType::Multiply => $this->process($args[0]) * $this->process($args[1]),
            NodeType::Divide => $this->process($args[0]) / $this->process($args[1]),
            NodeType::Modulo => $this->process($args[0]) % $this->process($args[1]),
            NodeType::Call => $this->call($args[0][1], $args[1]),
            NodeType::Variable => $this->get($args[0]) ?? throw InvalidVariableException::make($args[0]),
            NodeType::Float => $args[0],
            NodeType::Integer => $args[0],
        };
    }

    protected function call(string $name, array $args)
    {
        $callback = $this->get($name);

        if ($callback === null) {
            throw InvalidFunctionCallException::make($name);
        }

        foreach ($args as $i => $arg) {
            $args[$i] = $this->process($arg);
        }

        return $callback(...$args);
    }

    protected function get(string $name)
    {
        return $this->environment[$name] ?? null;
    }
}
