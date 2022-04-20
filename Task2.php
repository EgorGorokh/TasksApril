<?php

namespace src;

class Task2
{
    public static function main(string $date): int
    {
        $dash = str_replace(':', '-', $date);
        $underline = str_replace('.', '-', $dash);
        $bigLetter = str_replace(',', '-', $underline);
        $date = str_replace('_', '-', $bigLetter);

        $numbers = explode('-', $date);

        if (!checkdate($numbers[1], $numbers[2], $numbers[0])) {
            throw new Exception('incorrect input data');
        }


        $today = time();
        $diff = strtotime($date) - $today;
        if ($diff < 0) {
            throw new Exception('incorrect input data');
        }

        return abs(round($diff / 86400));
    }
}
