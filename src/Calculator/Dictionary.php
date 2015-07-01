<?php

namespace Calculator;

class Dictionary
{
    public static function fromString($str)
    {
        if (is_numeric($str)) return new Number($str);
        if ($str === '+') return new Addition($str);
        if ($str === '-') return new Subtraction($str);
        if ($str === '*') return new Multiplication($str);
        if ($str === '/') return new Division($str);
        if (in_array($str, ['(', ')'])) return new Parenthesis($str);
    }
}