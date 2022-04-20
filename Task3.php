<?php

namespace src;

class Task3
{
    public static function main(int $number): int
    {
        $sum = 0;
        if (!is_int($number) || ($number < 10)) {
            throw new Exception('incorrect input data');
        }
        while ($number > 0 || $sum > 9) {
            if ($number == 0) {
                $number = $sum;
                $sum = 0;
            }
            $sum += $number % 10;
            $number /= 10;
        }

        return $sum;
    }
}
//echo Task3::main(5);
