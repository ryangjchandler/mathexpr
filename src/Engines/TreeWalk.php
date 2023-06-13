<?php

namespace RyanChandler\Mathexpr\Engines;

use RyanChandler\Mathexpr\NodeType;

class TreeWalk implements Engine
{
    public function process(array $node): int|float
    {
        [$type, $args] = [$node[0], array_slice($node, 1)];

        return match ($type) {
            NodeType::Add => $this->process($args[0]) + $this->process($args[1]),
            NodeType::Subtract => $this->process($args[0]) - $this->process($args[1]),
            NodeType::Multiply => $this->process($args[0]) * $this->process($args[1]),
            NodeType::Divide => $this->process($args[0]) / $this->process($args[1]),
            NodeType::Integer => $args[0],
        };
    }
}
