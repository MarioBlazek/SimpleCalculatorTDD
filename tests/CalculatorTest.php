<?php

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        new Calculator();
    }

    public function testResultDefaultsToZero()
    {
        $calc = new Calculator();

        $this->assertSame(0, $calc->getResult());
    }

    public function testAddsNumbers()
    {
        $calc = new Calculator();
        $calc->add(5);

        $this->assertEquals(5, $calc->getResult());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRequiresNumericValue()
    {
        $calc = new Calculator();
        $calc->add('five');
    }
}
