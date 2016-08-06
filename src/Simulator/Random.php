<?php

namespace Simulator;


class Random{

    /**
     * Create random number with Box-Muller-Method
     * 
     * @return float
     */
    public static function number()
    {
        $u1 = mt_rand() / mt_getrandmax();

        $u2 = mt_rand() / mt_getrandmax();

        $z = sqrt(-2*log($u1));

        $z = $z * cos(2*pi()*$u2);

        if(is_infinite($z))
        {
            return static::number();
        }

        return $z;
    }

    /**
     * Create random price
     *
     * @return float
     */
    public static function price()
    {
        return mt_rand(1, 100);
    }
}



