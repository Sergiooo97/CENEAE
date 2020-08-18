-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: ceneae
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `curp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` int NOT NULL,
  `grupo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiero_ser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ndolares` int NOT NULL,
  `nombres_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `escolaridad_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curp_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_tutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'01fgdfgd2A1920','Sergio','Eb','Gallegos',22,'1997-11-24','fgdfgd',2,'A','dfgfd','45','dfgdfg','dfgdg',30,'dfgdfg','dfgdg','dfgdgdfgdf','dfgdfg','dfgdg','dfgdg','dfgfd','2020-07-18 06:29:12','2020-07-18 06:29:12'),(2,'01EXGS971124H5A1920','Rafaekl','Gallegos','Eb',22,'1997-11-24','EXGS971124H',5,'A','CACALCHEN','97460','C16','ingeniero',30,'hola1','hola2','hola3','hola4','hola5','hola6','9911074558','2020-07-18 06:45:58','2020-07-18 06:45:58'),(3,'01EXGA952112H1A1920','Ana','Eb','Gallegos',24,'1995-12-21','EXGA952112H',1,'A','Cacalchén','97460','Calle 16#94x17y19','Doctora',0,'Sergio Rafael','Eb','Gallegos','Call 16#94x17y19','preparatoria','EXGS971124HYNBLR01','9911074558','2020-07-19 09:00:04','2020-07-19 09:00:04');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`SERGIOOO`@`localhost`*/ /*!50003 TRIGGER `insertar_ndolar_listas` AFTER INSERT ON `alumnos` FOR EACH ROW INSERT INTO ndolar_listas(matricula, nombres, grado, grupo, cantidad)
            VALUES(NEW.matricula, CONCAT(NEW.nombres, " ", NEW.apellido_paterno, " ",NEW.apellido_materno), NEW.grado, NEW.grupo, NEW.ndolares) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-18 23:48:59
