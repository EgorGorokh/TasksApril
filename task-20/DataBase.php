<?php

//trying git commit

class DataBase
{
    public static $mysql;

    public function __construct()
    {
        DataBase::$mysql = new mysqli('localhost:8889', 'root', 'root', 'Task20');
    }
}