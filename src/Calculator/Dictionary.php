<?php

namespace Calculator;

use Calculator\Operator\Addition;
use Calculator\Operator\Subtraction;

class Dictionary
{
    public static function fromString($str)
    {
        if (is_numeric($str)) return new Number($str);
        if ($str === '+') return new Addition($str);
        if ($str === '-') return new Subtraction($str);

        throw UnknownExpressionPart::fromPart($str);
    }
}