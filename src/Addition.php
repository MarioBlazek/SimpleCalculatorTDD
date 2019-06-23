<?php

declare(strict_types=1);

namespace Marek\Calculator;

class Addition implements Operation
{
    /**
     * Perform the arithmetic.
     *
     * @param int $num
     * @param int $current
     *
     * @return int
     */
    public function run(int $num, int $current): int
    {
        return $current + $num;
    }
}
