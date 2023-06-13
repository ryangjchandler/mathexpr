<?php

namespace RyanChandler\Mathexpr\Exceptions;

use Exception;

final class UnexpectedEndOfExpressionException extends Exception
{
    public static function make(): self
    {
        return new self('Unexpected end of expression');
    }
}
