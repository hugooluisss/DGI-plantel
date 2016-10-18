CREATE DATABASE  IF NOT EXISTS `dgiplantel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dgiplantel`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: dgiplantel
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcion` (
  `idOpcion` bigint(20) unsigned NOT NULL,
  `idReactivo` int(10) unsigned DEFAULT NULL,
  `texto` text,
  `posicion` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idOpcion`),
  KEY `reactivo` (`idReactivo`),
  CONSTRAINT `fk-opcionReactivo` FOREIGN KEY (`idReactivo`) REFERENCES `reactivo` (`idReactivo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
INSERT INTO `opcion` VALUES (10,15,'<p>$6000.00<br></p>',0),(11,15,'<p>$12000.00<br></p>',0),(12,15,'<p>$11600.00<br></p>',0),(13,15,'<p>$14400.00<br></p>',0),(14,16,'<p>81, 486, 2916, 17496, ... <br></p>',0),(15,16,'<p>25, 125, 625, 3125...<br></p>',0),(16,16,'<p>25, 50, 100, 200…<br></p>',0),(17,16,'<p> 81, 161, 322, 644...<br></p>',0),(18,18,'<p>10 ºC <br></p>',0),(19,18,'<p>12ºC <br></p>',0),(20,18,'<p>24ºC <br></p>',0),(21,18,'<p>48ºC <br></p>',0),(22,19,'<p> $ 24.40<br></p>',0),(23,19,'<p>$ 46.55<br></p>',0),(24,19,'<p>$ 53.45 <br></p>',0),(25,19,'<p>$ 75.60<br></p>',0),(26,20,'<p>9 cerdos y 49 pavos<br></p>',0),(27,20,'<p>16 cerdos y 42 pavos<br></p>',0),(28,20,'<p> 26 cerdos y 32 pavos<br></p>',0),(29,20,'<p>30 cerdos y 28 pavos<br></p>',0),(30,21,'<p>cero<br></p>',0),(31,21,'<p>dos<br></p>',0),(32,21,'<p>tres<br></p>',0),(33,21,'<p>cuatro<br></p>',0),(34,22,'<p>Sustantivos<br></p>',0),(35,22,'<p>Adjetivos<br></p>',0),(36,22,'<p>Adverbios<br></p>',0),(37,22,'<p>Conjunciones<br></p>',0),(38,23,'<p> pero, aunque, y, Cierto<br></p>',0),(39,23,'<p> y, pero, debido, Además<br></p>',0),(40,23,'<p> y, no obstante, debido, Pero<br></p>',0),(41,23,'<p>de, aunque, y, No obstante<br></p>',0),(42,24,'<p> enseñan − quieren<br></p>',0),(43,24,'<p> enseña − quiere<br></p>',0),(44,24,'<p> enseñan − quiere<br></p>',0),(45,24,'<p> enseña − quieren<br></p>',0);
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-08 10:23:57
