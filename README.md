<?php

namespace Task;

use Exception;

class Task3
{
    /**
     * @throws Exception
     */
    public static function main($number): int
    {
        $sum = 0;
        if (!is_int($number)) {
            throw new Exception("incorrect input data");
        }
        if ($number < 0) {
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
//echo Task3::main(-77);