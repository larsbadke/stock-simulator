<?php

namespace Simulator\Provider;

use Carbon\Carbon;

class Date{

    /**
     * Date format
     * 
     * @var string
     */
    protected static $format = 'd-m-Y';

    /**
     * date
     * 
     * @var static
     */
    public $date;

    public function __construct()
    {
        $this->date = Carbon::createFromTimestamp(mt_rand(0, Carbon::now()->timestamp));
    }

    /**
     * Next date
     * 
     * @return string
     */
    public function next()
    {
        return $this->date->addDay(1);
    }

    /**
     * Get current date
     * 
     * @return string
     */
    public function getDate()
    {
        return $this->date->format(static::$format);
    }

    /**
     * Set date
     * 
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = Carbon::parse($date);
    }
    
}



