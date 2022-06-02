<?php

require_once 'Model.php';
require_once '../vendor/autoload.php';

class Controller
{
    public function output(array $books)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        echo $twig->render('page.html',
            ['books' => $books]
        );
    }
    public function main()
    {
        $model = new Model();
        if (isset($_POST['addUser'])) {
            $model->addUser();
        }
        if (isset($_POST['delete'])) {
            $model->deleteUser($_POST['id']);
        }
        $this->output($model->users);
    }
}

