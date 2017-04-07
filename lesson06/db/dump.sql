-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: gallery
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,'Отличный ресурс!','Отличный ресурс, все здорово, успехов и процветания. Ждем.','noname@noname.com','Иван Иванов','2017-04-04 14:40:00'),(2,'Так держать!','Так держать ребята! Даешь больше картинок с котиками! Мне все нравится!','nobody@nopost.ru','Петр Петров','2017-04-04 14:20:00'),(3,'Все еще слабовато','Все еще слабовато, но я за вас болею, продолжайте в том же духе. Буду продолжать следить за развитием ресурса.','guest@noname.com','Федор Федоров','2017-04-05 07:51:59'),(4,'Проверяем работоспособность','Проверяем работоспособность сайта. Надеюсь ничего не сломается. Функционал на высоте.','no@no.org','Николай Николаев','2017-04-05 09:18:59');
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) NOT NULL,
  `img_orig_path` varchar(255) NOT NULL,
  `img_thumb_path` varchar(255) NOT NULL,
  `img_size` int(10) unsigned NOT NULL,
  `img_view_cnt` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (24,'pic_1491199791.jpg','./img/orig/pic_1491199791.jpg','./img/small/pic_1491199791.jpg',282212,1,'0000-00-00 00:00:00'),(25,'pic_1491199889.jpg','./img/orig/pic_1491199889.jpg','./img/small/pic_1491199889.jpg',282212,2,'0000-00-00 00:00:00'),(28,'pic_1491201468.jpg','./img/orig/pic_1491201468.jpg','./img/small/pic_1491201468.jpg',282212,6,'0000-00-00 00:00:00'),(30,'pic_1491379505.jpg','./img/orig/pic_1491379505.jpg','./img/small/pic_1491379505.jpg',40280,15,'2017-04-05 10:05:05'),(31,'pic_1491380050.jpg','./img/orig/pic_1491380050.jpg','./img/small/pic_1491380050.jpg',448312,4,'2017-04-05 10:14:10'),(32,'pic_1491421280.jpg','./img/orig/pic_1491421280.jpg','./img/small/pic_1491421280.jpg',87793,0,'2017-04-05 22:41:20');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `articul` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `description` text NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_orig_path` varchar(255) NOT NULL,
  `img_thumb_path` varchar(255) NOT NULL,
  `img_size` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Acer','100001',9999.99,10,'Дешево и сердито! Берите не пожалеете!','pic_1491380601.jpg','./img/orig/pic_1491380601.jpg','./img/small/pic_1491380601.jpg','348721','2017-04-05 10:23:21'),(2,'Iphone','100002',99999.99,100,'Последняя модель смартфона Apple.','pic_1491417958.jpg','./img/orig/pic_1491417958.jpg','./img/small/pic_1491417958.jpg','58321','2017-04-05 21:38:57'),(3,'Samsung','100003',19999.99,200,'Самый продаваемый смартфон!','pic_1491420581.jpg','./img/orig/pic_1491420581.jpg','./img/small/pic_1491420581.jpg','17412','2017-04-05 22:28:39');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-05 22:46:12
