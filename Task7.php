<?php

namespace Task;

class Task7
{
    public static function main($arr, $position)
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
        $arr = array_values($arr);

        return '$' . 'arr=[' . implode(',', $arr) . '];';
    }
}

// Task7::main([1,2,3],5);
