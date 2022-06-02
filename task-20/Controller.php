<?php

require_once 'Model.php';
require_once '../vendor/autoload.php';

class Controller
{
    public function main()
    {
        $model = new Model();
        if (isset($_POST['upload'])) {
            $model->addUser();
        }
        if (isset($_POST['delete'])) {
            $model->deleteUser($_POST['id']);
        }
        $model->output($model->users);
    }
}

