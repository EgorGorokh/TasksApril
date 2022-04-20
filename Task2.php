<?php

namespace Task;

class Task2
{
    public static function main(string $date): int
    {
        $numbers = explode('-', $date);

        if (!is_int($numbers[0]) || ($numbers[0]) < 1) {
            throw new InvalidArgumentException('incorrect input data');
        }
        if (!is_int($numbers[1]) || ($numbers[1]) < 1 || ($numbers[1]) > 12) {
            throw new InvalidArgumentException('incorrect input data');
        }
        if (!is_int($numbers[2]) || ($numbers[2]) < 1 || ($numbers[2]) > 31) {
            throw new InvalidArgumentException('incorrect input data');
        }

        $today = time();
        $diff = strtotime($date) - $today;
        if ($diff < 0) {
            throw new Exception('incorrect input data');
        }

        return abs(round($diff / 86400));
    }
}
