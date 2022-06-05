<?php

require_once 'index.php';

class Model
{
    public $users;

    public function __construct()
    {
        $this->users = DataBase::$mysql->query("SELECT * FROM `users`");
    }

    public function addUser()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $position = $_POST["position"];
        DataBase::$mysql->query("INSERT INTO `users`(`name`, `email`, `gender`, `position`) VALUES ('$name','$email','$gender','$position')");
        header("Location:index.php");
        exit();
    }

    public function deleteUser(string $id)
    {
        DataBase::$mysql->query("DELETE FROM `users` WHERE id=$id");
        header("Location:index.php");
        exit();
    }

    public function editUser(string $id)
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $position = $_POST["position"];
        DataBase::$mysql->query("UPDATE `users` SET `name`='$name',`email`='$email',`gender`='$gender',`position`='$position' WHERE id=$id");
        header("Location:index.php");
        exit();
    }
}
