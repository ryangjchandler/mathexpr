<?php

namespace RyanChandler\Mathexpr;

enum Precedence: int
{
    case Lowest = 0;
    case AddSub = 1;
    case MulDiv = 2;

    public function lt(Precedence $other): bool
    {
        return $this->value < $other->value;
    }

    public static function forTokenType(TokenType $type): self
    {
        return match ($type) {
            default => Precedence::Lowest
        };
    }
}
