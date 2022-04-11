<?php

namespace Task;

class Task7
{
    public static function main($arr, $position)
    {
        if (!is_array($arr)) {
            return "incorrect input data";
        } elseif (!is_int($position)) {
            return "incorrect input data";
        } elseif (count($arr) <= $position) {
            return "incorrect input data";
        } else {
            unset($arr[$position]);
            $arr = array_values($arr);
            return "$"."arr=[" . implode(",", $arr) . "];";
        }
    }
}

 Task7::main();

