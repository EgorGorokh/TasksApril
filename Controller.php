<?php

require_once 'Model.php';
require_once 'vendor/autoload.php';

class Controller
{
    public function output($users)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        if (!isset($_POST['edit'])) {
            echo $twig->render('page.html',
                ['books' => $users]
            );
        } else {
            echo $twig->render('page.html',
                ['books' => $users,
                    'id' => $_POST['id']]
            );
        }
    }

    public function main()
    {
        $model = new Model();
        if (isset($_POST['name'])) {
            $model->construct_Parametrs($_POST['name'], $_POST['email'], $_POST['gender'], $_POST['position']);
            if (isset($_POST['addUser'])) {
                $model->addUser();
            }
            if (isset($_POST['delete'])) {
                $model->deleteUser($_POST['id']);
            }
            if (isset($_POST['editNow'])) {
                $model->editUser($_POST['id']);
            }
        }
        $this->output($model->users);
    }
}
