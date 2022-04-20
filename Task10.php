<?php

namespace src;

class Task10
{
    public static function main(int $input)
    {
        if (!is_int($input) || $input <= 1) {
            throw new \InvalidArgumentException();
        }
        $count = 0; //счетчик
        $arr1 = [];
        $arr1[] = $input;

        while ($input !== 1) {
            $count++;
            if ($input % 2 == 0) {
                $input = $input / 2;
            } else {
                $input = $input * 3 + 1;
            }
            $arr1[] = $input;
        }
        //  print_r($arr1);
        return $arr1;
    }
}
