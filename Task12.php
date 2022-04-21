<?php

namespace src;

class Task12
{
    public $tank;
    public $_fval;
    public $_sval;

    public function __construct(int $fval, int $sval)
    {
        $this->_fval = $fval;
        $this->_sval = $sval;
        $this->tank = '';
    }

    public function __toString()
    {
        return $this->tank;
    }

    public function add($float = null)
    {
        if ($float == null) {
            $this->tank = $this->_fval + $this->_sval;
        } else {
            if (!is_int($float)) {
                throw new \InvalidArgumentException();
            }
            $this->tank = $this->tank * 1 + $float;
        }

        return $this;
    }

    public function minus($float = null)
    {
        if ($float == null) {
            $this->tank = $this->_fval - $this->_sval;
        } else {
            if (!is_int($float)) {
                throw new \InvalidArgumentException();
            }
            $this->tank = $this->tank * 1 - $float;
        }

        return $this;
    }

    public function multiply($float = null)
    {
        if ($float == null) {
            $this->tank = $this->_fval * $this->_sval;
        } else {
            if (!is_int($float)) {
                throw new \InvalidArgumentException();
            }
            $this->tank = $this->tank * $float;
        }

        return $this;
    }

    /**
     * @throws Exception
     */
    public function divideBy($float = null)
    {
        if ($float == null) {
            if ($this->_sval == 0) {
                throw new \InvalidArgumentException();
            } else {
                $this->tank = $this->_fval / $this->_sval;
            }
        } else {
            if (!is_int($float)) {
                throw new \InvalidArgumentException();
            }
            if ($float == 0) {
                throw new \InvalidArgumentException();
            }
            $this->tank = $this->tank / $float;
        }

        return $this;
    }
}

//$mycalc = new Task12(12, 0);
//echo $mycalc->divideBy();
