<?php

namespace Simulator\Provider;


class Quote{

    /**
     * Open price
     *
     * @var
     */
    public $open;

    /**
     * Low price
     *
     * @var
     */
    public $low;

    /**
     * High price
     *
     * @var
     */
    public $high;

    /**
     * Close price
     *
     * @var
     */
    public $close;

    /**
     * Create quotes
     * 
     * @param $run
     * @return array
     */
    public function create($run)
    {
        $open = $this->setOpen($run);

        $low = $this->setLow($run);

        $high = $this->setHigh($run);

        $close = $this->setClose($run);

        return [
            'open' => $open,
            'low' => $low,
            'high' => $high,
            'close' => $close,
        ];
    }

    /**
     * Set open price
     *
     * @param $open
     * @return mixed
     */
    protected function setOpen($open)
    {
        if(is_array($open)){

            return $this->open = array_values($open)[0];
        }

        return $this->open = $open;
    }

    /**
     * Set Low Price
     *
     * @param $low
     * @return mixed
     */
    protected function setLow($low)
    {
        if(is_array($low)){

            return $this->low = min($low);
        }

        return $this->low = $low;
    }

    /**
     * Set high price
     *
     * @param $high
     * @return mixed
     */
    protected function setHigh($high)
    {
        if(is_array($high)){

            return $this->high = max($high);
        }

        return $this->high = $high;
    }

    /**
     * Set Close
     *
     * @param $close
     * @return mixed
     */
    protected function setClose($close)
    {
        if(is_array($close)){

            return $this->close = end($close);
        }

        return $this->close = $close;
    }
}



