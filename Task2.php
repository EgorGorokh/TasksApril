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

        $target_days = mktime(0, 0, 0, $numbers[1], $numbers[2], $numbers[0]);
        $today = time();
        $diff_days = ($target_days - $today);
        $days = (int)($diff_days / 86400);

        return $days;
    }
}
// echo Task2::main('2022-04-28');
