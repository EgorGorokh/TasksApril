<?php

require_once 'Main.php';

require_once 'Products.php';
require_once 'Laptops.php';
require_once 'TV.php';
require_once 'Mobilephone.php';
require_once 'Refrigerators.php';

require_once 'Services.php';
require_once 'Warranty_Service.php';
require_once 'Delivery_Service.php';
require_once 'Installation.php';
require_once 'Configuration_Service.php';

/* Можно создавать объекты (обычный конструктор)
 *
 * Можно читать информацию о товаре(обЪекте) с помощью метода read()
 *
 * Main::katalog() - Ознакомиться сразу со всем каталогом
 *
 * basket - это корзина
 *
 * Main::setBusket($ss) - добавляем в корзину товар или услугу
 *
 * Main::basketReceipt() - подсчитывает сумму корзины
 *
 * Автоматически происходит проверка на то , что если в корзине нету ни одного продукта и вы
 * хотите добавить услугу - вы не сможете!
 *
 */

// Добавляем в каталог
$w0 = new Services('12-11-2022', 'Yla', 111);
$w1 = new Laptops('televizor', 'qq', 'wq', 1400);
$w2 = new Products('fen', 'plilips', '11-03-2020', 120);
$w3 = new Services('12-11-2022', 'Egor', 111);

// Добавляем в корзину
Main::setBusket($w1);
Main::setBusket($w2);
Main::setBusket($w3);

// Подсчитываем стоимость покупки
//Main::basketReceipt();

// Ознакомиться с каталогом
//Main::katalog();
