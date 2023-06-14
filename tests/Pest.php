<?php

use RyanChandler\Mathexpr\Evaluator;

function matheval(string $expression)
{
    return (new Evaluator)->eval($expression);
}
