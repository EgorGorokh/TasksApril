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
