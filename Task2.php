<?php

namespace Task;

class Task2
{
    public static function main($date): string
    {
        $today = time();
        $diff = strtotime($date) - $today;

        return abs(round($diff / 86400));
    }
}
//Task2::main();
