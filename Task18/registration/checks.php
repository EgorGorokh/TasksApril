<?php

class Checks
{
    public static $errorArr = [];
    public static function checkPass($pass)
    {
        if (mb_strlen($pass) < 6) {
            Checks::$errorArr[]='Длина пароля меньше 6 символов!';
        }
    }

    public static function checkcConfirmationPass($pass, $confirmationPass)
    {
        if ($pass != $confirmationPass) {
            Checks::$errorArr[]='Несовпадение паролей!';
        }
    }

    public static function checkcConfirmationEmail($email, $confirmationEmail)
    {
        if ($email != $confirmationEmail) {
            Checks::$errorArr[]='Несовпадение email!';
            $email = '';
            $confirmationEmail = '';
        }
    }

    public static function checkcEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Checks::$errorArr[]='Некоректный email!';
        }
    }

    public static function checkcLetterOfPass($pass)
    {
        if (ctype_upper($pass)) {
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну строчную букву!';
        }
    }

    public static function checkcBigLetterOfPass($pass)
    {
        if (ctype_lower($pass)) {
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну заглавную букву!';
        }
    }

    public static function checkcNumberOfPass($pass)
    {
        if (ctype_alpha($pass)) {
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну цифру!';
        }
    }

    public static function checkcSpecialSymbolOfPass($pass)
    {
        if (preg_match('#^[aA-zZ0-9\-_]+$#', $pass)) {
            Checks::$errorArr[]='Пароль должен содержать хотя один специальный символ!(Пробел например)';
        }
    }
}