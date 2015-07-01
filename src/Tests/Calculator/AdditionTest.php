<?php

namespace Tests\Calculator;

use Calculator\Math;
use Calculator\Number;
use Calculator\Operator\Addition;
use Calculator\Operator\Subtraction;
use Calculator\Tokenizer;
use Calculator\Dictionary;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    private $dictionary;

    public function setUp()
    {
        $dictionary = new Dictionary();
        $dictionary->registerTest(
            function($str) { return is_numeric($str); },
            function($str) { return new Number($str); }
        );
        $dictionary->registerTest(
            function($str) { return $str === '+'; },
            function($str) { return new Addition(); }
        );
        $dictionary->registerTest(
            function($str) { return $str === '-'; },
            function($str) { return new Subtraction(); }
        );

        $this->dictionary = $dictionary;
    }
    public function test_unknown_expression_part_result_in_an_exception()
    {
        $this->setExpectedException('Calculator\UnknownExpressionPart');

        // A dictionary that only knows numbers.
        $dictionary = new Dictionary();
        $dictionary->registerTest(
            function($str) { return is_numeric($str); },
            function($str) { return new Number($str); }
        );

        $m = new Math(new TestTokenizer(['1', '-', '1']), $dictionary);
        $m->expression('foobar');
    }

   public function test_simple_addition()
    {
        $m = new Math(new TestTokenizer(['1', '+', '1']), $this->dictionary);

        $this->assertEquals(2, $m->expression('foobar'));
    }

    public function test_complex_addition()
    {
        $m = new Math(new TestTokenizer(['1', '+', '1', '+', '7', '+', '5']), $this->dictionary);

        $this->assertEquals(14, $m->expression('foobar'));
    }

    public function test_simple_subtraction()
    {
        $m = new Math(new TestTokenizer(['5', '-', '3']), $this->dictionary);

        $this->assertEquals(2, $m->expression('foobar'));
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