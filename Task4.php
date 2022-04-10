<?php

namespace Task;

class Task4
{
    public static function main($input): string
    {
        $dash = str_replace('-', ' ', $input);
        $underline = str_replace('_', ' ', $dash);
        $bigLetter = ucwords($underline);
        return str_replace(' ', '', $bigLetter);
    }
}
 Task4::main();