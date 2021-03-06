<?php

declare(strict_types=1);

namespace Marek\Calculator\Tests;

use InvalidArgumentException;
use Marek\Calculator\Addition;
use Marek\Calculator\Calculator;
use Marek\Calculator\Multiplication;
use Marek\Calculator\Subtraction;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @var \Marek\Calculator\Calculator
     */
    protected $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculator();
    }

    public function testResultDefaultsToZero()
    {
        self::assertSame(0, $this->calc->getResult());
    }

    public function testAddsNumbersMocked()
    {
        // Mock all outside objects
        // We are not interested in testing those
        // They should have their own tests
        $mock = $this->createMock(Addition::class);

        $mock->expects(self::once())
            ->method('run')
            ->with(5, 0)
            ->willReturn(5);

        $this->calc->setOperands(5);

        // Rather than new Addition, we pass
        // in the mock object
        $this->calc->setOperation($mock);
        $result = $this->calc->calculate();
        self::assertSame(5, $result);
    }

    public function testAddsNumbers()
    {
        $this->calc->setOperands(5);
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
        self::assertSame(5, $result);
    }

    public function testRequiresNumericValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->setOperands('five');
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->setOperands(1, 2, 3, 4);
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
        self::assertSame(10, $result);
    }

    public function testSubtractNumbers()
    {
        $this->calc->setOperands(4);
        $this->calc->setOperation(new Subtraction());

        $result = $this->calc->calculate();

        self::assertSame(-4, $result);
    }

    public function testMultipliesNumber()
    {
        $this->calc->setOperands(2, 3, 5);
        $this->calc->setOperation(new Multiplication());

        $result = $this->calc->calculate();
        self::assertSame(30, $result);
    }
}
