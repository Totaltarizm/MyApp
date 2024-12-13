<?php


use App\Helpers\MathHelper;

test('addition', function () {
    expect(MathHelper::calculate('2+2'))->toBe(4);
});

test('subtraction', function () {
    expect(MathHelper::calculate('10-4'))->toBe(6);
});

test('multiplication', function () {
    expect(MathHelper::calculate('6*7'))->toBe(42);
});

test('division', function () {
    expect(MathHelper::calculate('20/4'))->toBe(5);
});

test('parentheses', function () {
    expect(MathHelper::calculate('(2+3)*4'))->toBe(20);
});

test('modulo', function () {
    expect(MathHelper::calculate('10%3'))->toBe(1);
});

test('negative numbers', function () {
    expect(MathHelper::calculate('-5+3'))->toBe(-2);
});

test('complex division', function () {
    expect(MathHelper::calculate('(10+20)/(5*2)'))->toBe(3);
});

test('nested parentheses', function () {
    expect(MathHelper::calculate('(3*(4+5))-2'))->toBe(25);
});

test('multiple operations', function () {
    expect(MathHelper::calculate('((10+5)*3-(2+3))/2'))->toBe(20);
});
