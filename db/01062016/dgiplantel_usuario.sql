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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idTipo` smallint(6) unsigned DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `otro` text,
  PRIMARY KEY (`idUsuario`),
  KEY `userTipo` (`idTipo`),
  CONSTRAINT `fkUsuarioTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipoUsuario` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'Hugo Luis Santiago Altamirano','hugooluisss','k0rgk0rg','A',NULL),(102,2,'OMAR GREGORIO SÁNCHEZ FUENTES','omar','omar','A','{\"sexo\":\"M\",\"identificador\":\"154\",\"plantel\":\"222\"}'),(103,3,'ELICEHT HERNANDEZ LOPEZ','15IB222264','HELE991226MOCRPL09','A','{\"sexo\":\"F\",\"identificador\":\"158\",\"plantel\":\"222\"}'),(104,3,'EVELIA ZAVALETA MENDEZ','15IB222265','ZAME990203MOCVNV07','A','{\"sexo\":\"F\",\"identificador\":\"159\",\"plantel\":\"222\"}'),(105,3,'ISABEL REMEDIOS GONZALEZ MARTINEZ','k0rgk0rg','k0rgk0rg','A','{\"sexo\":\"F\",\"identificador\":\"160\",\"plantel\":\"222\"}'),(106,3,'LAURA MORALES CRUZ','15IB222267','MOCL000218MOCRRR49','A','{\"sexo\":\"F\",\"identificador\":\"161\",\"plantel\":\"222\"}'),(107,3,'RUBEN DAVID MORALES MENDEZ','15IB222268','MOMR000827HOCRNB48','A','{\"sexo\":\"M\",\"identificador\":\"162\",\"plantel\":\"222\"}'),(108,3,'LIZBETH ROMERO ALVARADO','15IB222269','ROAL000302MOCMLZ40','A','{\"sexo\":\"F\",\"identificador\":\"163\",\"plantel\":\"222\"}'),(109,3,'FLOR DE LIZ PASCUAL SANCHEZ','15IB222270','PASF990831MOCSNL00','A','{\"sexo\":\"F\",\"identificador\":\"164\",\"plantel\":\"222\"}'),(110,3,'JOSE SANCHEZ PERALTA','15IB222271','SAPJ990620HOCNRS01','A','{\"sexo\":\"M\",\"identificador\":\"165\",\"plantel\":\"222\"}'),(111,3,'MAYTE GONZALEZ MARTINEZ','15IB222272','GOGM991018MOCNRY09','A','{\"sexo\":\"F\",\"identificador\":\"166\",\"plantel\":\"222\"}'),(112,3,'MONSERRAT PEREZ CORTES','15IB222273','PECM991222MOCRRN03','A','{\"sexo\":\"F\",\"identificador\":\"167\",\"plantel\":\"222\"}'),(113,3,'IREN CORTES CORTES','15IB222274','COCI000505HOCRRR48','A','{\"sexo\":\"F\",\"identificador\":\"168\",\"plantel\":\"222\"}'),(114,3,'BIBIANA ZAVALETA GARCíA','15IB222275','ZAGB000323MOCVRB43','A','{\"sexo\":\"F\",\"identificador\":\"169\",\"plantel\":\"222\"}'),(115,3,'ALI NOEL ZARATE GIJON','15IB222276','ZAGA981206HOCRJL06','A','{\"sexo\":\"M\",\"identificador\":\"170\",\"plantel\":\"222\"}'),(116,3,'FANY NOEMI GARCíA MARTINEZ','15IB222277','GAMF991110MOCRRN05','A','{\"sexo\":\"F\",\"identificador\":\"171\",\"plantel\":\"222\"}'),(117,3,'ELIZABETH GONZALEZ ROMERO','15IB222278','GORE000424MOCNML40','A','{\"sexo\":\"F\",\"identificador\":\"172\",\"plantel\":\"222\"}'),(118,3,'AARON BORJA MARTINEZ','15IB222279','BOMA001010HOCRRR44','A','{\"sexo\":\"M\",\"identificador\":\"173\",\"plantel\":\"222\"}'),(119,3,'MARCIAL MENDOZA ZARATE','15IB222280','MEZM990703HOCNRR09','A','{\"sexo\":\"M\",\"identificador\":\"174\",\"plantel\":\"222\"}'),(120,3,'LUZ DEL CARMEN ZARATE PEREZ','15IB222281','ZAPL000405MOCRRZ49','A','{\"sexo\":\"F\",\"identificador\":\"175\",\"plantel\":\"222\"}'),(121,3,'GONZALO VASQUEZ SANTOS','15IB222282','VASG991218HOCSNN02','A','{\"sexo\":\"M\",\"identificador\":\"176\",\"plantel\":\"222\"}'),(122,3,'LUZ MARíA PALACIO REYES','15IB222283','PARL981024MOCLYZ05','A','{\"sexo\":\"F\",\"identificador\":\"177\",\"plantel\":\"222\"}'),(123,3,'ELISEO CRUZ CRUZ','15IB222284','CUCE000228HOCRRL43','A','{\"sexo\":\"M\",\"identificador\":\"178\",\"plantel\":\"222\"}'),(124,3,'JONATHAN MENDEZ SáNCHEZ','15IB222285','MESJ991019HOCNNN02','A','{\"sexo\":\"M\",\"identificador\":\"179\",\"plantel\":\"222\"}'),(125,3,'CONCEPCIóN JUQUILA RUIZ CRUZ','15IB222286','RUCC001208MOCZRN47','A','{\"sexo\":\"F\",\"identificador\":\"180\",\"plantel\":\"222\"}'),(126,3,'DALIA DANIELA SáNCHEZ MENDEZ','15IB222287','SAMD981121MOCNNL06','A','{\"sexo\":\"F\",\"identificador\":\"181\",\"plantel\":\"222\"}'),(127,3,'ABIGAIL CRUZ GASPAR','15IB222288','CUGA000331MOCRSB47','A','{\"sexo\":\"F\",\"identificador\":\"182\",\"plantel\":\"222\"}'),(128,3,'JESUS EDUARDO HERNANDEZ RAMIREZ','15IB052414','HERJ001205HMCRMSA7','A','{\"sexo\":\"M\",\"identificador\":\"199\",\"plantel\":\"52\"}'),(129,3,'ISHBEL HUESCA LOPEZ','15IB052415','k0rgk0rg','A','{\"sexo\":\"F\",\"identificador\":\"200\",\"plantel\":\"52\"}'),(130,3,'IVAN SANCHEZ GARCIA','15IB052416','SAGI990728HOCNRV04','A','{\"sexo\":\"M\",\"identificador\":\"201\",\"plantel\":\"52\"}'),(131,3,'INACOOL SAENZ AQUINO','15IB052417','SAAI000727MOCNQNA3','A','{\"sexo\":\"F\",\"identificador\":\"202\",\"plantel\":\"52\"}'),(132,3,'MAYRA SANTIAGO SANCHEZ','15IB052418','SASM000812MOCNNYA3','A','{\"sexo\":\"F\",\"identificador\":\"203\",\"plantel\":\"52\"}'),(133,3,'FERNANDO GARCIA MARTINEZ','15IB052419','GAMF000316HOCRRRA9','A','{\"sexo\":\"M\",\"identificador\":\"204\",\"plantel\":\"52\"}'),(134,3,'ALVARO SANCHEZ SANCHEZ','15IB052420','SASA000128HOCNNLA8','A','{\"sexo\":\"M\",\"identificador\":\"205\",\"plantel\":\"52\"}'),(135,3,'MANUEL NUÑEZ HERNANDEZ','15IB052421','NUHM000911HOCXRNA5','A','{\"sexo\":\"M\",\"identificador\":\"206\",\"plantel\":\"52\"}'),(136,3,'DANIELA NUÑEZ HERNANDEZ','15IB052422','NUHD000807MMCXRNA8','A','{\"sexo\":\"F\",\"identificador\":\"207\",\"plantel\":\"52\"}'),(137,3,'MELISSA PEREZ GONZALEZ','15IB052423','PEGM991020MNERNL07','A','{\"sexo\":\"F\",\"identificador\":\"208\",\"plantel\":\"52\"}'),(138,3,'RENATO HERNANDEZ SANCHEZ','15IB052424','HESR991124HOCRNN06','A','{\"sexo\":\"M\",\"identificador\":\"209\",\"plantel\":\"52\"}'),(139,3,'FERNANDO GARCIA BLANCO','15IB052425','GABF000303HOCRLRA0','A','{\"sexo\":\"M\",\"identificador\":\"210\",\"plantel\":\"52\"}'),(140,3,'ADAIR BRUNO ARMENGOLT','15IB052426','BUAA991203HOCRRD07','A','{\"sexo\":\"M\",\"identificador\":\"211\",\"plantel\":\"52\"}'),(141,3,'NOE NUÑEZ GUZMAN','15IB052427','NUGN000915HOCXZXA5','A','{\"sexo\":\"M\",\"identificador\":\"212\",\"plantel\":\"52\"}'),(142,3,'IRVIN HERRERA ','15IB052428','HEXI000427HNERXRA4','A','{\"sexo\":\"M\",\"identificador\":\"213\",\"plantel\":\"52\"}'),(143,3,'FAUSTINO VASQUEZ MENDOZA','15IB052429','VAMF000215HOCSNSA3','A','{\"sexo\":\"M\",\"identificador\":\"214\",\"plantel\":\"52\"}'),(144,3,'MONICA GARCIA GARCIA','15IB052430','GAGM000702MOCRRNA7','A','{\"sexo\":\"F\",\"identificador\":\"215\",\"plantel\":\"52\"}'),(145,3,'IRVING GUZMAN SANDOVAL','15IB052431','GUSI990110HOCZNR08','A','{\"sexo\":\"M\",\"identificador\":\"216\",\"plantel\":\"52\"}'),(146,3,'LISBETH CRUZ MONTESINOS','15IB052432','CRML021520MOCNRF08','A','{\"sexo\":\"F\",\"identificador\":\"217\",\"plantel\":\"52\"}'),(147,3,'FERNANDA GARCIA JIMENEZ','15IB052433','GAJF000120MMCRMRA8','A','{\"sexo\":\"F\",\"identificador\":\"218\",\"plantel\":\"52\"}'),(148,3,'MARIBEL GARCIA ORTIZ','15IB052434','GAOM000510MOCRRRA8','A','{\"sexo\":\"F\",\"identificador\":\"219\",\"plantel\":\"52\"}'),(149,3,'JAIR SANCHEZ SANTIAGO','15IB052435','SASJ991126HOCNNR05','A','{\"sexo\":\"M\",\"identificador\":\"220\",\"plantel\":\"52\"}'),(150,3,'JUANA SANTIAGO GONZALEZ','15IB052436','SAGJ000815MOCNNNA5','A','{\"sexo\":\"F\",\"identificador\":\"221\",\"plantel\":\"52\"}'),(151,3,'RICARDO SANTIAGO CORTES','15IB052437','SACR000206HOCNRCA4','A','{\"sexo\":\"M\",\"identificador\":\"222\",\"plantel\":\"52\"}'),(152,3,'EDITH CORTEZ CRUZ','15IB052438','COCE000822MOCRRDA7','A','{\"sexo\":\"F\",\"identificador\":\"223\",\"plantel\":\"52\"}'),(153,3,'ENEIDA SANCHEZ JIMENEZ','16IB052439','SAJE980904MOCNMN04','A','{\"sexo\":\"F\",\"identificador\":\"224\",\"plantel\":\"52\"}');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-01 11:44:52
