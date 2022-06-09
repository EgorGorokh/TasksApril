<?php

class Model
{
    public $users;
    public $name;
    public $email;
    public $gender;
    public $position;

    public function __construct($name,$email,$gender,$position)
    {
        $this->users = DataBase::$mysql->query("SELECT * FROM `users`");
        $this->name=$name;
        $this->email=$email;
        $this->gender=$gender;
        $this->position=$position;
    }

    public function addUser()
    {
        DataBase::$mysql->query("INSERT INTO `users`(`name`, `email`, `gender`, `position`) VALUES ('$this->name','$this->email','$this->gender','$this->position')");
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
        DataBase::$mysql->query("UPDATE `users` SET `name`='$this->name',`email`='$this->email',`gender`='$this->gender',`position`='$this->position' WHERE id=$id");
        header("Location:index.php");
        exit();
    }
}