<?php

namespace src;

class Task5
{
    public static function main($n = 100, array $arr = [1, 1]): string
    {
        if (!is_int($n)) {
            throw new \InvalidArgumentException();
        }
        if ($n <= 0) {
            throw new \InvalidArgumentException();
        }
        $fib1 = '1';
        $fib2 = '1';
        while (mb_strlen($fib2) < $n) {
            $sum = bcadd($fib1, $fib2);
            $fib1 = $fib2;
            $fib2 = $sum;
        }

        return $fib2;
    }
}

//echo Task5::main(1);
