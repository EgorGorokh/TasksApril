<?php

require_once 'Model.php';
require_once 'vendor/autoload.php';

class Controller
{
    public function output($averageCheckAllTime, $averageCheckToday, $table1, $table2, $table3)
    {
        $loader = new Twig_Loader_Filesystem('views/');
        $twig = new Twig_Environment($loader);
        echo $twig->render('page.html',
            ['averageCheckAllTime' => $averageCheckAllTime,
                'averageCheckToday' => $averageCheckToday,
                'arr1' => $table1,
                'arr2' => $table2,
                'arr3' => $table3
            ]
        );
    }

    public function main()
    {
        $model = new Model();
        $this->output($model->averageCheckAllTime, $model->averageCheckToday, $model->table1, $model->table2, $model->table3);
    }
}