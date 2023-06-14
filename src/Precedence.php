<?php

namespace RyanChandler\Mathexpr;

enum Precedence: int
{
    case Lowest = 0;
    case AddSub = 1;
    case MulDivMod = 2;
    case Prefix = 3;
    case Call = 4;

    public function lt(Precedence $other): bool
    {
        return $this->value < $other->value;
    }

    public static function forTokenType(TokenType $type): self
    {
        return match ($type) {
            TokenType::Plus, TokenType::Minus => Precedence::AddSub,
            TokenType::Asterisk, TokenType::Slash, TokenType::Percent => Precedence::MulDivMod,
            TokenType::LeftParen => Precedence::Call,
            default => Precedence::Lowest
        };
    }
}
