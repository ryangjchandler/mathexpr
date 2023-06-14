<?php

it('can add numbers', function () {
    expect(matheval('1 + 2'))
        ->toBe(3);
});

it('can subtract numbers', function () {
    expect(matheval('2 - 1'))
        ->toBe(1);
});

it('can multiply numbers', function () {
    expect(matheval('1 * 2'))
        ->toBe(2);
});

it('can divide numbers', function () {
    expect(matheval('3 / 2'))
        ->toBe(1.5);
});

it('can mod numbers', function () {
    expect(matheval('5 % 2'))
        ->toBe(1);
});

it('can negate numbers', function () {
    expect(matheval('-10'))
        ->toBe(-10);
});
