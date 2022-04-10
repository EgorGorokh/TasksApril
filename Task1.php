<?php

namespace Task;

class Task1
{
    public static function main($inputNumber) : string
    {
        return !filter_var($inputNumber, FILTER_VALIDATE_INT) === TRUE
            ? "incorrect input data"
            : ($inputNumber > 30
                ? "More than 30"
                : ($inputNumber > 20
                    ? "More than 20"
                    : ($inputNumber > 10
                        ? "More than 10"
                        : "Less than 10")));
    }
}

Task1::main();