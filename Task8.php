<?php

namespace Task;

class Task8
{
    public static function main(string $json)
    {
        if (!is_string($json) && !is_array(json_decode($json, true))) {
            throw new Exception('incorrect input data');
        }
        function bookArray($value, $key)
        {
            print_r("$key: $value<br>");
        }
        $books = json_decode($json, true);
        array_walk_recursive($books, 'Task\bookArray');

    }
}

 /*Task8::main('{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}');*/
