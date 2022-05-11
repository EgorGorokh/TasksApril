<?php

require_once "model.php";

class Controller
{
    static function checks()
    {
        if (!in_array(Model::$format, Model::$validFormat)) {
            throw new Exception('Формат файла не допустимый!');
            Model::$errorArray='ошибкааа';
        }

        if ($_FILES['filename']['size'] > 2 * 1024 * 1024) {
            throw new Exception('Размер файла превышает 2 мегабайта!');
        }

        if (is_executable($_FILES['filename']['tmp_name'])) {
            throw new Exception('Файл является исполняемым!');
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
            throw new Exception('Недостаточно места для сохранения!');
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

header("Location:index.php");
