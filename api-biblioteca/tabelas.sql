-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: lib
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,'Desenvolvendo com Laravel','Um framework para a construçao de aplicativos php modernos','999-65-7522-427-2','Matt Suffer','Novatec',5,'2014-06-01 01:12:26','2014-05-31 20:12:26'),(3,'Microservicos Prontos para a producao','Construindo sistemas padronizados em uma organizacao de engenharia de software','999-65-7522-427-2','SusanJ.Fowler','Novatec',5,'2014-06-01 01:12:26','2014-05-31 20:12:26'),(6,'Domain Driven Design','Atacando as Complexidades no Conraçao do software','999-65-7522-427-2','Eric Evans','Alfa Books',5,'2014-06-01 01:12:26','2014-05-31 05:12:21'),(7,'Php','Programando com Orientaçao a objetos','999-65-7522-427-2','Pablo Dall`Oglio','Novatec',5,'2016-01-11 15:46:02','2016-01-11 16:46:02'),(8,'CS','Programando com Orientaçao a objetos','999-65-7522-427-2','Pablo Dall`Oglio','Novatec',5,'2016-01-11 15:46:02','2016-01-11 16:46:02'),(9,'Zbrush','Character Creation  Advanced Digital Sculpting','999-65-7522-427-7','Richard Taylor','Sybex',5,'2020-05-11 21:48:52','2020-05-11 21:48:52'),(10,'Zbrush','Character Creation  Advanced Digital Sculpting','999-65-7522-427-7','Richard Taylor','Sybex',5,'2020-05-11 22:38:24','2020-05-11 22:38:24');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `column` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Artigos Acadêmicos','Artigos semestrais.','n1','2014-06-01 00:35:07','2014-05-30 20:34:33'),(2,'TCC','Trabalhos de conclusão de curso publicados','n2','2014-06-01 00:35:07','2014-05-30 20:34:33'),(3,'Artigos Periódicos','Artigos Periódicos','a1','2014-06-01 00:35:07','2014-05-30 20:34:54'),(5,'Livros Didáticos','Para o aprendizado','a2','2016-01-09 02:24:24','2016-01-08 15:27:26'),(6,'E-Books','Kindle books, audio books and more.','b1','2016-01-09 02:24:24','2016-01-08 15:27:47');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lib'
--

--
-- Dumping routines for database 'lib'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-12  0:19:12
