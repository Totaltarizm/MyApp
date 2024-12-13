<?php

namespace App\Helpers;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class MathHelper
{

    public static function calculate(string $expression)
    {
        $language = new ExpressionLanguage();

        return $language->evaluate($expression);
    }
}
