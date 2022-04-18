<?php

namespace Task;

class Task2
{
    public static function main(string $date): int
    {
        $today = time();
        $diff = strtotime($date) - $today;

        return abs(round($diff / 86400));
    }
}
//echo Task2::main('16-05-2022');
