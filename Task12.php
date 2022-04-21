<?php

namespace src;

class Task12
{
    public $tank;
    public $_fval;
    public $_sval;

    public function __construct($fval, $sval)
    {
        $this->_fval = $fval;
        $this->_sval = $sval;
        $this->tank = '';
        if (!is_int($this->_sval)) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($this->_fval)) {
            throw new \InvalidArgumentException();
        }
    }

    public function __toString()
    {
        return $this->tank;
    }

    public function add()
    {
        $this->tank = $this->_fval + $this->_sval;

        return $this;
    }

    public function addBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->tank = $this->tank * 1 + $float;

        return $this;
    }

    public function subtract()
    {
        $this->tank = $this->_fval - $this->_sval;

        return $this;
    }

    public function subtractBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->tank = $this->tank * 1 - $float;

        return $this;
    }


    public function multiply()
    {
        $this->tank = $this->_fval * $this->_sval;

        return $this;
    }

    public function multiplyBy($float)
    {
        if (!is_int($float)) {
            throw new \InvalidArgumentException();
        }
        $this->tank = $this->tank * $float;

        return $this;
    }


    /**
     * @throws Exception
     */

    public function divide()
    {
        if ($this->_sval == 0) {
            throw new \InvalidArgumentException();
            echo 'fd';
        }
        if (!is_int($this->_sval)) {
            throw new \InvalidArgumentException();
        }
        $this->tank = $this->_fval / $this->_sval;

        return $this;
    }

    public function divideBy($float)
    {
        if (!is_int($float) || $float == 0) {
            throw new \InvalidArgumentException();
        }
        $this->tank = $this->tank / $float;

        return $this;
    }
}

/*
$mycalc = new Task12(12, 2);
echo $mycalc->add();
*/
