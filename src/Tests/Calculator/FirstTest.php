<?php

namespace Tests\Calculator;

use Calculator\Math;
use Calculator\Tokenizer;
use Calculator\Dictionary;

class FirstTest extends \PHPUnit_Framework_TestCase
{
    public function test_simple_addition()
    {
        $m = new Math(new SimpleAdditionTokenizer(), new Dictionary());

        $this->assertSame(intval(2), $m->expression('foobar'));
    }
}

class SimpleAdditionTokenizer implements Tokenizer
{
    /**
     * @param $str
     * @return array
     */
    public function tokenize($str)
    {
        return ['1', '+', '1'];
    }
}