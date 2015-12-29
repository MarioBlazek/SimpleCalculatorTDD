<?php

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->calc = new Calculator();
    }

    public function testInstance()
    {
        new Calculator();
    }

    public function testResultDefaultsToNull()
    {
        $this->assertSame(null, $this->calc->getResult());
    }

    public function testAddsNumbers()
    {
        $this->calc->setOperands(5);
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
        $this->assertEquals(5, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresNumericValue()
    {
        $this->calc->setOperands('five');
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->setOperands(1, 2, 3, 4);
        $this->calc->setOperation(new Addition());

        $result = $this->calc->calculate();
        $this->assertEquals(10, $result);
    }

    public function testSubtractNumbers()
    {
        $this->calc->setOperands(4);
        $this->calc->setOperation(new Subtraction());

        $result = $this->calc->calculate();

        $this->assertEquals(-4, $result);
    }

    public function testMultipliesNumber()
    {
        $this->calc->setOperands(2, 3, 5);
        $this->calc->setOperation(new Multiplication);

        $result = $this->calc->calculate();
        $this->assertEquals(30, $result);
    }
}
