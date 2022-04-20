<?php

namespace src;

use DateInterval;
use DatePeriod;
use DateTime;
use Exception;

class Task6
{
    /**
     * @throws Exception
     */
    public static function main($year, $lastYear, $month, $lastMonth, $day = 'Monday')
    {
        if (!is_int($year) || $year < 0) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($lastYear) || $lastYear < $year) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($month) || $month < 1 || $month > 12) {
            throw new \InvalidArgumentException();
        }
        if (!is_int($lastMonth) || $lastMonth < 1 || $lastMonth > 12) {
            throw new \InvalidArgumentException();
        }

        $period = new DatePeriod(
            new DateTime($year . '-' . $month . '-01'),
            new DateInterval('P1D'),
            new DateTime($lastYear . '-' . $lastMonth . '-28')
        );

        function dayofweek($d, $m, $y): int//функция определяет является ли день понедельником 1-да, 0-нет
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
                $arrayMondays[] = $value->format('Y.m.d');
            }
        }
        $arrayMondays[0] = $count;
        /*
                for($i=0;$i<count($arrayMondays);$i++){
                echo $arrayMondays[$i].'<br>';
            }

                print_r( $arrayMondays);*/
        return $arrayMondays;
    }
}
