<?php

namespace src;

//require_once 'Task11_1.php';

class Task11
{
    private static $inst = null;
    //  public static $priv = 'alfa';


    private function __clone()
    {
    }

    private function __construct()
    {
    }

    public static function main()
    {
        if (self::$inst === null) {
            self::$inst = new self();
        }

        return self::$inst;
    }

    /*
        public static function who()
        {
            echo static::$priv;
        }*/

    /*   public static function test()
        {
            static::who(); // здесь работает позднее статическое связывание
        }*/
}
/*
$Object1 = Task11::getInstance();
$Object2 = Task11::getInstance();
$Object3 = Task11_1::getInstance();
$Object4 = Task11_1::getInstance();

$Object1->who();
$Object2->who();
$Object3->who();
$Object4->who();


Task11::who();
Task11_1::who();
Task11_1::who();
Task11_1::who();
*/
//$Object5 = new Task11_1();
