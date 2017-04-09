-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2017 at 09:50 PM
-- Server version: 5.7.17-0ubuntu1
-- PHP Version: 7.0.15-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
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
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `title`, `body`, `email`, `name`, `date`) VALUES
(1, 'Отличный ресурс!', 'Отличный ресурс, все здорово, успехов и процветания. Ждем.', 'noname@noname.com', 'Иван Иванов', '2017-04-04 14:40:00'),
(2, 'Так держать!', 'Так держать ребята! Даешь больше картинок с котиками! Мне все нравится!', 'nobody@nopost.ru', 'Петр Петров', '2017-04-04 14:20:00'),
(3, 'Все еще слабовато', 'Все еще слабовато, но я за вас болею, продолжайте в том же духе. Буду продолжать следить за развитием ресурса.', 'guest@noname.com', 'Федор Федоров', '2017-04-05 07:51:59'),
(4, 'Проверяем работоспособность', 'Проверяем работоспособность сайта. Надеюсь ничего не сломается. Функционал на высоте.', 'no@no.org', 'Николай Николаев', '2017-04-05 09:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `images`
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
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `img_orig_path`, `img_thumb_path`, `img_size`, `img_view_cnt`, `date`) VALUES
(24, 'pic_1491199791.jpg', './img/orig/pic_1491199791.jpg', './img/small/pic_1491199791.jpg', 282212, 1, '0000-00-00 00:00:00'),
(25, 'pic_1491199889.jpg', './img/orig/pic_1491199889.jpg', './img/small/pic_1491199889.jpg', 282212, 2, '0000-00-00 00:00:00'),
(28, 'pic_1491201468.jpg', './img/orig/pic_1491201468.jpg', './img/small/pic_1491201468.jpg', 282212, 6, '0000-00-00 00:00:00'),
(30, 'pic_1491379505.jpg', './img/orig/pic_1491379505.jpg', './img/small/pic_1491379505.jpg', 40280, 16, '2017-04-05 10:05:05'),
(31, 'pic_1491380050.jpg', './img/orig/pic_1491380050.jpg', './img/small/pic_1491380050.jpg', 448312, 4, '2017-04-05 10:14:10'),
(32, 'pic_1491421280.jpg', './img/orig/pic_1491421280.jpg', './img/small/pic_1491421280.jpg', 87793, 0, '2017-04-05 22:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `folder` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `folder`, `title`) VALUES
(1, 'products', 'Товары'),
(2, 'feedbacks', 'Отзывы'),
(3, 'images', 'Фото'),
(4, 'users', 'Пользователи');

-- --------------------------------------------------------

--
-- Table structure for table `products`
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
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `articul`, `cost`, `count`, `description`, `img_name`, `img_orig_path`, `img_thumb_path`, `img_size`, `date`) VALUES
(1, 'Acer', '100001', '9999.99', 10, 'Дешево и сердито! Берите не пожалеете!', 'pic_1491380601.jpg', './img/orig/pic_1491380601.jpg', './img/small/pic_1491380601.jpg', '348721', '2017-04-05 10:23:21'),
(2, 'Iphone', '100002', '99999.99', 100, 'Последняя модель смартфона Apple.', 'pic_1491417958.jpg', './img/orig/pic_1491417958.jpg', './img/small/pic_1491417958.jpg', '58321', '2017-04-05 21:38:57'),
(3, 'Samsung', '100003', '19999.99', 50, 'Отличный телефон, хит продаж.', 'pic_1491420581.jpg', './img/orig/pic_1491420581.jpg', './img/small/pic_1491420581.jpg', '17412', '2017-04-06 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `role`, `date`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Администратор', 'admin@localhost', 'administrator', '2017-04-07 12:00:00'),
(2, 'customer', '5f4dcc3b5aa765d61d8327deb882cf99', 'Покупатель', 'customer@localhost', 'customer', '2017-04-07 13:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
