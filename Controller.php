<?php

require_once 'Model.php';
require_once 'vendor/autoload.php';

class Controller
{
    public function output($averageCheckAllTime, $averageCheckToday, $tableCars, $tableCatalog, $marks)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        echo $twig->render('page.html',
            ['averageCheckAllTime' => $averageCheckAllTime,
                'averageCheckToday' => $averageCheckToday,
                'tableCars' => $tableCars,
                'tableCatalog' => $tableCatalog,
                'marks' => $marks
            ]
        );
    }

    public function main()
    {
        $model = new Model();
        $model->getAverageCheckAllTime();
        $model->getAverageCheckToday();
        $model->getMarks();
        $model->getTableCars();
        $model->getTableCatalog();
        $this->output($model->averageCheckAllTime, $model->averageCheckToday, $model->tableCars, $model->tableCatalog, $model->marks);
    }
}