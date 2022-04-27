<?php

namespace src;

class Task4
{
    public static function main(string $input): string
    {
        if (!is_string($input)) {
            throw new Exception('incorrect input data');
        }
        $dash = str_replace(['-', '_', ':', ';', '*', '=', '+', '$'], ' ', $input);
        $bigLetter = ucwords($dash);

        return str_replace(' ', '', $bigLetter);
    }
}
//echo Task4::main('jdv__$$$ddd_fff----Gu***wv :::::;;;;;wihb');
