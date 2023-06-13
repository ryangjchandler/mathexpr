<?php

namespace RyanChandler\Mathexpr\Exceptions;

use Exception;
use RyanChandler\Mathexpr\TokenType;

class ExpectedTokenException extends Exception
{
    public static function make(TokenType $expected, ?TokenType $actual = null): self
    {
        if ($actual === null) {
            return new self(sprintf('Expected token %s', $expected->name));
        }

        return new self(sprintf('Expected token %s, found %s', $expected->name, $actual->name));
    }
}
