<?php

namespace Task;

class Task4
{
    public static function main($input): string
    {
        if (!is_string($input)) {
            throw new Exception('incorrect input data');
        }
        $dash = str_replace('-', ' ', $input);
        $underline = str_replace('_', ' ', $dash);
        $bigLetter = ucwords($underline);

        return str_replace(' ', '', $bigLetter);
    }
}
//Task4::main();
