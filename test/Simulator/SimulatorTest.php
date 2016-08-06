<?php

namespace Simulator\Test;

use Simulator\Simulator;

class SimulatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function get_random_stock_quotes()
    {
        $simulator = new Simulator();
        
        $simulator->run();

        $this->assertTrue(is_numeric($simulator->open));

        $this->assertTrue(is_numeric($simulator->low));

        $this->assertTrue(is_numeric($simulator->high));

        $this->assertTrue(is_numeric($simulator->close));

        $this->assertTrue(is_string($simulator->date));
    }

    /**
     * @test
     */
    public function get_a_complete_stock_movement()
    {
        $simulator = new Simulator();
        
        $quotes = [];
        
        for($i=0; $i<10; $i++){
            
            $quotes[] = $simulator->close;

            $simulator->run();
        }

        $this->assertCount(10, $quotes);
    }
    
    /**
     * @test
     */
    public function can_set_start_price()
    {
        $simulator = new Simulator();

        $simulator->startPrice(100);

        $this->assertEquals(100, $simulator->open);
    }

    /**
     * @test
     */
    public function can_set_start_date()
    {
        $simulator = new Simulator();

        $simulator->startDate('01-01-2000');
        
        $this->assertEquals('01-01-2000', $simulator->date);
    }

    /**
     * @test
     */
    public function can_set_drift_of_simulation()
    {
        $simulator = new Simulator();

        $simulator->drift(0.2);

        $this->assertEquals(0.2, $simulator->drift);
    }

    /**
     * @test
     */
    public function can_set_volatility_of_simulation()
    {
        $simulator = new Simulator();

        $simulator->volatility(0.5);

        $this->assertEquals(0.5, $simulator->volatility);
    }
    
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function try_to_access_to_invalid_property()
    {
        $simulator = new Simulator();

        $simulator->wrong;
    }

    /**
     * @test
     */
    public function create_custom_simulation()
    {
        $simulator = new Simulator();
        
        $simulator->startPrice(100);

        $simulator->simulate(10, 0.01, 0.1);

        $simulator->simulate(10, 0.02, 0.05);
        
        $simulator->close();
        
        $this->assertNotEquals(100, $simulator->close);
    }
    
}