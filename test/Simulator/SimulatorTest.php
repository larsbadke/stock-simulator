<?php

namespace Simulator\Test;

use Carbon\Carbon;
use Simulator\Simulator;

class SimulatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function simulator_has_start_price()
    {
        $simulator = new Simulator();

        $this->assertTrue(isset($simulator->price));
    }

    /**
     * @test
     */
    public function simulator_has_start_date_and_is_an_instance_of_carbon()
    {
        $simulator = new Simulator();
        
        $this->assertInstanceOf(Carbon::class, $simulator->date);
    }
    
    /**
     * @test
     */
    public function access_to_all_public_properties()
    {
        $properties = [
            'price',
            'volatility',
            'drift',
        ];

        $simulator = new Simulator();

        foreach ($properties as $property){

            $this->assertTrue(isset($simulator->$property));
        }
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
}