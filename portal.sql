-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: portal
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `Blind`
--

DROP TABLE IF EXISTS `Blind`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Blind` (
  `id` int(11) DEFAULT NULL,
  `roll` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `flag_paired` int(11) DEFAULT NULL,
  PRIMARY KEY (`roll`),
  KEY `id` (`id`),
  KEY `username` (`username`),
  CONSTRAINT `Blind_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Exam` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Blind_ibfk_2` FOREIGN KEY (`username`) REFERENCES `School` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Blind`
--

LOCK TABLES `Blind` WRITE;
/*!40000 ALTER TABLE `Blind` DISABLE KEYS */;
INSERT INTO `Blind` VALUES (15,3168,'Litesh','pict',0),(15,3180,'Rajat','pict',0),(15,3182,'Adeep','pict',0);
/*!40000 ALTER TABLE `Blind` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Exam`
--

DROP TABLE IF EXISTS `Exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Exam` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `flag_full` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `duration` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `Exam_ibfk_1` FOREIGN KEY (`username`) REFERENCES `School` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Exam`
--

LOCK TABLES `Exam` WRITE;
/*!40000 ALTER TABLE `Exam` DISABLE KEYS */;
INSERT INTO `Exam` VALUES (15,'2018-06-13','mit',0,'offline mcq','10:00:00',5),(161,'2018-09-18','pict',NULL,'Offline MCQ','11:00:00',6),(858,'2018-09-18','pict',NULL,'Offline MCQ','11:00:00',6),(2223,'2018-09-03','pict',NULL,'Offline MCQ','15:00:00',5),(6521,'2018-09-19','pict',NULL,'Online MCQ','00:00:02',2),(10564,'2018-09-11','pict',NULL,'Theory','16:00:30',2),(13967,'2018-09-18','pict',NULL,'Offline MCQ','11:00:00',6),(14556,'2018-09-04','pict',NULL,'Online MCQ','15:00:00',2),(19056,'2018-09-04','pict',NULL,'Theory','15:00:00',3),(30286,'2018-09-18','pict',NULL,'Offline MCQ','11:00:00',6),(33043,'2018-09-18','pict',NULL,'Offline MCQ','11:00:00',6),(35881,'2018-09-25','pict',NULL,'Theory','15:00:00',2);
/*!40000 ALTER TABLE `Exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pair`
--

DROP TABLE IF EXISTS `Pair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pair` (
  `username` varchar(20) DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  KEY `username` (`username`),
  KEY `roll` (`roll`),
  KEY `id` (`id`),
  CONSTRAINT `Pair_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Volunteer` (`username`) ON DELETE CASCADE,
  CONSTRAINT `Pair_ibfk_2` FOREIGN KEY (`roll`) REFERENCES `Blind` (`roll`) ON DELETE CASCADE,
  CONSTRAINT `Pair_ibfk_3` FOREIGN KEY (`id`) REFERENCES `Exam` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pair`
--

LOCK TABLES `Pair` WRITE;
/*!40000 ALTER TABLE `Pair` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `School`
--

DROP TABLE IF EXISTS `School`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `School` (
  `username` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `School`
--

LOCK TABLES `School` WRITE;
/*!40000 ALTER TABLE `School` DISABLE KEYS */;
INSERT INTO `School` VALUES ('mit','pict','sdfg@gf.vd','123','sdef','SFZdx',62),('naru','narayandas chanchadiya Jr college','naroo@female.com','147963','falana dhimaka','Bijapoor',84465465),('pict','pict','pict@gmail.com','pune','12345','Pune',9423915532),('pradnya','philomena','stphilomena@gmail.com','1234','wderg','pune',2532469811);
/*!40000 ALTER TABLE `School` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Volunteer`
--

DROP TABLE IF EXISTS `Volunteer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Volunteer` (
  `username` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `college` varchar(60) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Volunteer`
--

LOCK TABLES `Volunteer` WRITE;
/*!40000 ALTER TABLE `Volunteer` DISABLE KEYS */;
INSERT INTO `Volunteer` VALUES ('','','','','','',9876543210),('abcd123','abcd','abcd@gmail.com','123','mit','pune',9876543210),('g','hyyt','fghjk@fdsg.gdfg','hytgrf','lijkh','kjhm',9876543210),('ghjks','bkdjshsk','djdhk@sj.cdsk','bdsjs','csbjbfk','bksk',9876543210),('lit','litesh','liteshpzambare@gmail.com','12345','PICT','Pune',444555666),('litz','gh','gesfvr@gmsil.cdgcj','gh','hb','ghj',9876543210);
/*!40000 ALTER TABLE `Volunteer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-09 14:15:30
