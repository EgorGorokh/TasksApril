<?php

namespace src;

class Task7
{
    public static function main(array $arr, int $position): array
    {
        if (!is_array($arr)) {
            throw new Exception('incorrect input data');
        }
        if (!is_int($position)) {
            throw new Exception('incorrect input data');
        }
        if (count($arr) <= $position) {
            throw new Exception('incorrect input data');
        }
        unset($arr[$position]);

        return array_values($arr);
    }
}
