<?php

namespace RyanChandler\Mathexpr;

enum NodeType
{
    case Integer;
    case Float;
    case Add;
    case Subtract;
    case Multiply;
    case Divide;
    case Modulo;
    case Variable;
    case Call;

    public static function fromTokenType(TokenType $type): self
    {
        return match ($type) {
            TokenType::Plus => NodeType::Add,
            TokenType::Minus => NodeType::Subtract,
            TokenType::Asterisk => NodeType::Multiply,
            TokenType::Slash => NodeType::Divide,
            TokenType::Percent => NodeType::Modulo,
        };
    }
}
