-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 03 2017 г., 08:42
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
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_orig_path` varchar(255) NOT NULL,
  `img_thumb_path` varchar(255) NOT NULL,
  `img_size` int(10) UNSIGNED NOT NULL,
  `img_view_cnt` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `img_name`, `img_orig_path`, `img_thumb_path`, `img_size`, `img_view_cnt`) VALUES
(23, 'pic_1491199789.jpg', './img/orig/pic_1491199789.jpg', './img/small/pic_1491199789.jpg', 282212, 1),
(24, 'pic_1491199791.jpg', './img/orig/pic_1491199791.jpg', './img/small/pic_1491199791.jpg', 282212, 1),
(25, 'pic_1491199889.jpg', './img/orig/pic_1491199889.jpg', './img/small/pic_1491199889.jpg', 282212, 1),
(26, 'pic_1491199902.jpg', './img/orig/pic_1491199902.jpg', './img/small/pic_1491199902.jpg', 282212, 4),
(27, 'pic_1491201298.jpg', './img/orig/pic_1491201298.jpg', './img/small/pic_1491201298.jpg', 282212, 2),
(28, 'pic_1491201468.jpg', './img/orig/pic_1491201468.jpg', './img/small/pic_1491201468.jpg', 282212, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
