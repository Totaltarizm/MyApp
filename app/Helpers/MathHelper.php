<?php

namespace App\Helpers;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class MathHelper
{
    public static function calculate(string $expression)
    {
        $language = new ExpressionLanguage();

        $language->register('cos',
            function ($arg) {
                return sprintf('cos(%s)', $arg);
            },
            function ($arguments, $value) {
                return cos($value);
            }
        );
        $language->register('tan',
            function ($arg) {
                return sprintf('tan(%s)', $arg);
            },
            function ($arguments, $value) {
                return tan($value);
            }
        );

        $language->register('log',
            function ($arg) {
                return sprintf('log(%s)', $arg);
            },
            function ($arguments, $value) {
                return log($value);
            }
        );

        $language->register('pi',
            function () {
                return '(pi())';
            },
            function () {
                return pi();
            }
        );

        $language->register('e',
            function () {
                return '(2.718281828459045)';
            },
            function () {
                return 2.718281828459045;
            }
        );

        return $language->evaluate($expression);
    }
}
