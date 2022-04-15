<?php

namespace Task;

require_once "Task11_1.php";

class Task11
{
    private function __construct()
    {

    }

    private function __clone()
    {

    }

// один только объект
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Task11();
        }
        return $inst;
    }


    public static function who()
    {
        echo "class task11";
    }

    public static function test()
    {
        static::who(); // здесь работает позднее статическое связывание
    }



}



//Task11_1::test();
//$dd=new A();  // ошибка выдаст это хорошо
 $obj=Task11::Instance(); // можно использовать
//echo $obj;

