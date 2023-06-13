<?php

namespace RyanChandler\Mathexpr;

use RyanChandler\Lexical\Lexers\RuntimeLexer;
use RyanChandler\Lexical\LexicalBuilder;

final class Lexer
{
    public static function create(): RuntimeLexer
    {
        return (new LexicalBuilder)
            ->readTokenTypesFrom(TokenType::class)
            ->produceTokenUsing(fn (TokenType $type, string $literal) => new Token($type, $literal))
            ->build();
    }
}
