<?php

class Checks
{
    public static $errorArr = [];
    public static function checkPass($pass)
    {
        if (mb_strlen($pass) < 6) {
            //throw new Exception('Длина пароля меньше 6 символов!');
            Checks::$errorArr[]='Длина пароля меньше 6 символов!';
        }
    }

    public static function checkcConfirmationPass($pass, $confirmationPass)
    {
        if ($pass != $confirmationPass) {
           // throw new Exception('Несовпадение паролей!');
            //echo 'Несовпадение паролей!';
            Checks::$errorArr[]='Несовпадение паролей!';
        }
    }

    public static function checkcConfirmationEmail($email, $confirmationEmail)
    {
        if ($email != $confirmationEmail) {
            Checks::$errorArr[]='Несовпадение email!';
            //throw new Exception('Несовпадение email!');
            $email = '';
            $confirmationEmail = '';
        }
    }

    public static function checkcEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Checks::$errorArr[]='Некоректный email!';
            //throw new Exception('Некоректный email!');
        }
    }

    public static function checkcLetterOfPass($pass)
    {
        if (ctype_upper($pass)) {
           // throw new Exception('Пароль должен содержать хотя бы одну строчную букву!');
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну строчную букву!';
        }
    }

    public static function checkcBigLetterOfPass($pass)
    {
        if (ctype_lower($pass)) {
           // throw new Exception('Пароль должен содержать хотя бы одну заглавную букву!');
            //echo 'Пароль должен содержать хотя бы одну заглавную букву!';
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну заглавную букву!';
        }
    }

    public static function checkcNumberOfPass($pass)
    {
        if (ctype_alpha($pass)) {
           // throw new Exception('Пароль должен содержать хотя бы одну цифру!');
            Checks::$errorArr[]='Пароль должен содержать хотя бы одну цифру!';
        }
    }

    public static function checkcSpecialSymbolOfPass($pass)
    {
        if (preg_match('#^[aA-zZ0-9\-_]+$#', $pass)) {
           // throw new Exception('Пароль должен содержать хотя один специальный символ!(Пробел например)');
            Checks::$errorArr[]='Пароль должен содержать хотя один специальный символ!(Пробел например)';
        }
    }
}