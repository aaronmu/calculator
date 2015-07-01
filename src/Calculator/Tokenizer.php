<?php

namespace Calculator;

interface Tokenizer
{
    /**
     * @param $str
     * @return array
     */
    public function tokenize($str);
}