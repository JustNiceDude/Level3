-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: library_db
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Андрей Богуславский'),(2,'Марк Саммерфильд'),(3,'М. Вильямс'),(4,'Уэс Маккинни'),(5,'Брюс Эккель'),(6,'Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн'),(7,'Дэвид Флэнаган'),(8,'Гэри Маклин Холл'),(9,'Джеймс Р. Грофф'),(10,'Люк Веллинг'),(11,'Сергей Мастицкий'),(12,'Джон Вудкок'),(13,'Джереми Блум'),(14,'А. Белов'),(15,'Сэмюэл Грингард'),(16,'Сет Гринберг'),(17,'Александр Сераков'),(18,'Тим Кедлек'),(19,'Пол Дейтел, Харви Дейтел'),(20,'Роберт Мартин'),(21,'Энтони Грей'),(22,'Мартин Фаулер, Прамодкумар Дж. Садаладж'),(23,'Джей Макгаврен'),(24,'Дрю Нейл');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_list`
--

DROP TABLE IF EXISTS `books_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `number_of_pages` int NOT NULL,
  `clicks` int NOT NULL,
  `views` int NOT NULL,
  `delete_at` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_list`
--

LOCK TABLES `books_list` WRITE;
/*!40000 ALTER TABLE `books_list` DISABLE KEYS */;
INSERT INTO `books_list` VALUES (7,'JavaScript Pocket Reference',1995,'31.jpg','JavaScript Pocket Reference',260,0,0,NULL),(8,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles',2020,'32.jpg','Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles',320,0,0,NULL),(9,'SQL: The Complete Reference',2010,'33.jpg','SQL: The Complete Reference',280,0,0,NULL),(10,'PHP and MySQL Web Development',2002,'34.jpg','PHP and MySQL Web Development',450,0,0,NULL),(11,'Статистический анализ и визуализация данных с помощью R',2003,'35.jpg','Статистический анализ и визуализация данных с помощью R',145,0,0,NULL),(12,'Computer Coding for Kid',2006,'36.jpg','Computer Coding for Kid',220,0,0,NULL),(13,'Exploring Arduino: Tools and Techniques for Engineering Wizardry',2000,'37.jpg','Exploring Arduino: Tools and Techniques for Engineering Wizardry',420,0,0,NULL),(14,'Программирование микроконтроллеров для начинающих и не только',2007,'38.jpg','Программирование микроконтроллеров для начинающих и не только',180,0,0,NULL),(15,'The Internet of Things',1999,'39.jpg','The Internet of Things',215,0,0,NULL),(16,'Sketching User Experiences: The Workbook',1995,'40.jpg','Sketching User Experiences: The Workbook',310,0,0,NULL),(17,'InDesign CS6',2011,'41.jpg','InDesign CS6',230,0,0,NULL),(18,'Адаптивный дизайн. Делаем сайты для любых устройств',2001,'42.jpg','Адаптивный дизайн. Делаем сайты для любых устройств',330,0,0,NULL),(19,'Android для разработчиков',2001,'43.jpg','Android для разработчиков',150,0,0,NULL),(20,'Clean Code: A Handbook of Agile Software Craftsmanship',2003,'44.jpg','Clean Code: A Handbook of Agile Software Craftsmanship',420,0,0,NULL),(21,'ESwift Pocket Reference: Programming for iOS and OS X',2004,'45.jpg','ESwift Pocket Reference: Programming for iOS and OS X',350,0,0,NULL),(22,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence',2000,'46.jpg','NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence',510,0,0,NULL),(23,'Head First Ruby',2000,'47.jpg','Head First Ruby',270,0,0,NULL),(24,'Practical Vim',2000,'48.jpg','Practical Vim',370,0,0,NULL);
/*!40000 ALTER TABLE `books_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'001_create_migration_table.sql','2021-02-10 14:53:30'),(2,'002_create_boks_tabel.sql','2021-02-10 14:53:30'),(3,'003_add_books.sql','2021-02-10 14:53:31'),(4,'004_create_autors_table.sql','2021-02-10 14:53:31'),(5,'005_create_pairs_id_table.sql','2021-02-10 14:53:31'),(6,'006_create_admins_table.sql','2021-02-10 14:53:32');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pairs_id`
--

DROP TABLE IF EXISTS `pairs_id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pairs_id` (
  `book_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pairs_id`
--

LOCK TABLES `pairs_id` WRITE;
/*!40000 ALTER TABLE `pairs_id` DISABLE KEYS */;
INSERT INTO `pairs_id` VALUES (7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24);
/*!40000 ALTER TABLE `pairs_id` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-11 17:02:01
