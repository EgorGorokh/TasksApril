<?php

namespace Task;

class Task10
{
    public static function main(int $input)
    {
        if (!is_int($input) || $input <= 1) {
            throw new Exception('incorrect input data');
        }
        $count = 0; //счетчик
        echo 'Array' . '<br>' . '(' . '<br>' . '[0] => ' . $input . '<br>';
        while ($input !== 1) {
            $count++;
            if ($input % 2 == 0) {
                $input = $input / 2;
            } else {
                $input = $input * 3 + 1;
            }
            echo '[' . $count . '] => ' . $input . '<br>';
        }
        echo ')';
    }
}

//echo Task10::main(55);
