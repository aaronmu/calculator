<?php

namespace Tests\Calculator;

use Calculator\Math;
use Calculator\Tokenizer;
use Calculator\Dictionary;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    public function test_simple_addition()
    {
        $m = new Math(new TestTokenizer(['1', '+', '1']), new Dictionary());

        $this->assertSame(intval(2), $m->expression('foobar'));
    }

    public function test_complex_addition()
    {
        $m = new Math(new TestTokenizer(['1', '+', '1', '+', '7', '+', '5']), new Dictionary());

        $this->assertSame(intval(14), $m->expression('foobar'));
    }
}

class TestTokenizer implements Tokenizer
{
    private $tokens;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
    }

    /**
     * @param $str
     * @return array
     */
    public function tokenize($str)
    {
        return $this->tokens;
    }
}