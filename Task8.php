<?php

namespace src;

class Task8
{
    public static function main(string $json)
    {
        if (!is_string($json) && !is_array(json_decode($json, true))) {
            throw new \InvalidArgumentException();
        }
        /*
                function bookArray($value, $key)
                {
                    global $st;
                    global $str;
                    $str = $key . ': ' . $value;
                    $st = $st . $str . '<br>';
                    // echo $str . "<br>";
                    // echo $str . '<br>';
                    // print_r("$key: $value<br>");
                    // echo '<br>'.$st.'<br>';
                    // echo $st;
                }
        */
        //echo $st;

        //  $books = json_decode($json, true);
        $books = json_decode($json);
        //array_walk_recursive($books, 'src\bookArray');
        //  foreach ($books as $key => $value) {
        // echo $key;
        //  echo "<br>";
        // }
        //  foreach ($books->array[0] as $key => $values) {
        //   echo "$key:$values<br>";
        //  }

        $st = '';
        foreach ($books as $field => $value) {
            //если скалярное значение
            if (is_scalar($value) or is_null($value)) {
                // echo $field . ' : ' . $value . '</br>';
                $st = $st . $field . ': ' . $value."\r\n";
            }
            //если массив
            if (is_array($value)) {
                for ($i = 0; $i < count($value); $i++) {
                    //а в нем у нас объекты
                    foreach ($value[$i] as $field_ob => $value_ob) {
                        // echo  $field_ob . ' -> ' . $value_ob . '</br>';
                    }
                }
            }
            //если другой объект
            if (is_object($value)) {
                foreach ($value as $field_ob => $value_ob) {
                    //  echo/* $field . ' -> ' .*/ $field_ob . ' : ' . $value_ob . '</br>';
                    $st = $st . $field_ob . ': ' . $value_ob;
                }
            }
        }
        // echo '<br>'.$st.'<br>';

        return $st;
        //print_r($books);
        //  echo '<br>';
        // echo $st;
        //echo '<br>';
        //  $books = json_encode($books, true);
        // print_r($books);
    }
}
 echo Task8::main('{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}');
