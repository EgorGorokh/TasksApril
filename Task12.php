<?php

namespace src;

class Task12
{
    private int $numberOne;
    private int $numberTwo;
    private string|int|float $result;

    public function __construct(int $numberOne, int $numberTwo)
    {
        $this->numberOne = $numberOne;
        $this->numberTwo = $numberTwo;
    }

    public function __toString()
    {
        return $this->result;
    }

    public function add(): Task12
    {
        $this->result = $this->numberOne + $this->numberTwo;

        return $this;
    }

    public function minus(): Task12
    {
        $this->result = $this->numberOne - $this->numberTwo;

        return $this;
    }

    public function multiply(): Task12
    {
        $this->result = $this->numberOne * $this->numberTwo;

        return $this;
    }

    public function divide(): Task12
    {
        $this->result = 0 === $this->numberTwo ? throw new \InvalidArgumentException() : $this->numberOne / $this->numberTwo;

        return $this;
    }

    public function addBy(int $number): int|float
    {
        return $this->result + $number;
    }

    public function minusBy(int $number): int|float
    {
        return $this->result - $number;
    }

    public function multiplyBy(int $number): int|float
    {
        return $this->result * $number;
    }

    public function divideBy(int $number): string|int|float
    {
        return 0 === $number ? throw new \InvalidArgumentException() : $this->result / $number;
    }
}
