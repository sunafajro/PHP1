-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 05 2017 г., 10:38
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `title`, `body`, `email`, `name`, `date`) VALUES
(1, 'Отличный ресурс!', 'Отличный ресурс, все здорово, успехов и процветания.', 'noname@noname.com', 'Иван Иванов', '2017-04-04 14:40:00'),
(2, 'Так держать!', 'Так держать ребята! Даешь больше картинок с котиками! Мне все нравится!', 'nobody@nopost.ru', 'Петр Петров', '2017-04-04 14:20:00'),
(3, 'Все еще слабовато', 'Все еще слабовато, но я за вас болею, продолжайте в том же духе.', 'guest@noname.com', 'Федор Федоров', '2017-04-05 07:51:59'),
(4, 'Проверяем работоспособность', 'Проверяем работоспособность сайта. Надеюсь ничего не сломается.', 'no@no.org', 'Николай Николаев', '2017-04-05 09:18:59');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_orig_path` varchar(255) NOT NULL,
  `img_thumb_path` varchar(255) NOT NULL,
  `img_size` int(10) UNSIGNED NOT NULL,
  `img_view_cnt` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img_name`, `img_orig_path`, `img_thumb_path`, `img_size`, `img_view_cnt`, `date`) VALUES
(24, 'pic_1491199791.jpg', './img/orig/pic_1491199791.jpg', './img/small/pic_1491199791.jpg', 282212, 1, '0000-00-00 00:00:00'),
(25, 'pic_1491199889.jpg', './img/orig/pic_1491199889.jpg', './img/small/pic_1491199889.jpg', 282212, 1, '0000-00-00 00:00:00'),
(27, 'pic_1491201298.jpg', './img/orig/pic_1491201298.jpg', './img/small/pic_1491201298.jpg', 282212, 2, '0000-00-00 00:00:00'),
(28, 'pic_1491201468.jpg', './img/orig/pic_1491201468.jpg', './img/small/pic_1491201468.jpg', 282212, 6, '0000-00-00 00:00:00'),
(30, 'pic_1491379505.jpg', './img/orig/pic_1491379505.jpg', './img/small/pic_1491379505.jpg', 40280, 14, '2017-04-05 10:05:05'),
(31, 'pic_1491380050.jpg', './img/orig/pic_1491380050.jpg', './img/small/pic_1491380050.jpg', 448312, 2, '2017-04-05 10:14:10');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `articul` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_orig_path` varchar(255) NOT NULL,
  `img_thumb_path` varchar(255) NOT NULL,
  `img_size` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `articul`, `cost`, `count`, `description`, `img_name`, `img_orig_path`, `img_thumb_path`, `img_size`, `date`) VALUES
(1, 'Samsung S7', '100001', '9999.99', 10, '1', 'pic_1491380601.jpg', './img/orig/pic_1491380601.jpg', './img/small/pic_1491380601.jpg', '348721', '2017-04-05 10:23:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
