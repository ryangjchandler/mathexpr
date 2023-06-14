<?php

test('PI / pi', function () {
    expect(matheval('PI'))
        ->toBe(M_PI);

    expect(matheval('pi'))
        ->toBe(M_PI);
});

test('TAU / tau', function () {
    expect(matheval('TAU'))
        ->toBe(2 * M_PI);

    expect(matheval('tau'))
        ->toBe(2 * M_PI);
});

test('e / E', function () {
    expect(matheval('E'))
        ->toBe(M_E);

    expect(matheval('e'))
        ->toBe(M_E);
});
