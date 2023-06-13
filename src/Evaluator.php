<?php

namespace RyanChandler\Mathexpr;

use Closure;
use RyanChandler\Lexical\Lexers\RuntimeLexer;
use RyanChandler\Mathexpr\Engines\Engine;
use RyanChandler\Mathexpr\Engines\TreeWalk;

class Evaluator
{
    protected RuntimeLexer $lexer;

    protected Parser $parser;

    protected Engine $engine;

    public function __construct()
    {
        $this->lexer = Lexer::create();
        $this->parser = new Parser();
        $this->engine = new TreeWalk();

        $this->registerDefaultFunctions();
        $this->registerDefaultVariables();
    }

    public function eval(string $expression)
    {
        $tokens = $this->lexer->tokenise($expression);

        if ($tokens === []) {
            return null;
        }

        $node = $this->parser->parse($tokens);

        return $this->engine->process($node);
    }

    public function addFunction(string $name, Closure $callback): static
    {
        $this->engine->addFunction($name, $callback);

        return $this;
    }

    public function addVariable(string $name, int|float $value): static
    {
        $this->engine->addVariable($name, $value);

        return $this;
    }

    private function registerDefaultFunctions(): void
    {
        $this->engine->addFunction('sum', fn (int|float ...$values) => array_sum($values));
        $this->engine->addFunction('min', fn (int|float ...$values) => min($values));
        $this->engine->addFunction('max', fn (int|float ...$values) => max($values));
        $this->engine->addFunction('abs', fn (int|float $value) => abs($value));
        $this->engine->addFunction('sign', fn (int|float $value) => $value <=> 0);
    }

    private function registerDefaultVariables(): void
    {
        $this->engine->addVariable('pi', M_PI);
        $this->engine->addVariable('PI', M_PI);

        $this->engine->addVariable('tau', 2 * M_PI);
        $this->engine->addVariable('TAU', 2 * M_PI);

        $this->engine->addVariable('e', M_E);
        $this->engine->addVariable('E', M_E);
    }
}
