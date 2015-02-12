<?php

namespace Math;

class Operation
{
    /**
     * Sum value in arguments
     * @return int
     */
    public function sum()
    {
        $s = 0;
        foreach (func_get_args() as $a)
        {
            $s+= is_numeric($a) ? $a : 0;
        }
        return $s;
    }

}
