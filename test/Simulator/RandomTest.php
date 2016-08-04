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

}