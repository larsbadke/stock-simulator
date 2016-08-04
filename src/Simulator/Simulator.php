<?php

namespace Simulator;


use Carbon\Carbon;

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
     * Quotes
     *
     * @var Quote
     */
    protected $quote;


    public function __construct()
    {
        $this->quote = new Quote();

        $this->price = mt_rand(1, 100);

        $this->date = Carbon::createFromTimestamp(mt_rand(0, Carbon::now()->timestamp));
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

            return $this->simulate(8, $this->drift, $this->volatility, $this->price)->close();
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

            $price = $price * pow($growth, 1 / $steps);

            $this->addRun(round($price, 2));
        }

        $this->price = round($price, 2);
        
        return $this;
    }

    /**
     * Closes simulation runs
     *
     * @return array
     */
    public function close()
    {
        $quotes = $this->quote->create($this->run);

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
        if (property_exists($this->quote, $property)) {
            
            return $this->quote->$property;
        }

        throw new \InvalidArgumentException(sprintf('Unable to find property "%s""', $property));
    }

}



