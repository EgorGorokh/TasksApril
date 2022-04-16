<?php

namespace Task;

class Task9
{
    public static function main($arr, $number)
    {
        if (!is_array($arr) || count($arr) < 3) {
            throw new Exception('incorrect input data');
        }
        if (!is_int($number)) {
            throw new Exception('incorrect input data');
        }
        $count = 0; //счетчик сколько таких сумм
        for ($i = 0; $i < count($arr) - 2; $i++) {
            if (($arr[$i] + $arr[$i + 1] + $arr[$i + 2]) == $number) {
                $count++;
            }
        }
        if ($count > 0) {
            $count = 0; //обнуляем счетчик
            echo 'Array' . '<br>' . '(' . '<br>';
            for ($i = 0; $i < count($arr) - 2; $i++) {
                if (($arr[$i] + $arr[$i + 1] + $arr[$i + 2]) == $number) {
                    echo '[' . $count . '] ' . '=> ' . $arr[$i] . ' + ' . $arr[$i + 1] . ' + ' . $arr[$i + 2] . '<br>';
                    $count++;
                }
            }
            echo ')';
        }
    }
}
//Task9::main();
