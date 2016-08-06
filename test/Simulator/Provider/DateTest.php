<?php

namespace Simulator\Test\Provider;

use Carbon\Carbon;
use Simulator\Provider\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    protected $date;
    
    protected function setUp()
    {
        $this->date = new Date();
    }
    
    /**
     * @test
     */
    public function create_random_date_with_instantiation()
    {
        $this->assertInstanceOf(Carbon::class, $this->date->date);
    }

    /**
     * @test
     */
    public function add_a_day_to_current_day_with_the_next_method()
    {
        $this->date->setDate('01-01-2000');
        
        $this->date->next();
        
        $this->assertEquals('02-01-2000', $this->date->getDate());
    }

}