<?php

require_once "Task17.php";
require_once "index.php";

function proverki()
{
    global $format, $validFormat, $err, $errorArray;
    if (!in_array($format, $validFormat)) {
        $errorArray[] = 'Формат файла не допустимый!';
        $err++;
    }

    if ($_FILES['filename']['size'] > 2 * 1024 * 1024) {
        $errorArray[] = 'Размер файла превышает 2 мегабайта!';
        $err++;
    }

    if (is_executable($_FILES['filename']['tmp_name'])) {
        $errorArray[] = 'Файл является исполняемым!';
        $err++;
    }
}

function proverkaFiles()
{
    global $dir;
    if (!is_dir($dir)) {
        @mkdir('files');
    }
}

function proverkaMesta()
{
    global $err, $errorArray;
    if ((disk_free_space('files/')) < $_FILES['filename']['size']) {
        $errorArray[] = 'Недостаточно места для сохранения!';
        $err++;
    }
}

function proverkaLogs()
{
    global $dir;
    if (!is_dir($dir)) {
        mkdir('logs');
    }
}

proverki();
proverkaFiles();
proverkaMesta();
proverkaLogs();
recordFiles();
meta();
fileIn600();
water();
fileIn50();
