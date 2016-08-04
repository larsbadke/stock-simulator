<?php

namespace Simulator\Test;

use Simulator\Quote;

class QuoteTest extends \PHPUnit_Framework_TestCase
{

    protected $quote;
    
    protected $run;

    protected function setUp()
    {
        $this->run = [
            80, 81, 79.5, 82, 83, 100, 99.5, 98
        ];
        
        $this->quote = new Quote();
    }
    
    /**
     * @test
     */
    public function create_quotes_with_a_simulated_run()
    {
        $quotes = $this->quote->create($this->run);
        
        $this->assertCount(4, $quotes);
    }

    /**
     * @test
     */
    public function open_price_is_correct_calculated()
    {
        $quotes = $this->quote->create($this->run);

        $this->assertEquals(80, $quotes['open']);
    }

    /**
     * @test
     */
    public function low_price_is_correct_calculated()
    {
        $quotes = $this->quote->create($this->run);

        $this->assertEquals(79.5, $quotes['low']);
    }

    /**
     * @test
     */
    public function high_price_is_correct_calculated()
    {
        $quotes = $this->quote->create($this->run);

        $this->assertEquals(100, $quotes['high']);
    }
    
    /**
     * @test
     */
    public function close_price_is_correct_calculated()
    {
        $quotes = $this->quote->create($this->run);

        $this->assertEquals(98, $quotes['close']);
    }

}