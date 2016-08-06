<?php

namespace Simulator;

use Simulator\Provider\Date;
use Simulator\Provider\Quote;

class Handler{


    public function __construct()
    {
        $this->quote = new Quote();

        $this->date = new Date();
    }

    /**
     * Set run
     * 
     * @param $run
     * @return array
     */
    public function set($run)
    {
        $quotes = $this->quote->create($run);
        
        $quotes['date'] = $this->date->next();

        return $quotes;
    }

    /**
     * Get current date
     * 
     * @param null $date
     * @return string
     */
    public function date($date = null)
    {
        if($date){

            $this->date->setDate($date);
        }
        
        return $this->date->getDate();
    }

    /**
     * Get open price
     * 
     * @return mixed
     */
    public function open()
    {
        return $this->quote->open;
    }

    /**
     * Get low price
     *
     * @return mixed
     */
    public function low()
    {
        return $this->quote->low;
    }

    /**
     * Get high price
     *
     * @return mixed
     */
    public function high()
    {
        return $this->quote->high;
    }

    /**
     * Get close price
     *
     * @return mixed
     */
    public function close()
    {
        return $this->quote->close;
    }

}



