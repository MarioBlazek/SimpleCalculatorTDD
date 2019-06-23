<?php
declare(strict_types=1);

namespace Marek\Calculator;

interface Operation
{
    /**
     * Perform the arithmetic
     *
     * @param integer $num
     * @param integer $current
     *
     * @return integer
     */
    public function run(int $num, int $current): int;
}
