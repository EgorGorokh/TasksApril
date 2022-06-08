<?php

class Model
{
    public $averageCheckAllTime;
    public $averageCheckToday;
    public $table1;
    public $table2;
    public $table3;

    public function __construct()
    {
        $result = DataBase::$mysql->query("SELECT AVG(`price`) FROM catalog ");
        $this->averageCheckAllTime = $result->fetch_row()[0];
        $result = DataBase::$mysql->query("SELECT AVG(`price`) FROM catalog WHERE `dateOfSale`=CURDATE()");
        $this->averageCheckToday = $result->fetch_row()[0];
        $this->table1 = DataBase::$mysql->query("SELECT `dateOfSale`,COUNT(`dateOfSale`) AS coun FROM catalog GROUP BY `dateOfSale` DESC ");
        $this->table2 = DataBase::$mysql->query("SELECT DISTINCT`price`,`color`,`releaseDate`,`model` FROM catalog INNER JOIN directory ON catalog.idDirectory = directory.id ORDER BY `model`,`price` DESC");
        $this->table3 = DataBase::$mysql->query("SELECT DISTINCT `model` FROM directory");
    }
}