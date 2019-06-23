<?php

declare(strict_types=1);

namespace Marek\Calculator;

use InvalidArgumentException;

class Calculator
{
    /**
     * @var int
     */
    protected $result = 0;

    /**
     * @var array
     */
    protected $operands = [];

    /**
     * @var \Marek\Calculator\Operation
     */
    protected $operation;

    public function setOperands(): void
    {
        $this->operands = func_get_args();
    }

    public function setOperation(Operation $operation): void
    {
        $this->operation = $operation;
    }

    public function calculate(): int
    {
        foreach ($this->operands as $num) {
            if (!is_numeric($num)) {
                throw new InvalidArgumentException();
            }

            $this->result = $this->operation->run($num, $this->result);
        }

        return $this->result;
    }

    public function getResult(): int
    {
        return $this->result;
    }
}
