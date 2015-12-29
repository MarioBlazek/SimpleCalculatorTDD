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

    public function testResultDefaultsToZero()
    {
        $this->assertSame(0, $this->calc->getResult());
    }

    public function testAddsNumbers()
    {
        $this->calc->add(5);

        $this->assertEquals(5, $this->calc->getResult());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresNumericValue()
    {
        $this->calc->add('five');
    }

    public function testAcceptsMultipleArgs()
    {
        $this->calc->add(1, 2, 3, 4);

        $this->assertEquals(10, $this->calc->getResult());
    }

    public function testSubtractNumbers()
    {
        $this->calc->subtract(4);

        $this->assertEquals(-4, $this->calc->getResult());
    }
}
