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
            throw new \InvalidArgumentException();
        }


        $today = time();
        // echo $today;
        $diff = strtotime($date) - $today;

        if ($diff < -86400) {
            throw new \InvalidArgumentException();
        }
        if ($diff > -86400 && $diff < 0) {
            return 0;
        }

        return abs(round($diff / 86400)) + 1;
    }
}


//echo Task2::main('2022-04-27');

