-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июн 08 2022 г., 17:44
-- Версия сервера: 5.7.34
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Task19`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) UNSIGNED NOT NULL,
  `idDirectory` int(11) UNSIGNED NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` int(15) NOT NULL,
  `sold` tinyint(4) NOT NULL,
  `dateOfSale` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `idDirectory`, `color`, `price`, `sold`, `dateOfSale`) VALUES
(27, 3, 'yellow', 3000, 0, NULL),
(29, 3, 'blue', 5000, 1, '2022-05-05'),
(30, 5, 'green', 6000, 1, '2021-05-05'),
(31, 5, 'pink', 7000, 0, NULL),
(32, 6, 'grey', 8000, 0, NULL),
(33, 8, 'white', 9000, 1, '2021-04-04'),
(34, 8, 'white', 9000, 1, '2022-05-15'),
(35, 8, 'black', 9000, 1, '2022-05-05'),
(36, 8, 'black', 7700, 1, '2002-05-05'),
(37, 8, 'black', 7700, 1, '2002-05-05'),
(38, 8, 'black', 4444, 1, '2002-09-09'),
(39, 6, 'black', 5555, 1, '2009-09-09'),
(40, 6, 'black', 9000, 1, '2009-09-09'),
(41, 6, 'black', 9000, 1, '2009-09-09'),
(42, 6, 'black', 9000, 1, '2009-09-09'),
(43, 6, 'black', 9000, 1, '2009-09-09'),
(44, 6, 'black', 9000, 1, '2009-09-09'),
(45, 6, 'black', 9000, 1, '2022-05-17'),
(46, 6, 'black', 9000, 1, '2022-05-17'),
(47, 10, 'yellow', 2222, 0, NULL),
(48, 10, 'yellow', 2222, 0, NULL),
(49, 6, 'black', 4000, 1, '2022-05-17'),
(50, 11, 'purple', 10000, 1, '2022-06-06'),
(51, 11, 'purple', 9999, 1, '2022-05-19'),
(52, 11, 'purple', 9999, 1, '2022-05-19'),
(53, 11, 'purple', 9999, 1, '2022-05-19'),
(54, 11, 'purple', 9999, 1, '2022-05-19'),
(55, 11, 'purple', 9999, 1, '2022-05-19'),
(56, 8, 'black', 4444, 1, '2022-06-05'),
(57, 8, 'black', 4444, 1, '2002-09-09'),
(58, 8, 'black', 4444, 1, '2002-09-09'),
(59, 8, 'black', 4444, 1, '2002-09-09'),
(60, 8, 'black', 4444, 1, '2002-09-09');

-- --------------------------------------------------------

--
-- Структура таблицы `directory`
--

CREATE TABLE `directory` (
  `id` int(11) UNSIGNED NOT NULL,
  `model` varchar(30) NOT NULL,
  `releaseDate` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `directory`
--

INSERT INTO `directory` (`id`, `model`, `releaseDate`) VALUES
(3, 'CR-V', 2017),
(4, 'CR-V. Pilot', 2015),
(5, 'Crosstour', 2013),
(6, 'Accord', 2012),
(8, 'Jazz', 2010),
(9, 'Jazz', 2010),
(10, 'mompa', 2010),
(11, 'ajax', 2007),
(12, 'mompa', 2010),
(13, 'mompa', 2010),
(14, 'mompa', 2010),
(15, 'mompa', 2010),
(16, 'mompa', 2010);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `directory`
--
ALTER TABLE `directory`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `directory`
--
ALTER TABLE `directory`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
