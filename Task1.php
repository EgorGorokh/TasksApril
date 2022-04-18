<?php

namespace Task;

class Task1
{
    public static function main(int $inputNumber): string
    {
        if (!is_int($inputNumber)) {
            throw new Exception('incorrect input data');
        }

        return ($inputNumber > 30
            ? 'More than 30'
            : ($inputNumber > 20
                ? 'More than 20'
                : ($inputNumber > 10
                    ? 'More than 10'
                    : 'Less than 10')));
    }
}

//Task1::main();
