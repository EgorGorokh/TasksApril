<?php

namespace src;

class Task12
{
    public int $number1;
    public int $number2;
    public $result;
    public function __construct($fval, $sval)
    {
        $this->number1 = $fval;
        $this->number2 = $sval;
        $this->result = '';
        if (!is_int($this->number2)) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($this->number1)) {
            throw new \InvalidArgumentException();
        }
    }

    public function __toString()
    {
        return $this->result;
    }

    public function add()
    {
        $this->result = $this->number1 + $this->number2;

        return $this;
    }

    public function addBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->result * 1 + $float;

        return $this;
    }

    public function subtract()
    {
        $this->result = $this->number1 - $this->number2;

        return $this;
    }

    public function subtractBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->result - $float;

        return $this;
    }


    public function multiply()
    {
        $this->result = $this->number1 * $this->number2;

        return $this;
    }

    public function multiplyBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->result * $float;

        return $this;
    }


    /**
     * @throws Exception
     */

    public function divide()
    {
        if ($this->number2 == 0) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($this->number2)) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->number1 / $this->number2;

        return $this;
    }

    public function divideBy($float)
    {
        if (!is_int($float) || $float == 0) {
            throw new \InvalidArgumentException();
        }
        $this->result = $this->result / $float;

        return $this;
    }
}


//$mycalc = new Task12(6, 12);
//echo $mycalc->add();
