<?php

namespace RyanChandler\Mathexpr;

use RyanChandler\Lexical\Attributes\Lexer;
use RyanChandler\Lexical\Attributes\Literal;
use RyanChandler\Lexical\Attributes\Regex;

#[Lexer(skip: "[ \t\n\f]+")]
enum TokenType
{
    #[Regex('[0-9]+.[0-9]+')]
    case Float;

    #[Regex('[0-9]+')]
    case Integer;

    #[Regex('[a-zA-Z]+')]
    case Identifier;

    #[Literal('+')]
    case Plus;

    #[Literal('-')]
    case Minus;

    #[Literal('*')]
    case Asterisk;

    #[Literal('/')]
    case Slash;

    #[Literal('%')]
    case Percent;

    #[Literal('(')]
    case LeftParen;

    #[Literal(')')]
    case RightParen;

    public function isInfix(): bool
    {
        return match ($this) {
            TokenType::Plus, TokenType::Minus, TokenType::Asterisk, TokenType::Slash, TokenType::Percent => true,
            default => false
        };
    }
}
