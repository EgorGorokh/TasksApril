<?php

require_once "model.php";

class Controller
{
    static function checks()
    {
        if (!in_array(Model::$format, Model::$validFormat)) {
            Model::$errorArray[]='Формат файла не допустимый!';
        }

        if ($_FILES['filename']['size'] > 2 * 1024 * 1024) {
            Model::$errorArray[]='Размер файла превышает 2 мегабайта!';
        }

        if (is_executable($_FILES['filename']['tmp_name'])) {
            Model::$errorArray[]='Файл является исполняемым!';
        }
    }

    static function checkFile()
    {
        if (!is_dir(Model::$files)) {
            @mkdir('files');
        }
    }

    static function checkPlace()
    {
        if ((disk_free_space('files/')) < $_FILES['filename']['size']) {
            Model::$errorArray[]='Недостаточно места для сохранения!';
        }
    }

    static function checkLog()
    {
        if (!is_dir(Model::$dir)) {
            mkdir('logs');
        }
    }
}

Model::setArray();
Model::setFormat();
Model::setdd();
Model::setlog();
Controller::checks();
Controller::checkFile();
Controller::checkPlace();
Controller::checkLog();
Model::morecordFiles();
Model::meta();
Model::fileIn600();
Model::coatingWatermark();
Model::fileIn50();

header("Location:sending.php");