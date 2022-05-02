<?php

abstract class Main
{
    public static $count = 0; // следит сколько в корзине товаров
    public static $sum = 0;
    public static $basket = [];

    public static function getBasket()
    {
        return Main::$basket;
    }

    public static function setBusket($element)
    {
        $cla = get_class($element);
        if ($cla == 'Laptops' || $cla == 'TV' || $cla == 'Mobilephones' || $cla == 'Refrigerators' || $cla == 'Products') {
            array_push(Main::$basket, $element);
            Main::$count++;
        } else {
            if (Main::$count > 0) {
                array_push(Main::$basket, $element);
            }
        }
    }

    public static function basketReceipt()
    {
        for ($i = 0; $i < count(Main::getBasket()); $i++) {
            Main::$sum += Main::$basket[$i]->getCost();
        }
        echo Main::$sum;
    }

    public static function katalog()
    {
        for ($i = 0; $i < count(Main::getBasket()); $i++) {
            foreach (Main::$basket[$i] as $key => $value) {
                echo '<br>' . $key . '=' . $value . '<br>';
            }
            print_r(Main::$basket[$i]);
        }
    }
}
