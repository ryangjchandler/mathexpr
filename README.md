# A tiny math expression evaluator written in PHP.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/mathexpr.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/mathexpr)
[![Tests](https://img.shields.io/github/actions/workflow/status/ryangjchandler/mathexpr/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ryangjchandler/mathexpr/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/mathexpr.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/mathexpr)

This package provides a small evaluator for mathemetical expressions in PHP.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/mathexpr
```

## Usage

```php
use RyanChandler\Mathexpr\Evaluator;

$evaluator = new Evaluator();

$result = $evaluator->eval('1 + 2'); // -> (int) 3
```

## Operators

Mathexpr supports the following operators:
* `+`
* `-`
* `*`
* `/`
* `%`

## Functions

Out of the box, Mathexpr provides a set of useful mathematical functions that can be called in an expression.

```php
$evaluator->eval('sum(1, 2, 3)')
```

You can also extend the default set with your own custom functions.

```php
$evaluator->addFunction('clamp', function (int|float $subject, int|float $min, int|float $max): int|float {
    return max($min, min($max, $subject));
});

$evaluator->eval('clamp(200, 10, 100)'); // -> (int) 100
```

## Variables

Mathexpr has support for variables too.

```php
$evaluator->addVariable('a', 1);
$evaluator->addVariable('b', 2);

$evaluator->eval('a + b'); // -> (int) 3
```

## Constants

A small set of common mathematical constants are also available by default:
* `pi` / `PI`
* `tau` / `TAU`
* `e` / `E`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
