<?php

declare(strict_types=1);

namespace Marek\Calculator\Tests;

use Marek\Calculator\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testFindsTheSumOfNumbers()
    {
        $addition = new Addition();
        $sum = $addition->run(5, 0);

        self::assertSame(5, $sum);
    }
}
