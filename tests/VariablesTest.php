<?php

test('variables can be set', function () {
    expect(matheval('a', variables: ['a' => 1]))
        ->toBe(1);
});

test('variables can be used in operators', function () {
    expect(matheval('a + b', variables: ['a' => 1, 'b' => 2]))
        ->toBe(3);
});

test('variables can be used in function calls', function () {
    expect(matheval('min(a, b)', variables: ['a' => 10, 'b' => 20]))
        ->toBe(10);
});
