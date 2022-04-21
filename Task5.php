<?php

namespace src;

class Task5
{
    public static function main($n, array $arr = [1, 1]): string
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
            // $sum = $fib1 + $fib2;
            $fib1 = $fib2;
            $fib2 = $sum;
        }

        return $fib2;
    }
}
//121253296785054970112527561785150965989517860854334294232405034490770322947313730810358523404222464
//echo Task5::main(100);
