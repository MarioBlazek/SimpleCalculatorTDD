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

    public function testAddsNumbersMocked()
    {
        // Mock all outside objects
        // We are not interested in testing those
        // They should have their own tests
        $mock = Mockery::mock('Addition');

        // All we care about is verifying that
        // the proper method was called
        $mock->shouldReceive('run')
            ->once()
            ->with(5, 0)
            ->andReturn(5);

        $this->calc->setOperands(5);

        // Rather than new Addition, we pass
        // in the mock object
        $this->calc->setOperation($mock);
        $result = $this->calc->calculate();
        $this->assertEquals(5, $result);
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
