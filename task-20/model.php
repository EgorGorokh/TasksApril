<?php

require_once 'api.php';

class Model
{
    public $data;
    public $books;

    public function getData($users)
    {
        $this->data = file_get_contents($users);
    }

    public function setData()
    {
        return $this->data;
    }

    public function getBooks($data)
    {
        $this->books = json_decode($data, true);
    }

    public function setBooks()
    {
        return $this->books;
    }
}
