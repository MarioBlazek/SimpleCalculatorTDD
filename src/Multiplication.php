<?php
declare(strict_types=1);

namespace Marek\Calculator;

class Multiplication implements Operation
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
        // If this is first calculation,
        // then return the only operand
        if (is_null($current)) {

            return $num;

        }

        return $current * $num;
    }
}
