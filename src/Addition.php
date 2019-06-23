<?php
declare(strict_types=1);

namespace Marek\Calculator;

class Addition implements Operation
{
    /**
     * Perform the arithmetic
     *
     * @param integer $num
     * @param integer $current
     *
     * @return integer
     */
    public function run($num, $current)
    {
        return $current + $num;
    }
}
