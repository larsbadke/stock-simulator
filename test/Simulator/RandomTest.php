<?php

namespace Simulator\Test;


use Simulator\Random;

class RandomTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @test
     */
    public function static_function_number_provides_a_float_number()
    {
        $randomNumber = Random::number();

        $this->assertTrue(is_float($randomNumber));
    }

    /**
     * @test
     */
    public function static_function_price_provides_a_random_float_number()
    {
        $price = Random::price();

        $this->assertTrue(is_numeric($price));
    }
}