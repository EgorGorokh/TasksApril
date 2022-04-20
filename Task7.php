<?php

namespace src;

class Task7
{
    public static function main(array $arr, int $position): array
    {
        if (!is_array($arr)) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($position) || $position < 0) {
            throw new \InvalidArgumentException();
        }
        if (count($arr) <= $position) {
            throw new \InvalidArgumentException();
        }
        unset($arr[$position]);

        // return array_values($arr);
        //for ($i = 0; $i < count($arr); $i++) {
        //    echo $arr[$i] . "<br>";
        // }
        return $arr;
    }
}
