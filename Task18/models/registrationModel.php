<?php

require_once '../controllers/registrationController.php';

class registrationModel
{

    public static $name, $surname, $pass, $confirmationPass, $email, $confirmationEmail, $mysql, $errorArr = [];

    public static function con()
    {
        self::$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        self::$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
        self:: $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
        self::$confirmationPass = filter_var(trim($_POST['confirmation_pass']), FILTER_SANITIZE_STRING);
        self:: $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        self::$confirmationEmail = filter_var(trim($_POST['confirmation_email']), FILTER_SANITIZE_STRING);
    }

    public static function hash()
    {
        self::$pass = md5(registrationModel::$pass . 'egor12345');
    }

    public static function bd()
    {
        $email = self::$email;
        $name = self::$name;
        $surname = self::$surname;
        $pass = self::$pass;
        self::$mysql = new mysqli('localhost', 'root', 'root', 'Task15');
        self::$mysql->query("INSERT INTO `users` (`email`,`first_name`,`last_name`,`password`)
       VALUES ('$email','$name','$surname','$pass')");
    }

    public static function checkPass()
    {
        if (mb_strlen(self::$pass) < 6) {
            registrationModel::$errorArr[] = 'Длина пароля меньше 6 символов!';
        }
    }

    public static function checkcConfirmationPass()
    {
        if (self::$pass != self::$confirmationPass) {
            registrationModel::$errorArr[] = 'Несовпадение паролей!';
        }
    }

    public static function checkcConfirmationEmail()
    {
        if (self::$email != self::$confirmationEmail) {
            registrationModel::$errorArr[] = 'Несовпадение email!';
        }
    }

    public static function checkcEmail()
    {
        if (filter_var(self::$email, FILTER_VALIDATE_EMAIL)) {
            registrationModel::$errorArr[] = 'Некоректный email!';
        }
    }

    public static function checkcLetterOfPass()
    {
        if (ctype_upper(self::$pass)) {
            registrationModel::$errorArr[] = 'Пароль должен содержать хотя бы одну строчную букву!';
        }
    }

    public static function checkcBigLetterOfPass()
    {
        if (ctype_lower(self::$pass)) {
            registrationModel::$errorArr[] = 'Пароль должен содержать хотя бы одну заглавную букву!';
        }
    }

    public static function checkcNumberOfPass()
    {
        if (ctype_alpha(self::$pass)) {
            registrationModel::$errorArr[] = 'Пароль должен содержать хотя бы одну цифру!';
        }
    }

    public static function checkcSpecialSymbolOfPass()
    {
        if (preg_match('#^[aA-zZ0-9\-_]+$#', self::$pass)) {
            registrationModel::$errorArr[] = 'Пароль должен содержать хотя один специальный символ!(Пробел например)';
        }
    }
}