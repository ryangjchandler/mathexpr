<?php

test('sum(a, b, ...)', function () {
    expect(matheval('sum(1, 2)'))
        ->toBe(3);
});

test('min(a, b, ...)', function () {
    expect(matheval('min(5, 9, 2)'))
        ->toBe(2);
});

test('max(a, b, ...)', function () {
    expect(matheval('max(5, 9, 2)'))
        ->toBe(9);
});

test('abs(x)', function () {
    expect(matheval('abs(-10)'))
        ->toBe(10);

    expect(matheval('abs(10)'))
        ->toBe(10);
});

test('sign(x)', function () {
    expect(matheval('sign(-10)'))
        ->toBe(-1);

    expect(matheval('sign(1)'))
        ->toBe(1);

    expect(matheval('sign(0)'))
        ->toBe(0);
});
