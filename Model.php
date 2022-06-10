<?php

class Model
{
    public $averageCheckAllTime;
    public $averageCheckToday;
    public $tableCars;
    public $tableCatalog;
    public $marks;

    public function getAverageCheckAllTime()
    {
        $result = DataBase::$mysql->query("SELECT AVG(`price`) FROM catalog ");
        $this->averageCheckAllTime = $result->fetch_row()[0];
    }

    public function getAverageCheckToday()
    {
        $result = DataBase::$mysql->query("SELECT AVG(`price`) FROM catalog WHERE `dateOfSale`=CURDATE()");
        $this->averageCheckToday = $result->fetch_row()[0];
    }

    public function getTableCars()
    {
        $this->tableCars = DataBase::$mysql->query("SELECT `dateOfSale`,COUNT(`dateOfSale`) AS coun FROM catalog GROUP BY `dateOfSale` DESC ");
    }

    public function getTableCatalog()
    {
        $this->tableCatalog = DataBase::$mysql->query("SELECT DISTINCT`price`,`color`,`releaseDate`,`model` FROM catalog INNER JOIN directory ON catalog.idDirectory = directory.id ORDER BY `model`,`price` DESC");
    }

    public function getMarks()
    {
        $this->marks = DataBase::$mysql->query("SELECT DISTINCT `model` FROM directory");
    }

}