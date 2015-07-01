<?php

namespace Calculator;

use Calculator\Operator\Addition;

class Dictionary
{
    public static function fromString($str)
    {
        if (is_numeric($str)) return new Number($str);
        if ($str === '+') return new Addition($str);
    }
}