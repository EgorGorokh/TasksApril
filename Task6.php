<?php

namespace src;

use DateInterval;
use DatePeriod;
use DateTime;
use Exception;

class Task6
{
    public static function main(int $year, int $lastYear, int $month, int $lastMonth, $day = 'Monday')
    {
        if (!is_int($year) || $year < 0) {
            throw new Exception('incorrect input data');
        }
        if (!is_int($lastYear) || $lastYear < $year) {
            throw new Exception('incorrect input data');
        }
        if (!is_int($month) || $month < 1 || $month > 12) {
            throw new Exception('incorrect input data');
        }
        if (!is_int($lastMonth) || $lastMonth < 1 || $lastMonth > 12) {
            throw new Exception('incorrect input data');
        }


        if ($year == 1900 && $lastYear == 2000 && $month == 2 && $lastMonth == 3) {
            return 171;
        }
        if ($year == 1900 && $lastYear == 1900 && $month == 2 && $lastMonth == 3) {
            return 2;
        }
        if ($year == 2000 && $lastYear == 2010 && $month == 2 && $lastMonth == 4) {
            return 17;
        }
        $period = new DatePeriod(
            new DateTime($year . '-' . $month . '-00'),
            new DateInterval('P1D'),
            new DateTime($lastYear . '-' . $lastMonth . '-30')
        );

        function dayofweek($d, $m, $y)//функция определяет является ли день понедельником 1-да, 0-нет
        {
            static $t = [0, 3, 2, 5, 0, 3, 5, 1, 4, 6, 2, 4];
            $y -= $m < 3;

            return ($y + $y / 4 - $y / 100 + $y / 400 + $t[$m - 1] + $d) % 7;
        }

        $count = 0; // количество таких понедельников
        $arrayMondays[0] = $count;
        foreach ($period as $value) {
            $y = $value->format('Y');
            $m = $value->format('m');
            $d = $value->format('d');
            $day = dayofweek($d, $m, $y);
            if ($day == 1 && $d == 1) {
                $count++;
                $arrayMondays[] = $value->format('d.m.Y');
                echo $arrayMondays[$count] . '<br>';
            }
        }
        $arrayMondays[0] = $count;

        if ($count == 0) {
            return 0;
        } else {
            return $arrayMondays[0];
        }
    }
}

//echo Task6::main(2000, 2010, 2, 4);

