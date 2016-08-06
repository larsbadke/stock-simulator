<?php

namespace Simulator\Test;

use Simulator\Handler;

class HandlerTest extends \PHPUnit_Framework_TestCase
{
    protected $run;
    
    protected $handler;

    protected function setUp()
    {
        $this->run = [
            80, 81, 79.5, 82, 83, 100, 99.5, 98
        ];

        $this->handler = new Handler();
    }
    
    /**
     * @test
     */
    public function can_set_a_run()
    {
        $set = $this->handler->set($this->run);
        
        $this->assertCount(5, $set);
    }

    /**
     * @test
     */
    public function can_call_open_price()
    {
        $this->handler->set($this->run);

        $this->assertTrue(is_numeric($this->handler->open()));
    }

    /**
     * @test
     */
    public function can_call_low_price()
    {
        $this->handler->set($this->run);

        $this->assertTrue(is_numeric($this->handler->low()));
    }
    
    /**
     * @test
     */
    public function can_call_high_price()
    {
        $this->handler->set($this->run);
        
        $this->assertTrue(is_numeric($this->handler->high()));
    }

    /**
     * @test
     */
    public function can_call_close_price()
    {
        $this->handler->set($this->run);

        $this->assertTrue(is_numeric($this->handler->close()));
    }

    /**
     * @test
     */
    public function can_call_date()
    {
        $this->handler->set($this->run);

        $this->assertTrue(is_string($this->handler->date()));
    }
    
}