<?php

require_once 'Model.php';
require_once '../vendor/autoload.php';
require_once 'index.php';


class Controller
{
    public function main()
    {
        $modelExample = new Model();
        if (isset($_POST['upload'])) {
            $modelExample->writeToAPI();
        }
        if (isset($_POST['delete'])) {
            $modelExample->delete($_POST['id']);
        }
        $modelExample->output($modelExample->users);
    }
}


