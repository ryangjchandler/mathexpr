<?php

use RyanChandler\Mathexpr\Evaluator;

function matheval(string $expression, array $variables = []) {
    $evaluator = new Evaluator;

    foreach ($variables as $variable => $value) {
        $evaluator->addVariable($variable, $value);
    }

    return $evaluator->eval($expression);
}
