<?php

namespace Simulator;


class Simulator
{
    /**
     * Price
     *
     * @var
     */
    public $price;

    /**
     * Drift of stock simulation
     *
     * @var int
     */
    public $drift = 0;

    /**
     * Deviation of stock simulation
     *
     * @var float
     */
    public $volatility = 0.01;

    /**
     * Create Gaps
     *
     * @var bool
     */
    protected $gaps = false;

    /**
     * Runs
     *
     * @var array
     */
    protected $run = array();

    /**
     * Handler
     * 
     * @var Handler
     */
    protected $handler;


    public function __construct()
    {
        $this->handler = new Handler();

        $this->price = Random::price();

        $this->run();
    }

    /**
     * Runs a random simulation
     *
     * @param null $price
     * @return array
     */
    public function run($price = null)
    {
        if ($price) {

            return $this->simulate(8, $this->drift, $this->volatility, $price)->close();
        }

        return $this->simulate(8, $this->drift, $this->volatility, $this->price)->close();
    }


    /**
     * Simulates a trading period
     *
     * @param int $steps
     * @param int $drift
     * @param float $volatility
     * @param bool $start
     * @return $this
     */
    public function simulate($steps = 8, $drift = 0, $volatility = 0.1, $start = false)
    {
        $price = $this->price;

        if ($start) {

            $price = $start;
        }

        $this->addRun($price);

        //TODO CONSIDER GAPS

        for ($i = 0; $i < $steps; $i++) {
            
            $growth = exp($drift + $volatility * Random::number());

            $price = round($price * pow($growth, 1 / $steps), 2);

            $this->addRun($price);
        }

        $this->price = $price;
        
        return $this;
    }

    /**
     * Closes simulation runs
     *
     * @return array
     */
    public function close()
    {
        $quotes = $this->handler->set($this->run);

        $this->run = [];

        return $quotes;
    }

    /**
     * Set start price
     *
     * @param $price
     */
    public function startPrice($price)
    {
        $this->price = $price;

        $this->run();
    }

    /**
     * Set start date
     *
     * @param $date
     */
    public function startDate($date)
    {
        $this->handler->date($date);
    }

    /**
     * Set drift
     *
     * @param $drift
     * @return mixed
     */
    public function drift($drift)
    {
        return $this->drift = $drift;
    }

    /**
     * Set Volatility
     *
     * @param $volatility
     * @return mixed
     */
    public function volatility($volatility)
    {
        return $this->volatility = $volatility;
    }

    /**
     * Creates gaps in simulations
     *
     * @param bool $gaps
     * @return bool
     */
    public function gaps($gaps = false)
    {
        if ($gaps) {

            return $this->gaps = true;
        }

        return $this->gaps = false;
    }

    /**
     * Add to run array
     *
     * @param $value
     * @return int
     */
    protected function addRun($value)
    {
        return array_push($this->run, $value);
    }

    /**
     * Magic method
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this->handler, $property)) {
            
            return $this->handler->$property();
        }

        throw new \InvalidArgumentException(sprintf('Unable to find property "%s""', $property));
    }

}



