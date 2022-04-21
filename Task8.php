<?php

namespace src;

class Task8
{
    public function main(string $json): string
    {
        if (!$this->isJSON($json)) {
            return throw new \InvalidArgumentException();
        }
        $books = json_decode($json, true);


        $st = '';
        foreach ($books as $field => $value) {
            if (is_scalar($value) or is_null($value)) {
                $st = $st . $field . ': ' . $value."\r\n";
                // echo"3";
            }

            if (is_array($value)) {
                foreach ($value as $key => $item) {
                    $st = $st . $key . ': ' . $item;
                }
            }

            if (is_object($value)) {
                foreach ($value as $field_ob => $value_ob) {
                    $st .= $st . $field_ob . ': ' . $value_ob."\r\n";
                    //echo 'jhjhv';
                }
            }
        }

        return $st;
    }

    public function isJSON($string): bool
    {
        return is_string($string) && is_array(json_decode($string, true)) ? true : false;
    }
}
/*
print_r((new Task8)->main('{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}'));
*/

/*
print_r((new Task8)->main('{
1
}
'));*/
