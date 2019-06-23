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
    public function run(int $num, int $current): int
    {
        // If this is first calculation,
        // then return the only operand
        if (empty($current)) {
            return $num;
        }

        return $current * $num;
    }
}
