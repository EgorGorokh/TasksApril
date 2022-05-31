<?php

require_once 'Model.php';
require_once '../vendor/autoload.php';
require_once 'index.php';


class Controller
{
    public static function main()
    {
        $modelExample = new Model();
        $modelExample->getData(Api::$users);
        $data = $modelExample->setData();
        $modelExample->getBooks($data);
        $books = $modelExample->setBooks();
        $modelExample->output($data, $books);
        if (isset($_POST['upload'])) {
            Model::writeToAPI();
        }
    }
}

//$object = new Controller();
//$object->main();
//Controller::main();

