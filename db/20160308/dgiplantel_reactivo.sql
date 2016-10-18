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
-- Table structure for table `reactivo`
--

DROP TABLE IF EXISTS `reactivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reactivo` (
  `idReactivo` int(10) unsigned NOT NULL,
  `idTema` int(10) unsigned NOT NULL,
  `idExamen` int(10) unsigned DEFAULT NULL,
  `respuesta` bigint(20) unsigned DEFAULT '0',
  `instrucciones` text,
  `valor` decimal(3,1) unsigned DEFAULT '0.0',
  `posicion` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idReactivo`),
  KEY `fk_reactivo_examen` (`idExamen`),
  KEY `fk_temaReactivo` (`idTema`),
  CONSTRAINT `fk-temaReactivo` FOREIGN KEY (`idTema`) REFERENCES `tema` (`idTema`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-reactivoExamen` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reactivo`
--

LOCK TABLES `reactivo` WRITE;
/*!40000 ALTER TABLE `reactivo` DISABLE KEYS */;
INSERT INTO `reactivo` VALUES (15,15,29,10,'<p>Doña Carmen tiene una cuenta de ahorro con un saldo de $20000.00 y sólo ocupa cada mes $1200.00 para pagar la\nescuela de su nieto. Si mensualmente deposita $500.00, ¿cuánto dinero tendrá la cuenta al final del año?<br></p>',1.0,0),(16,15,29,15,'<p>Observa las siguientes sucesiones y selecciona la que continúa.</p><p>4, 8, 16, 32,... <br></p><p>9, 27, 81, 243,... <br></p><p>16, 64, 256, 1024,...&nbsp;</p>',1.0,0),(18,15,29,19,'<p>En la ciudad de Oaxaca, durante el día se registraron las siguientes temperaturas: 8ºC,10ºC,12ºC,18ºC, ¿qué\ntemperatura promedio se registró al día?<br></p>',1.0,0),(19,17,29,23,'Fernando fue a la tienda y compró 3 Kg. de frijol a $11.85 cada kilo, 2 latas de atún a $ 5.35 cada una y 1 litro de leche a\n$7.20. Si pagó con un billete de $ 100.00, ¿cuánto le dieron de cambio?',1.0,0),(20,18,29,28,'<p>Una granja tiene pavos y cerdos, en total hay 58 cabezas y 168 patas. ¿Cuántos cerdos y pavos son en total? <br></p>',1.0,0),(21,25,29,0,'<p>En el siguiente ejemplo “Un rayo resplandeció y un árbol se estremeció”, hay ________ oraciones simples.<br></p>',1.0,0),(22,24,29,36,'<p>¿A qué categoría gramatical pertenecen las palabras escritas en negritas en el siguiente texto?\nLa <b>contemplación</b> amorosa y devota de las <b>maravillas</b> del suelo nos dejó alguna vez <b><i></i></b><i></i><i></i><b>impresiones</b><b></b> encantadoras y\ngratas, que conservamos con cariño durante nuestra <b>vida</b>.<br></p><br><br><br><br><br><br><br><br>',1.0,0),(23,25,29,0,'<p>Selecciona la opción que contenga las palabras (nexos) que le faltan al siguiente párrafo, para darle coherencia al texto:\nUn sistema biométrico construye un modelo con la información capturada _________ un modelo es una aproximación a la realidad.\nLas huellas dactilares de un individuo son únicas, _________ su registro biométrico podría coincidir con el de otra persona\n_________ a errores en la representación numérica de la información, por ejemplo. _________, cuando los sistemas de seguridad\nestán conectados a redes de cómputo se hace posible alterar la información por medio de programas dañinos, lo que vulnera la\nseguridad.<br></p>',1.0,0),(24,27,29,43,'<p>Elige la opción que integra las palabras que le faltan al siguiente enunciado:\n El profesor y padre _______________ con esmero matemáticas, pero Pedro y Juan no _______________ aprender. <br></p>',1.0,0);
/*!40000 ALTER TABLE `reactivo` ENABLE KEYS */;
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
