<?php
declare(strict_types=1);

namespace Marek\Calculator;

use InvalidArgumentException;

class Calculator
{
    protected $result = null;

    protected $operands = [];

    protected $operation;

    public function setOperands()
    {
        $this->operands = func_get_args();
    }

    public function setOperation(Operation $operation)
    {
        $this->operation = $operation;
    }

    public function calculate()
    {
        foreach ($this->operands as $num) {
            if (!is_numeric($num)) {
                throw new InvalidArgumentException;
            }

            $this->result = $this->operation->run($num, $this->result);
        }

        return $this->result;
    }

    public function getResult()
    {
        return $this->result;
    }
}
