-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.163.201    Database: copyleftlicense
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `Assignment`
--

DROP TABLE IF EXISTS `Assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Parentid` int(11) NOT NULL DEFAULT '0',
  `Childid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Parentid` (`Parentid`),
  KEY `Childid` (`Childid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assignment`
--

LOCK TABLES `Assignment` WRITE;
/*!40000 ALTER TABLE `Assignment` DISABLE KEYS */;
INSERT INTO `Assignment` VALUES (1,1,0,'2017-05-06 08:48:28','2017-05-06 08:48:28'),(2,1,2,'2017-05-06 13:22:56','2017-05-06 13:22:56'),(3,1,3,'2017-05-06 13:31:13','2017-05-06 13:31:13'),(4,3,4,'2017-05-06 14:09:19','2017-05-06 14:09:19'),(5,2,5,'2017-05-06 14:10:47','2017-05-06 14:10:47'),(6,5,6,'2017-05-06 14:18:32','2017-05-06 14:18:32'),(7,2,7,'2017-05-06 14:19:11','2017-05-06 14:19:11'),(8,2,8,'2017-05-06 14:23:25','2017-05-06 14:23:25'),(9,2,9,'2017-05-06 14:24:19','2017-05-06 14:24:19'),(10,2,10,'2017-05-06 14:25:01','2017-05-06 14:25:01'),(11,2,11,'2017-05-06 14:25:37','2017-05-06 14:25:37'),(12,3,12,'2017-05-06 14:55:14','2017-05-06 14:55:14'),(13,2,13,'2017-05-06 14:55:24','2017-05-06 14:55:24'),(14,3,14,'2017-05-06 14:57:25','2017-05-06 14:57:25'),(15,2,15,'2017-05-06 14:58:06','2017-05-06 14:58:06'),(16,3,16,'2017-05-06 14:59:36','2017-05-06 14:59:36'),(17,2,17,'2017-05-06 14:59:55','2017-05-06 14:59:55'),(18,2,18,'2017-05-06 15:01:33','2017-05-06 15:01:33'),(19,2,19,'2017-05-06 15:02:55','2017-05-06 15:02:55'),(20,3,20,'2017-05-06 15:04:41','2017-05-06 15:04:41'),(21,2,21,'2017-05-06 15:04:59','2017-05-06 15:04:59'),(22,2,22,'2017-05-06 15:05:27','2017-05-06 15:05:27'),(23,3,23,'2017-05-06 15:06:43','2017-05-06 15:06:43'),(24,2,24,'2017-05-06 15:06:59','2017-05-06 15:06:59'),(25,3,25,'2017-05-06 15:10:14','2017-05-06 15:10:14'),(26,2,26,'2017-05-06 15:11:53','2017-05-06 15:11:53'),(27,3,27,'2017-05-06 15:13:02','2017-05-06 15:13:02'),(28,2,28,'2017-05-06 15:13:23','2017-05-06 15:13:23'),(29,3,29,'2017-05-06 15:13:56','2017-05-06 15:13:56'),(30,2,30,'2017-05-06 15:15:11','2017-05-06 15:15:11'),(31,3,31,'2017-05-06 15:17:08','2017-05-06 15:17:08'),(32,2,32,'2017-05-06 15:17:48','2017-05-06 15:17:48'),(33,3,33,'2017-05-06 15:33:34','2017-05-06 15:33:34'),(34,2,34,'2017-05-06 15:34:27','2017-05-06 15:34:27'),(35,2,35,'2017-05-06 15:35:06','2017-05-06 15:35:06'),(36,2,36,'2017-05-06 15:36:21','2017-05-06 15:36:21'),(37,3,37,'2017-05-06 15:37:13','2017-05-06 15:37:13'),(38,36,38,'2017-05-06 15:37:54','2017-05-06 15:37:54'),(39,36,39,'2017-05-06 15:39:31','2017-05-06 15:39:31'),(40,2,40,'2017-05-06 15:42:52','2017-05-06 15:42:52'),(41,2,41,'2017-05-06 15:43:17','2017-05-06 15:43:17'),(42,2,42,'2017-05-06 15:45:53','2017-05-06 15:45:53'),(43,2,43,'2017-05-06 15:47:53','2017-05-06 15:47:53'),(44,2,44,'2017-05-06 15:48:43','2017-05-06 15:48:43'),(45,3,45,'2017-05-06 15:49:27','2017-05-06 15:49:27'),(46,2,46,'2017-05-06 15:49:42','2017-05-06 15:49:42'),(47,3,47,'2017-05-06 15:52:10','2017-05-06 15:52:10'),(48,2,48,'2017-05-06 15:52:46','2017-05-06 15:52:46'),(49,2,49,'2017-05-06 16:07:37','2017-05-06 16:07:37'),(50,2,50,'2017-05-06 16:08:22','2017-05-06 16:08:22'),(51,3,51,'2017-05-06 16:09:12','2017-05-06 16:09:12'),(52,2,52,'2017-05-06 16:09:50','2017-05-06 16:09:50'),(53,3,53,'2017-05-06 16:11:05','2017-05-06 16:11:05'),(54,2,54,'2017-05-06 16:11:16','2017-05-06 16:11:16'),(55,3,55,'2017-05-06 16:12:25','2017-05-06 16:12:25'),(56,2,56,'2017-05-06 16:13:59','2017-05-06 16:13:59'),(57,2,57,'2017-05-06 16:14:51','2017-05-06 16:14:51'),(58,3,58,'2017-05-06 16:20:34','2017-05-06 16:20:34'),(59,2,59,'2017-05-06 16:21:58','2017-05-06 16:21:58'),(60,2,60,'2017-05-06 16:22:54','2017-05-06 16:22:54'),(61,3,61,'2017-05-06 16:23:22','2017-05-06 16:23:22'),(62,2,62,'2017-05-06 16:23:58','2017-05-06 16:23:58'),(63,3,63,'2017-05-06 16:26:24','2017-05-06 16:26:24'),(64,2,64,'2017-05-06 16:27:45','2017-05-06 16:27:45'),(65,3,65,'2017-05-06 16:29:07','2017-05-06 16:29:07'),(66,2,66,'2017-05-06 16:30:01','2017-05-06 16:30:01'),(67,3,67,'2017-05-06 16:31:01','2017-05-06 16:31:01'),(68,2,68,'2017-05-06 16:31:36','2017-05-06 16:31:36'),(69,2,69,'2017-05-06 16:36:18','2017-05-06 16:36:18'),(70,2,70,'2017-05-06 16:37:31','2017-05-06 16:37:31'),(71,2,71,'2017-05-06 16:38:15','2017-05-06 16:38:15'),(72,3,72,'2017-05-06 16:38:53','2017-05-06 16:38:53'),(73,2,73,'2017-05-06 16:40:31','2017-05-06 16:40:31'),(74,2,74,'2017-05-06 16:53:53','2017-05-06 16:53:53'),(75,3,75,'2017-05-06 16:55:42','2017-05-06 16:55:42'),(76,2,76,'2017-05-06 16:56:17','2017-05-06 16:56:17'),(77,3,77,'2017-05-06 16:57:31','2017-05-06 16:57:31'),(78,2,78,'2017-05-06 16:59:13','2017-05-06 16:59:13'),(79,3,79,'2017-05-06 17:00:03','2017-05-06 17:00:03'),(80,2,80,'2017-05-06 17:00:59','2017-05-06 17:00:59'),(81,3,81,'2017-05-06 17:02:52','2017-05-06 17:02:52'),(82,2,82,'2017-05-06 17:03:55','2017-05-06 17:03:55'),(83,3,83,'2017-05-06 17:04:58','2017-05-06 17:04:58'),(84,2,84,'2017-05-06 17:06:24','2017-05-06 17:06:24'),(85,3,85,'2017-05-06 17:06:52','2017-05-06 17:06:52'),(86,2,86,'2017-05-06 17:07:37','2017-05-06 17:07:37'),(87,3,87,'2017-05-06 17:09:48','2017-05-06 17:09:48'),(88,2,88,'2017-05-06 17:10:18','2017-05-06 17:10:18'),(89,3,89,'2017-05-06 17:12:36','2017-05-06 17:12:36'),(90,88,90,'2017-05-06 17:13:14','2017-05-06 17:13:14'),(91,3,91,'2017-05-06 17:14:44','2017-05-06 17:14:44'),(92,88,92,'2017-05-06 17:16:15','2017-05-06 17:16:15'),(93,3,93,'2017-05-06 17:17:48','2017-05-06 17:17:48'),(94,88,94,'2017-05-06 17:18:33','2017-05-06 17:18:33'),(95,88,95,'2017-05-06 17:19:44','2017-05-06 17:19:44'),(96,3,96,'2017-05-06 17:23:22','2017-05-06 17:23:22'),(97,88,97,'2017-05-06 17:24:12','2017-05-06 17:24:12'),(98,3,98,'2017-05-06 17:25:35','2017-05-06 17:25:35'),(99,88,99,'2017-05-06 17:26:14','2017-05-06 17:26:14'),(100,88,100,'2017-05-06 17:32:54','2017-05-06 17:32:54');
/*!40000 ALTER TABLE `Assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AssociatedRecordStats`
--

DROP TABLE IF EXISTS `AssociatedRecordStats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AssociatedRecordStats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AssociatedRecordCount` int(11) NOT NULL DEFAULT '0',
  `AssociatedWordCount` int(11) NOT NULL DEFAULT '0',
  `AssociatedCharacterCount` int(11) NOT NULL DEFAULT '0',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AssociatedRecordStats`
--

LOCK TABLES `AssociatedRecordStats` WRITE;
/*!40000 ALTER TABLE `AssociatedRecordStats` DISABLE KEYS */;
INSERT INTO `AssociatedRecordStats` VALUES (1,1,667,4424,4,'2017-05-06 14:11:23','2017-05-06 14:11:23'),(2,1,48,479,23,'2017-05-06 15:07:49','2017-05-06 15:07:49'),(3,1,1985,12868,27,'2017-05-06 15:13:47','2017-05-06 15:13:47'),(4,2,2107,16625,20,'2017-05-06 16:46:25','2017-05-06 16:46:25'),(5,3,3322,22061,47,'2017-05-06 16:46:32','2017-05-06 16:46:32'),(6,1,6983,53982,14,'2017-05-06 16:46:37','2017-05-06 16:46:37'),(7,5,8320,57460,33,'2017-05-06 16:46:40','2017-05-06 16:46:40'),(8,1,357,2369,12,'2017-05-06 16:46:47','2017-05-06 16:46:47');
/*!40000 ALTER TABLE `AssociatedRecordStats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Association`
--

DROP TABLE IF EXISTS `Association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Association` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `ChosenEntryid` int(11) NOT NULL DEFAULT '0',
  `Type` varchar(255) NOT NULL DEFAULT '',
  `SubType` varchar(255) NOT NULL DEFAULT '',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Type` (`Type`),
  KEY `SubType` (`SubType`),
  KEY `Entryid` (`Entryid`),
  KEY `ChosenEntryid` (`ChosenEntryid`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Association`
--

LOCK TABLES `Association` WRITE;
/*!40000 ALTER TABLE `Association` DISABLE KEYS */;
INSERT INTO `Association` VALUES (1,5,4,'Role','Author','2017-05-06 14:10:47','2017-05-06 14:32:15'),(3,7,4,'Role','Author','2017-05-06 14:19:11','2017-05-06 14:32:18'),(4,8,4,'Role','Author','2017-05-06 14:23:25','2017-05-06 14:31:46'),(5,9,4,'Role','Author','2017-05-06 14:24:19','2017-05-06 14:32:21'),(6,10,4,'Role','Author','2017-05-06 14:25:01','2017-05-06 14:32:29'),(7,11,4,'Role','Author','2017-05-06 14:25:37','2017-05-06 14:32:24'),(8,13,12,'Role','Author','2017-05-06 14:55:24','2017-05-06 14:55:54'),(9,15,14,'Role','Author','2017-05-06 14:58:06','2017-05-06 14:58:30'),(10,17,16,'Role','Author','2017-05-06 14:59:55','2017-05-06 14:59:55'),(11,18,16,'Role','Author','2017-05-06 15:01:33','2017-05-06 15:01:33'),(12,19,16,'Role','Author','2017-05-06 15:02:55','2017-05-06 15:02:55'),(13,21,20,'Role','Author','2017-05-06 15:04:59','2017-05-06 15:04:59'),(14,22,20,'Role','Author','2017-05-06 15:05:27','2017-05-06 15:05:27'),(15,24,23,'Role','Author','2017-05-06 15:06:59','2017-05-06 15:07:40'),(16,26,25,'Role','Author','2017-05-06 15:11:53','2017-05-06 15:11:53'),(17,28,27,'Role','Author','2017-05-06 15:13:23','2017-05-06 15:13:23'),(18,30,29,'Role','Author','2017-05-06 15:15:11','2017-05-06 15:15:11'),(19,32,31,'Role','Author','2017-05-06 15:17:48','2017-05-06 15:18:21'),(20,34,33,'Role','Author','2017-05-06 15:34:27','2017-05-06 15:34:27'),(21,35,33,'','Author','2017-05-06 15:35:06','2017-05-06 15:35:06'),(22,36,33,'Role','Author','2017-05-06 15:36:44','2017-05-06 15:36:44'),(23,38,37,'Role','Author','2017-05-06 15:37:54','2017-05-06 15:37:54'),(24,39,37,'Role','Author','2017-05-06 15:39:31','2017-05-06 15:39:31'),(25,40,37,'Role','Author','2017-05-06 15:42:52','2017-05-06 15:42:52'),(26,41,37,'Role','Author','2017-05-06 15:43:17','2017-05-06 15:43:17'),(27,42,37,'Role','Author','2017-05-06 15:45:53','2017-05-06 15:45:53'),(28,43,37,'Role','Author','2017-05-06 15:47:53','2017-05-06 15:47:53'),(29,44,37,'Role','Author','2017-05-06 15:48:43','2017-05-06 15:48:43'),(30,46,45,'Role','Author','2017-05-06 15:49:42','2017-05-06 15:49:42'),(31,48,47,'Role','Author','2017-05-06 15:52:46','2017-05-06 15:52:46'),(32,49,47,'Role','Author','2017-05-06 16:07:37','2017-05-06 16:07:37'),(33,50,47,'Role','Author','2017-05-06 16:08:22','2017-05-06 16:08:22'),(34,52,51,'Role','Author','2017-05-06 16:09:50','2017-05-06 16:09:50'),(35,54,53,'Role','Author','2017-05-06 16:11:16','2017-05-06 16:11:16'),(36,56,55,'Role','Author','2017-05-06 16:13:58','2017-05-06 16:18:21'),(37,57,55,'Role','Author','2017-05-06 16:14:51','2017-05-06 16:14:51'),(38,59,58,'Role','Author','2017-05-06 16:21:58','2017-05-06 16:21:58'),(39,60,58,'Role','Author','2017-05-06 16:22:54','2017-05-06 16:22:54'),(40,62,61,'Role','Author','2017-05-06 16:23:58','2017-05-06 16:23:58'),(41,64,63,'Role','Author','2017-05-06 16:27:45','2017-05-06 16:27:45'),(42,66,65,'Role','Author','2017-05-06 16:30:01','2017-05-06 16:30:01'),(43,68,67,'Role','Author','2017-05-06 16:31:36','2017-05-06 16:31:36'),(44,69,67,'Role','Author','2017-05-06 16:36:18','2017-05-06 16:36:18'),(45,70,67,'Role','Author','2017-05-06 16:37:31','2017-05-06 16:37:31'),(46,71,67,'Role','Author','2017-05-06 16:38:15','2017-05-06 16:38:15'),(47,73,72,'Role','Author','2017-05-06 16:40:31','2017-05-06 16:40:31'),(48,74,72,'Role','Author','2017-05-06 16:53:53','2017-05-06 16:53:53'),(49,76,75,'Role','Author','2017-05-06 16:56:17','2017-05-06 16:56:17'),(50,78,77,'Role','Author','2017-05-06 16:59:13','2017-05-06 16:59:13'),(51,80,79,'Role','Author','2017-05-06 17:00:59','2017-05-06 17:00:59'),(52,82,82,'Role','Author','2017-05-06 17:03:55','2017-05-06 17:03:55'),(53,84,83,'Role','Author','2017-05-06 17:06:24','2017-05-06 17:06:24'),(54,86,85,'Role','Author','2017-05-06 17:07:37','2017-05-06 17:07:37'),(55,88,87,'Role','Author','2017-05-06 17:10:18','2017-05-06 17:11:05'),(56,90,89,'Role','Author','2017-05-06 17:13:14','2017-05-06 17:13:14'),(57,92,91,'Role','Author','2017-05-06 17:16:15','2017-05-06 17:16:15'),(58,94,93,'Role','Author','2017-05-06 17:18:33','2017-05-06 17:18:33'),(59,95,93,'Role','Author','2017-05-06 17:19:44','2017-05-06 17:19:44'),(60,97,96,'Role','Author','2017-05-06 17:24:12','2017-05-06 17:24:12'),(61,99,98,'Role','Author','2017-05-06 17:26:14','2017-05-06 17:26:14'),(62,100,98,'Role','Author','2017-05-06 17:32:54','2017-05-06 17:32:54');
/*!40000 ALTER TABLE `Association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AvailabilityDateRange`
--

DROP TABLE IF EXISTS `AvailabilityDateRange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AvailabilityDateRange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AvailabilityStart` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `AvailabilityEnd` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `AvailabilityStart` (`AvailabilityStart`),
  KEY `AvailabilityEnd` (`AvailabilityEnd`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AvailabilityDateRange`
--

LOCK TABLES `AvailabilityDateRange` WRITE;
/*!40000 ALTER TABLE `AvailabilityDateRange` DISABLE KEYS */;
INSERT INTO `AvailabilityDateRange` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'2017-05-06 08:48:28','2017-05-06 08:48:28'),(4,'0000-00-00 00:00:00','0000-00-00 00:00:00',4,'2017-05-06 14:09:19','2017-05-06 14:09:19'),(6,'0000-00-00 00:00:00','0000-00-00 00:00:00',6,'2017-05-06 14:18:32','2017-05-06 14:18:32'),(12,'0000-00-00 00:00:00','0000-00-00 00:00:00',5,'2017-05-06 14:32:15','2017-05-06 14:32:15'),(13,'0000-00-00 00:00:00','0000-00-00 00:00:00',7,'2017-05-06 14:32:18','2017-05-06 14:32:18'),(14,'0000-00-00 00:00:00','0000-00-00 00:00:00',12,'2017-05-06 14:55:14','2017-05-06 14:55:14'),(16,'0000-00-00 00:00:00','0000-00-00 00:00:00',14,'2017-05-06 14:57:25','2017-05-06 14:57:25'),(18,'0000-00-00 00:00:00','0000-00-00 00:00:00',16,'2017-05-06 14:59:36','2017-05-06 14:59:36'),(19,'0000-00-00 00:00:00','0000-00-00 00:00:00',17,'2017-05-06 14:59:55','2017-05-06 14:59:55'),(20,'0000-00-00 00:00:00','0000-00-00 00:00:00',18,'2017-05-06 15:01:33','2017-05-06 15:01:33'),(21,'0000-00-00 00:00:00','0000-00-00 00:00:00',19,'2017-05-06 15:02:54','2017-05-06 15:02:54'),(22,'0000-00-00 00:00:00','0000-00-00 00:00:00',20,'2017-05-06 15:04:41','2017-05-06 15:04:41'),(23,'0000-00-00 00:00:00','0000-00-00 00:00:00',21,'2017-05-06 15:04:59','2017-05-06 15:04:59'),(24,'0000-00-00 00:00:00','0000-00-00 00:00:00',22,'2017-05-06 15:05:27','2017-05-06 15:05:27'),(25,'0000-00-00 00:00:00','0000-00-00 00:00:00',23,'2017-05-06 15:06:43','2017-05-06 15:06:43'),(27,'0000-00-00 00:00:00','0000-00-00 00:00:00',25,'2017-05-06 15:10:14','2017-05-06 15:10:14'),(28,'0000-00-00 00:00:00','0000-00-00 00:00:00',26,'2017-05-06 15:11:53','2017-05-06 15:11:53'),(29,'0000-00-00 00:00:00','0000-00-00 00:00:00',27,'2017-05-06 15:13:02','2017-05-06 15:13:02'),(30,'0000-00-00 00:00:00','0000-00-00 00:00:00',28,'2017-05-06 15:13:23','2017-05-06 15:13:23'),(31,'0000-00-00 00:00:00','0000-00-00 00:00:00',29,'2017-05-06 15:13:56','2017-05-06 15:13:56'),(32,'0000-00-00 00:00:00','0000-00-00 00:00:00',30,'2017-05-06 15:15:11','2017-05-06 15:15:11'),(33,'0000-00-00 00:00:00','0000-00-00 00:00:00',31,'2017-05-06 15:17:08','2017-05-06 15:17:08'),(35,'0000-00-00 00:00:00','0000-00-00 00:00:00',32,'2017-05-06 15:18:21','2017-05-06 15:18:21'),(36,'0000-00-00 00:00:00','0000-00-00 00:00:00',33,'2017-05-06 15:33:34','2017-05-06 15:33:34'),(37,'0000-00-00 00:00:00','0000-00-00 00:00:00',34,'2017-05-06 15:34:27','2017-05-06 15:34:27'),(38,'0000-00-00 00:00:00','0000-00-00 00:00:00',35,'2017-05-06 15:35:06','2017-05-06 15:35:06'),(40,'0000-00-00 00:00:00','0000-00-00 00:00:00',37,'2017-05-06 15:37:13','2017-05-06 15:37:13'),(41,'0000-00-00 00:00:00','0000-00-00 00:00:00',38,'2017-05-06 15:37:54','2017-05-06 15:37:54'),(42,'0000-00-00 00:00:00','0000-00-00 00:00:00',39,'2017-05-06 15:39:31','2017-05-06 15:39:31'),(43,'0000-00-00 00:00:00','0000-00-00 00:00:00',40,'2017-05-06 15:42:52','2017-05-06 15:42:52'),(44,'0000-00-00 00:00:00','0000-00-00 00:00:00',41,'2017-05-06 15:43:17','2017-05-06 15:43:17'),(45,'0000-00-00 00:00:00','0000-00-00 00:00:00',42,'2017-05-06 15:45:53','2017-05-06 15:45:53'),(46,'0000-00-00 00:00:00','0000-00-00 00:00:00',43,'2017-05-06 15:47:53','2017-05-06 15:47:53'),(47,'0000-00-00 00:00:00','0000-00-00 00:00:00',44,'2017-05-06 15:48:43','2017-05-06 15:48:43'),(48,'0000-00-00 00:00:00','0000-00-00 00:00:00',45,'2017-05-06 15:49:27','2017-05-06 15:49:27'),(49,'0000-00-00 00:00:00','0000-00-00 00:00:00',46,'2017-05-06 15:49:42','2017-05-06 15:49:42'),(50,'0000-00-00 00:00:00','0000-00-00 00:00:00',47,'2017-05-06 15:52:09','2017-05-06 15:52:09'),(51,'0000-00-00 00:00:00','0000-00-00 00:00:00',48,'2017-05-06 15:52:46','2017-05-06 15:52:46'),(52,'0000-00-00 00:00:00','0000-00-00 00:00:00',49,'2017-05-06 16:07:37','2017-05-06 16:07:37'),(53,'0000-00-00 00:00:00','0000-00-00 00:00:00',50,'2017-05-06 16:08:22','2017-05-06 16:08:22'),(54,'0000-00-00 00:00:00','0000-00-00 00:00:00',51,'2017-05-06 16:09:12','2017-05-06 16:09:12'),(55,'0000-00-00 00:00:00','0000-00-00 00:00:00',52,'2017-05-06 16:09:50','2017-05-06 16:09:50'),(56,'0000-00-00 00:00:00','0000-00-00 00:00:00',53,'2017-05-06 16:11:05','2017-05-06 16:11:05'),(57,'0000-00-00 00:00:00','0000-00-00 00:00:00',54,'2017-05-06 16:11:16','2017-05-06 16:11:16'),(58,'0000-00-00 00:00:00','0000-00-00 00:00:00',55,'2017-05-06 16:12:25','2017-05-06 16:12:25'),(60,'0000-00-00 00:00:00','0000-00-00 00:00:00',57,'2017-05-06 16:14:51','2017-05-06 16:14:51'),(61,'0000-00-00 00:00:00','0000-00-00 00:00:00',58,'2017-05-06 16:20:34','2017-05-06 16:20:34'),(62,'0000-00-00 00:00:00','0000-00-00 00:00:00',59,'2017-05-06 16:21:58','2017-05-06 16:21:58'),(63,'0000-00-00 00:00:00','0000-00-00 00:00:00',60,'2017-05-06 16:22:54','2017-05-06 16:22:54'),(64,'0000-00-00 00:00:00','0000-00-00 00:00:00',61,'2017-05-06 16:23:22','2017-05-06 16:23:22'),(65,'0000-00-00 00:00:00','0000-00-00 00:00:00',62,'2017-05-06 16:23:58','2017-05-06 16:23:58'),(66,'0000-00-00 00:00:00','0000-00-00 00:00:00',63,'2017-05-06 16:26:24','2017-05-06 16:26:24'),(67,'0000-00-00 00:00:00','0000-00-00 00:00:00',64,'2017-05-06 16:27:45','2017-05-06 16:27:45'),(68,'0000-00-00 00:00:00','0000-00-00 00:00:00',65,'2017-05-06 16:29:07','2017-05-06 16:29:07'),(69,'0000-00-00 00:00:00','0000-00-00 00:00:00',66,'2017-05-06 16:30:01','2017-05-06 16:30:01'),(70,'0000-00-00 00:00:00','0000-00-00 00:00:00',67,'2017-05-06 16:31:01','2017-05-06 16:31:01'),(71,'0000-00-00 00:00:00','0000-00-00 00:00:00',68,'2017-05-06 16:31:36','2017-05-06 16:31:36'),(72,'0000-00-00 00:00:00','0000-00-00 00:00:00',69,'2017-05-06 16:36:18','2017-05-06 16:36:18'),(73,'0000-00-00 00:00:00','0000-00-00 00:00:00',70,'2017-05-06 16:37:31','2017-05-06 16:37:31'),(74,'0000-00-00 00:00:00','0000-00-00 00:00:00',71,'2017-05-06 16:38:15','2017-05-06 16:38:15'),(75,'0000-00-00 00:00:00','0000-00-00 00:00:00',72,'2017-05-06 16:38:53','2017-05-06 16:38:53'),(76,'0000-00-00 00:00:00','0000-00-00 00:00:00',73,'2017-05-06 16:40:31','2017-05-06 16:40:31'),(77,'0000-00-00 00:00:00','0000-00-00 00:00:00',74,'2017-05-06 16:53:53','2017-05-06 16:53:53'),(78,'0000-00-00 00:00:00','0000-00-00 00:00:00',75,'2017-05-06 16:55:42','2017-05-06 16:55:42'),(79,'0000-00-00 00:00:00','0000-00-00 00:00:00',76,'2017-05-06 16:56:17','2017-05-06 16:56:17'),(80,'0000-00-00 00:00:00','0000-00-00 00:00:00',77,'2017-05-06 16:57:31','2017-05-06 16:57:31'),(81,'0000-00-00 00:00:00','0000-00-00 00:00:00',78,'2017-05-06 16:59:13','2017-05-06 16:59:13'),(82,'0000-00-00 00:00:00','0000-00-00 00:00:00',79,'2017-05-06 17:00:03','2017-05-06 17:00:03'),(83,'0000-00-00 00:00:00','0000-00-00 00:00:00',80,'2017-05-06 17:00:59','2017-05-06 17:00:59'),(84,'0000-00-00 00:00:00','0000-00-00 00:00:00',81,'2017-05-06 17:02:52','2017-05-06 17:02:52'),(85,'0000-00-00 00:00:00','0000-00-00 00:00:00',82,'2017-05-06 17:03:55','2017-05-06 17:03:55'),(86,'0000-00-00 00:00:00','0000-00-00 00:00:00',83,'2017-05-06 17:04:58','2017-05-06 17:04:58'),(87,'0000-00-00 00:00:00','0000-00-00 00:00:00',84,'2017-05-06 17:06:24','2017-05-06 17:06:24'),(88,'0000-00-00 00:00:00','0000-00-00 00:00:00',85,'2017-05-06 17:06:52','2017-05-06 17:06:52'),(89,'0000-00-00 00:00:00','0000-00-00 00:00:00',86,'2017-05-06 17:07:37','2017-05-06 17:07:37'),(90,'0000-00-00 00:00:00','0000-00-00 00:00:00',87,'2017-05-06 17:09:48','2017-05-06 17:09:48'),(92,'0000-00-00 00:00:00','0000-00-00 00:00:00',89,'2017-05-06 17:12:36','2017-05-06 17:12:36'),(93,'0000-00-00 00:00:00','0000-00-00 00:00:00',90,'2017-05-06 17:13:14','2017-05-06 17:13:14'),(94,'0000-00-00 00:00:00','0000-00-00 00:00:00',91,'2017-05-06 17:14:44','2017-05-06 17:14:44'),(95,'0000-00-00 00:00:00','0000-00-00 00:00:00',92,'2017-05-06 17:16:15','2017-05-06 17:16:15'),(96,'0000-00-00 00:00:00','0000-00-00 00:00:00',93,'2017-05-06 17:17:48','2017-05-06 17:17:48'),(97,'0000-00-00 00:00:00','0000-00-00 00:00:00',94,'2017-05-06 17:18:33','2017-05-06 17:18:33'),(98,'0000-00-00 00:00:00','0000-00-00 00:00:00',95,'2017-05-06 17:19:44','2017-05-06 17:19:44'),(99,'0000-00-00 00:00:00','0000-00-00 00:00:00',96,'2017-05-06 17:23:22','2017-05-06 17:23:22'),(100,'0000-00-00 00:00:00','0000-00-00 00:00:00',97,'2017-05-06 17:24:12','2017-05-06 17:24:12'),(101,'0000-00-00 00:00:00','0000-00-00 00:00:00',98,'2017-05-06 17:25:35','2017-05-06 17:25:35'),(102,'0000-00-00 00:00:00','0000-00-00 00:00:00',99,'2017-05-06 17:26:14','2017-05-06 17:26:14'),(103,'0000-00-00 00:00:00','0000-00-00 00:00:00',3,'2017-05-06 17:28:27','2017-05-06 17:28:27'),(104,'0000-00-00 00:00:00','0000-00-00 00:00:00',100,'2017-05-06 17:32:54','2017-05-06 17:32:54');
/*!40000 ALTER TABLE `AvailabilityDateRange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ChildRecordStats`
--

DROP TABLE IF EXISTS `ChildRecordStats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ChildRecordStats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ChildRecordCount` int(11) NOT NULL DEFAULT '0',
  `ChildWordCount` int(11) NOT NULL DEFAULT '0',
  `ChildCharacterCount` int(11) NOT NULL DEFAULT '0',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ChildRecordStats`
--

LOCK TABLES `ChildRecordStats` WRITE;
/*!40000 ALTER TABLE `ChildRecordStats` DISABLE KEYS */;
INSERT INTO `ChildRecordStats` VALUES (1,1,0,0,1,'2017-05-06 09:03:17','2017-05-06 09:03:17'),(2,1,667,4424,2,'2017-05-06 14:10:51','2017-05-06 14:10:51'),(3,1,997,6748,5,'2017-05-06 14:18:42','2017-05-06 14:18:42'),(4,1,0,0,3,'2017-05-06 14:55:00','2017-05-06 14:55:00'),(5,2,4460,29063,36,'2017-05-06 15:41:20','2017-05-06 15:41:20');
/*!40000 ALTER TABLE `ChildRecordStats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `Userid` int(11) NOT NULL DEFAULT '0',
  `Approved` tinyint(1) NOT NULL DEFAULT '0',
  `Rejected` tinyint(1) NOT NULL DEFAULT '0',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `IPAddress` varchar(39) NOT NULL DEFAULT '',
  `Comment` text NOT NULL,
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`),
  KEY `Userid` (`Userid`),
  KEY `Approved` (`Approved`),
  KEY `Rejected` (`Rejected`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comment`
--

LOCK TABLES `Comment` WRITE;
/*!40000 ALTER TABLE `Comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Description`
--

DROP TABLE IF EXISTS `Description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(512) NOT NULL DEFAULT '',
  `Source` varchar(512) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Description` (`Description`(255)),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Description`
--

LOCK TABLES `Description` WRITE;
/*!40000 ALTER TABLE `Description` DISABLE KEYS */;
INSERT INTO `Description` VALUES (1,'Need to look up the text of an open source or copyleft license?  Then you\'ve found the largest repository of such licenses available in one spot on the Internet!','','en',1,'2017-05-06 08:48:27','2017-05-06 08:48:27'),(2,'A collection of open source and copyleft licenses.','','en',2,'2017-05-06 13:22:56','2017-05-06 13:59:55'),(3,'A collection of open source and copyleft license writers.','','en',3,'2017-05-06 13:31:13','2017-05-06 17:28:27');
/*!40000 ALTER TABLE `Description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Entry`
--

DROP TABLE IF EXISTS `Entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Subtitle` varchar(255) NOT NULL DEFAULT '',
  `ListTitle` varchar(255) NOT NULL DEFAULT '',
  `Code` varchar(255) NOT NULL DEFAULT '',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Title` (`Title`),
  KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entry`
--

LOCK TABLES `Entry` WRITE;
/*!40000 ALTER TABLE `Entry` DISABLE KEYS */;
INSERT INTO `Entry` VALUES (1,'CopyLeft License','Every Open Source License','CopyLeft License','CopyLeftLicense.com','2017-05-06 08:48:27','2017-05-06 08:48:27'),(2,'Licenses','Open Source and CopyLeft Licenses','Licenses','licenses','2017-05-06 13:22:56','2017-05-06 13:59:55'),(3,'People','Open Source Enthusiasts','People','people','2017-05-06 13:31:13','2017-05-06 17:28:27'),(4,'Lawrence Rosen','','Rosen, Lawrence','lawrence-rosen','2017-05-06 14:09:19','2017-05-06 14:09:19'),(5,'Academic Free License (AFL), Version 1.0','','Academic Free License (AFL), Version 00001.00000','academic-free-license-(afl)-version-10','2017-05-06 14:10:47','2017-05-06 14:32:14'),(7,'Academic Free License (AFL), Version 1.1','','Academic Free License (AFL), Version 00001.00001','academic-free-license-(afl)-version-11','2017-05-06 14:19:11','2017-05-06 14:32:18'),(8,'Academic Free License (AFL), Version 1.2','','Academic Free License (AFL), Version 00001.00002','academic-free-license-(afl)-version-12','2017-05-06 14:23:25','2017-05-06 14:31:46'),(9,'Academic Free License (AFL), Version 2.0','','Academic Free License (AFL), Version 00002.00000','academic-free-license-(afl)-version-20','2017-05-06 14:24:19','2017-05-06 14:32:21'),(10,'Academic Free License (AFL), Version 2.1','','Academic Free License (AFL), Version 00002.00001','academic-free-license-(afl)-version-21','2017-05-06 14:25:01','2017-05-06 14:32:29'),(11,'Academic Free License (AFL), Version 3.0','','Academic Free License (AFL), Version 00003.00000','academic-free-license-(afl)-version-30','2017-05-06 14:25:37','2017-05-06 14:32:24'),(12,'Academy of Motion Picture Arts and Sciences','','Academy of Motion Picture Arts and Sciences','academy-of-motion-picture-arts-and-sciences','2017-05-06 14:55:14','2017-05-06 14:55:14'),(13,'Academy of Motion Picture Arts and Sciences BSD Variant','','Academy of Motion Picture Arts and Sciences BSD Variant','academy-of-motion-picture-arts-and-sciences-bsd-variant','2017-05-06 14:55:24','2017-05-06 14:55:54'),(14,'University of Victoria','','University of Victoria','university-of-victoria','2017-05-06 14:57:25','2017-05-06 14:57:25'),(15,'Adaptive Public License (APL) - Version 1.0','','Adaptive Public License (APL) - Version 00001.00000','adaptive-public-license-(apl)-version-10','2017-05-06 14:58:06','2017-05-06 14:58:30'),(16,'Affero','','Affero','affero','2017-05-06 14:59:36','2017-05-06 14:59:36'),(17,'Affero General Public License (AGPL) - Version 1','','Affero General Public License (AGPL) - Version 00001','affero-general-public-license-(agpl)-version-1','2017-05-06 14:59:55','2017-05-06 14:59:55'),(18,'Affero General Public License (AGPL) - Version 2','','Affero General Public License (AGPL) - Version 00002','affero-general-public-license-(agpl)-version-2','2017-05-06 15:01:33','2017-05-06 15:01:33'),(19,'Affero General Public License (AGPL) - Version 3','','Affero General Public License (AGPL) - Version 00003','affero-general-public-license-(agpl)-version-3','2017-05-06 15:02:52','2017-05-06 15:02:52'),(20,'Free Creations','','Free Creations','free-creations','2017-05-06 15:04:41','2017-05-06 15:04:41'),(21,'Against DRM License - Version 1.0','','Against DRM License - Version 00001.00000','against-drm-license-version-10','2017-05-06 15:04:59','2017-05-06 15:04:59'),(22,'Against DRM License - Version 2.0','','Against DRM License - Version 00002.00000','against-drm-license-version-20','2017-05-06 15:05:27','2017-05-06 15:05:27'),(23,'Poul-Henning Kamp','','Kamp, Poul-Henning','poul-henning-kamp','2017-05-06 15:06:43','2017-05-06 15:06:43'),(24,'Beerware - Version 42','','Beerware - Version 00042','beerware-version-42','2017-05-06 15:06:59','2017-05-06 15:07:39'),(25,'Berkeley Software Distribution (BSD)','','Berkeley Software Distribution (BSD)','berkeley-software-distribution-(bsd)','2017-05-06 15:10:14','2017-05-06 15:10:14'),(26,'New BSD License','No-Advertising, 3-Clause','New BSD License','new-bsd-license','2017-05-06 15:11:53','2017-05-06 15:11:53'),(27,'Aladdin Enterprises','','Aladdin Enterprises','aladdin-enterprises','2017-05-06 15:13:02','2017-05-06 15:13:02'),(28,'Aladdin Free Public License','','Aladdin Free Public License','aladdin-free-public-license','2017-05-06 15:13:23','2017-05-06 15:13:23'),(29,'Unknown','','Unknown','unknown','2017-05-06 15:13:56','2017-05-06 15:13:56'),(30,'Anti-Copyright Notice','','Anti-Copyright Notice','anti-copyright-notice','2017-05-06 15:15:11','2017-05-06 15:15:11'),(31,'Washington State Department of Transportation, Bridge and Structures Office','','Washington State Department of Transportation, Bridge and Structures Office','washington-state-department-of-transportation-bridge-and-structures-office','2017-05-06 15:17:08','2017-05-06 15:17:08'),(32,'Alternate Route Open Source License - Version 1.1','','Alternate Route Open Source License - Version 00001.00001','alternate-route-open-source-license-version-11','2017-05-06 15:17:48','2017-05-06 15:18:21'),(33,'Apache Software Foundation (ASF)','','Apache Software Foundation (ASF)','apache-software-foundation-(asf)','2017-05-06 15:33:34','2017-05-06 15:33:34'),(34,'Apache License - Version 1.0','','Apache License - Version 00001.00000','apache-license-version-10','2017-05-06 15:34:27','2017-05-06 15:34:27'),(35,'Apache License - Version 1.1','','Apache License - Version 00001.00001','apache-license-version-11','2017-05-06 15:35:06','2017-05-06 15:35:06'),(36,'Apache License - Version 2.0','','Apache License - Version 00002.00000','apache-license-version-20','2017-05-06 15:36:21','2017-05-06 15:36:44'),(37,'Apple','','Apple','apple','2017-05-06 15:37:13','2017-05-06 15:37:13'),(40,'Apple Common Documentation License','','Apple Common Documentation License','apple-common-documentation-license','2017-05-06 15:42:52','2017-05-06 15:42:52'),(41,'Apple Public Source License (APSL) - Version 1.0','','Apple Public Source License (APSL) - Version 00001.00000','apple-public-source-license-(apsl)-version-10','2017-05-06 15:43:17','2017-05-06 15:43:17'),(42,'Apple Public Source License (APSL) - Version 1.1','','Apple Public Source License (APSL) - Version 00001.00001','apple-public-source-license-(apsl)-version-11','2017-05-06 15:45:53','2017-05-06 15:45:53'),(43,'Apple Public Source License (APSL) - Version 1.2','','Apple Public Source License (APSL) - Version 00001.00002','apple-public-source-license-(apsl)-version-12','2017-05-06 15:47:53','2017-05-06 15:47:53'),(44,'Apple Public Source License (APSL) - Version 2.0','','Apple Public Source License (APSL) - Version 00002.00000','apple-public-source-license-(apsl)-version-20','2017-05-06 15:48:43','2017-05-06 15:48:43'),(45,'Arphic Technology','','Arphic Technology','arphic-technology','2017-05-06 15:49:27','2017-05-06 15:49:27'),(46,'Arphic Public License (APL) - Version 1.0','','Arphic Public License (APL) - Version 00001.00000','arphic-public-license-(apl)-version-10','2017-05-06 15:49:42','2017-05-06 15:49:42'),(47,'Perl Foundation','','Perl Foundation','perl-foundation','2017-05-06 15:52:09','2017-05-06 15:52:09'),(48,'Artistic License - Version 1.0','','Artistic License - Version 00001.00000','artistic-license-version-10','2017-05-06 15:52:46','2017-05-06 15:52:46'),(49,'Artistic License - Version 2.0','','Artistic License - Version 00002.00000','artistic-license-version-20','2017-05-06 16:07:37','2017-05-06 16:07:37'),(50,'Artistic License - Version Clarified','','Artistic License - Version Clarified','artistic-license-version-clarified','2017-05-06 16:08:22','2017-05-06 16:08:22'),(51,'Edwin A. Suominen','','Suominen, Edwin A.','edwin-a-suominen','2017-05-06 16:09:12','2017-05-06 16:09:12'),(52,'Attribution Assurance License (AAL) - Version 1.0','','Attribution Assurance License (AAL) - Version 00001.00000','attribution-assurance-license-(aal)-version-10','2017-05-06 16:09:50','2017-05-06 16:09:50'),(53,'GNU Project','','GNU Project','gnu-project','2017-05-06 16:11:05','2017-05-06 16:11:05'),(54,'Autoconf Configure Script Exception - Version 3.0','','Autoconf Configure Script Exception - Version 00003.00000','autoconf-configure-script-exception-version-30','2017-05-06 16:11:16','2017-05-06 16:11:16'),(55,'Biological Innovation for Open Society (BiOS)','','Biological Innovation for Open Society (BiOS)','biological-innovation-for-open-society-(bios)','2017-05-06 16:12:25','2017-05-06 16:12:25'),(56,'BiOS Agreement for Health Technologies - Version 2.0','','BiOS Agreement for Health Technologies - Version 00002.00000','bios-agreement-for-health-technologies-version-20','2017-05-06 16:13:58','2017-05-06 16:18:21'),(57,'CAMBIA Plant Molecular Enabling Technology BiOS License - Version 1.5','','CAMBIA Plant Molecular Enabling Technology BiOS License - Version 00001.00005','cambia-plant-molecular-enabling-technology-bios-license-version-15','2017-05-06 16:14:51','2017-05-06 16:14:51'),(58,'BitTorrent','','BitTorrent','bittorrent','2017-05-06 16:20:34','2017-05-06 16:20:34'),(59,'BitTorrent Open Source License - Version 1.0','','BitTorrent Open Source License - Version 00001.00000','bittorrent-open-source-license-version-10','2017-05-06 16:21:58','2017-05-06 16:21:58'),(60,'BitTorrent Open Source License - Version 1.1','','BitTorrent Open Source License - Version 00001.00001','bittorrent-open-source-license-version-11','2017-05-06 16:22:54','2017-05-06 16:22:54'),(61,'Boost Community','','Boost Community','boost-community','2017-05-06 16:23:22','2017-05-06 16:23:22'),(62,'Boost Software License','','Boost Software License','boost-software-license','2017-05-06 16:23:58','2017-05-06 16:23:58'),(63,'FreeBSD','','FreeBSD','freebsd','2017-05-06 16:26:24','2017-05-06 16:26:24'),(64,'FreeBSD Documentation License','','FreeBSD Documentation License','freebsd-documentation-license','2017-05-06 16:27:45','2017-05-06 16:27:45'),(65,'Apotheon','','Apotheon','apotheon','2017-05-06 16:29:07','2017-05-06 16:29:07'),(66,'CCD CopyWrite - Version 0.8','','CCD CopyWrite - Version 00000.00008','ccd-copywrite-version-08','2017-05-06 16:30:01','2017-05-06 16:30:01'),(67,'Republic of France','','Republic of France','republic-of-france','2017-05-06 16:31:01','2017-05-06 16:31:01'),(68,'CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 1.0B','','CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 00001.0B','cecill-(cea-cnrs-inria-logiciel-libre)-version-10b','2017-05-06 16:31:36','2017-05-06 16:31:36'),(69,'CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 1.0C','','CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 00001.0C','cecill-(cea-cnrs-inria-logiciel-libre)-version-10c','2017-05-06 16:36:18','2017-05-06 16:36:18'),(70,'CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 1.1','','CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 00001.00001','cecill-(cea-cnrs-inria-logiciel-libre)-version-11','2017-05-06 16:37:31','2017-05-06 16:37:31'),(71,'CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 2','','CeCILL (CEA CNRS INRIA Logiciel Libre) - Version 00002','cecill-(cea-cnrs-inria-logiciel-libre)-version-2','2017-05-06 16:38:15','2017-05-06 16:38:15'),(72,'CodeProject','','CodeProject','codeproject','2017-05-06 16:38:53','2017-05-06 16:38:53'),(73,'Code Project Open License (CPOL) - Version 1.0','','Code Project Open License (CPOL) - Version 00001.00000','code-project-open-license-(cpol)-version-10','2017-05-06 16:40:31','2017-05-06 16:40:31'),(74,'Code Project Open License (CPOL) - Version 1.02','','Code Project Open License (CPOL) - Version 00001.00002','code-project-open-license-(cpol)-version-102','2017-05-06 16:53:53','2017-05-06 16:53:53'),(75,'Sun Microsystems','','Sun Microsystems','sun-microsystems','2017-05-06 16:55:42','2017-05-06 16:55:42'),(76,'Common Development and Distribution License (CDDL) - Version 1.0','','Common Development and Distribution License (CDDL) - Version 00001.00000','common-development-and-distribution-license-(cddl)-version-10','2017-05-06 16:56:16','2017-05-06 16:56:16'),(77,'Socialtext','','Socialtext','socialtext','2017-05-06 16:57:31','2017-05-06 16:57:31'),(78,'Common Public Attribution License (CPAL) - Version 1.0','','Common Public Attribution License (CPAL) - Version 00001.00000','common-public-attribution-license-(cpal)-version-10','2017-05-06 16:59:13','2017-05-06 16:59:13'),(79,'IBM','','IBM','ibm','2017-05-06 17:00:03','2017-05-06 17:00:03'),(80,'Common Public License (CPL) - Version 1.0','','Common Public License (CPL) - Version 00001.00000','common-public-license-(cpl)-version-10','2017-05-06 17:00:59','2017-05-06 17:00:59'),(81,'Computer Associates','','Computer Associates','computer-associates','2017-05-06 17:02:52','2017-05-06 17:02:52'),(82,'Computer Associates Trusted Open Source License (CATOSL) - Version 1.1','','Computer Associates Trusted Open Source License (CATOSL) - Version 00001.00001','computer-associates-trusted-open-source-license-(catosl)-version-11','2017-05-06 17:03:55','2017-05-06 17:03:55'),(83,'Condor Team','','Condor Team','condor-team','2017-05-06 17:04:58','2017-05-06 17:04:58'),(84,'Condor Public License - Version 1.1','','Condor Public License - Version 00001.00001','condor-public-license-version-11','2017-05-06 17:06:24','2017-05-06 17:06:24'),(85,'The Cougaar Group','','Cougaar Group, The','the-cougaar-group','2017-05-06 17:06:52','2017-05-06 17:06:52'),(86,'Cougaar Open Source License Agreement - Version 1.0','','Cougaar Open Source License Agreement - Version 00001.00000','cougaar-open-source-license-agreement-version-10','2017-05-06 17:07:37','2017-05-06 17:07:37'),(87,'British Broadcasting Corporation (BBC)','','British Broadcasting Corporation (BBC)','british-broadcasting-corporation-(bbc)','2017-05-06 17:09:48','2017-05-06 17:09:48'),(88,'Creative Archive Licence (CAL) - Version 1.0','','Creative Archive Licence (CAL) - Version 00001.00000','creative-archive-licence-(cal)-version-10','2017-05-06 17:10:18','2017-05-06 17:11:05'),(89,'The Cryptix Foundation','','Cryptix Foundation, The','the-cryptix-foundation','2017-05-06 17:12:36','2017-05-06 17:12:36'),(90,'Cryptix General License - Version 1.0','','Cryptix General License - Version 00001.00000','cryptix-general-license-version-10','2017-05-06 17:13:14','2017-05-06 17:13:14'),(91,'The CUA Office Project','','CUA Office Project, The','the-cua-office-project','2017-05-06 17:14:44','2017-05-06 17:14:44'),(92,'CUA Office Public License (CUA-OPL) - Version 1.0','','CUA Office Public License (CUA-OPL) - Version 00001.00000','cua-office-public-license-(cua-opl)-version-10','2017-05-06 17:16:15','2017-05-06 17:16:15'),(93,'FreedomDefined','','FreedomDefined','freedomdefined','2017-05-06 17:17:48','2017-05-06 17:17:48'),(94,'Definition of Free Cultural Works - Version 1.0','','Definition of Free Cultural Works - Version 00001.00000','definition-of-free-cultural-works-version-10','2017-05-06 17:18:33','2017-05-06 17:18:33'),(95,'Definition of Free Cultural Works - Version 1.1','','Definition of Free Cultural Works - Version 00001.00001','definition-of-free-cultural-works-version-11','2017-05-06 17:19:44','2017-05-06 17:19:44'),(96,'Michael Stutz','','Stutz, Michael','michael-stutz','2017-05-06 17:23:22','2017-05-06 17:23:22'),(97,'Design Science License (DSL) - Version 1.0','','Design Science License (DSL) - Version 00001.00000','design-science-license-(dsl)-version-10','2017-05-06 17:24:12','2017-05-06 17:24:12'),(98,'Banlu Kemiyatorn','','Kemiyatorn, Banlu','banlu-kemiyatorn','2017-05-06 17:25:35','2017-05-06 17:25:35'),(99,'Do What The Fuck You Want To Public License (WTFPL) - Version 1.0','','Do What The Fuck You Want To Public License (WTFPL) - Version 00001.00000','do-what-the-fuck-you-want-to-public-license-(wtfpl)-version-10','2017-05-06 17:26:14','2017-05-06 17:26:14'),(100,'Do What The Fuck You Want To Public License (WTFPL) - Version 2.0','','Do What The Fuck You Want To Public License (WTFPL) - Version 00002.00000','do-what-the-fuck-you-want-to-public-license-(wtfpl)-version-20','2017-05-06 17:32:54','2017-05-06 17:32:54');
/*!40000 ALTER TABLE `Entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EntryPermission`
--

DROP TABLE IF EXISTS `EntryPermission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EntryPermission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `Userid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`),
  KEY `Userid` (`Userid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EntryPermission`
--

LOCK TABLES `EntryPermission` WRITE;
/*!40000 ALTER TABLE `EntryPermission` DISABLE KEYS */;
INSERT INTO `EntryPermission` VALUES (1,1,21,'2017-05-06 08:48:28','2017-05-06 08:48:28'),(2,2,21,'2017-05-06 13:22:56','2017-05-06 13:22:56'),(3,3,21,'2017-05-06 13:31:13','2017-05-06 13:31:13'),(4,4,21,'2017-05-06 14:09:19','2017-05-06 14:09:19'),(5,5,21,'2017-05-06 14:10:47','2017-05-06 14:10:47'),(6,6,21,'2017-05-06 14:18:32','2017-05-06 14:18:32'),(7,7,21,'2017-05-06 14:19:11','2017-05-06 14:19:11'),(8,8,21,'2017-05-06 14:23:25','2017-05-06 14:23:25'),(9,9,21,'2017-05-06 14:24:19','2017-05-06 14:24:19'),(10,10,21,'2017-05-06 14:25:01','2017-05-06 14:25:01'),(11,11,21,'2017-05-06 14:25:37','2017-05-06 14:25:37'),(12,12,21,'2017-05-06 14:55:14','2017-05-06 14:55:14'),(13,13,21,'2017-05-06 14:55:24','2017-05-06 14:55:24'),(14,14,21,'2017-05-06 14:57:25','2017-05-06 14:57:25'),(15,15,21,'2017-05-06 14:58:06','2017-05-06 14:58:06'),(16,16,21,'2017-05-06 14:59:36','2017-05-06 14:59:36'),(17,17,21,'2017-05-06 14:59:55','2017-05-06 14:59:55'),(18,18,21,'2017-05-06 15:01:33','2017-05-06 15:01:33'),(19,19,21,'2017-05-06 15:02:55','2017-05-06 15:02:55'),(20,20,21,'2017-05-06 15:04:41','2017-05-06 15:04:41'),(21,21,21,'2017-05-06 15:04:59','2017-05-06 15:04:59'),(22,22,21,'2017-05-06 15:05:27','2017-05-06 15:05:27'),(23,23,21,'2017-05-06 15:06:43','2017-05-06 15:06:43'),(24,24,21,'2017-05-06 15:06:59','2017-05-06 15:06:59'),(25,25,21,'2017-05-06 15:10:14','2017-05-06 15:10:14'),(26,26,21,'2017-05-06 15:11:53','2017-05-06 15:11:53'),(27,27,21,'2017-05-06 15:13:02','2017-05-06 15:13:02'),(28,28,21,'2017-05-06 15:13:23','2017-05-06 15:13:23'),(29,29,21,'2017-05-06 15:13:56','2017-05-06 15:13:56'),(30,30,21,'2017-05-06 15:15:11','2017-05-06 15:15:11'),(31,31,21,'2017-05-06 15:17:08','2017-05-06 15:17:08'),(32,32,21,'2017-05-06 15:17:49','2017-05-06 15:17:49'),(33,33,21,'2017-05-06 15:33:34','2017-05-06 15:33:34'),(34,34,21,'2017-05-06 15:34:27','2017-05-06 15:34:27'),(35,35,21,'2017-05-06 15:35:06','2017-05-06 15:35:06'),(36,36,21,'2017-05-06 15:36:21','2017-05-06 15:36:21'),(37,37,21,'2017-05-06 15:37:13','2017-05-06 15:37:13'),(38,38,21,'2017-05-06 15:37:54','2017-05-06 15:37:54'),(39,39,21,'2017-05-06 15:39:31','2017-05-06 15:39:31'),(40,40,21,'2017-05-06 15:42:52','2017-05-06 15:42:52'),(41,41,21,'2017-05-06 15:43:17','2017-05-06 15:43:17'),(42,42,21,'2017-05-06 15:45:53','2017-05-06 15:45:53'),(43,43,21,'2017-05-06 15:47:53','2017-05-06 15:47:53'),(44,44,21,'2017-05-06 15:48:43','2017-05-06 15:48:43'),(45,45,21,'2017-05-06 15:49:27','2017-05-06 15:49:27'),(46,46,21,'2017-05-06 15:49:42','2017-05-06 15:49:42'),(47,47,21,'2017-05-06 15:52:10','2017-05-06 15:52:10'),(48,48,21,'2017-05-06 15:52:46','2017-05-06 15:52:46'),(49,49,21,'2017-05-06 16:07:37','2017-05-06 16:07:37'),(50,50,21,'2017-05-06 16:08:22','2017-05-06 16:08:22'),(51,51,21,'2017-05-06 16:09:12','2017-05-06 16:09:12'),(52,52,21,'2017-05-06 16:09:50','2017-05-06 16:09:50'),(53,53,21,'2017-05-06 16:11:05','2017-05-06 16:11:05'),(54,54,21,'2017-05-06 16:11:16','2017-05-06 16:11:16'),(55,55,21,'2017-05-06 16:12:25','2017-05-06 16:12:25'),(56,56,21,'2017-05-06 16:13:59','2017-05-06 16:13:59'),(57,57,21,'2017-05-06 16:14:51','2017-05-06 16:14:51'),(58,58,21,'2017-05-06 16:20:35','2017-05-06 16:20:35'),(59,59,21,'2017-05-06 16:21:58','2017-05-06 16:21:58'),(60,60,21,'2017-05-06 16:22:54','2017-05-06 16:22:54'),(61,61,21,'2017-05-06 16:23:22','2017-05-06 16:23:22'),(62,62,21,'2017-05-06 16:23:58','2017-05-06 16:23:58'),(63,63,21,'2017-05-06 16:26:24','2017-05-06 16:26:24'),(64,64,21,'2017-05-06 16:27:45','2017-05-06 16:27:45'),(65,65,21,'2017-05-06 16:29:07','2017-05-06 16:29:07'),(66,66,21,'2017-05-06 16:30:01','2017-05-06 16:30:01'),(67,67,21,'2017-05-06 16:31:01','2017-05-06 16:31:01'),(68,68,21,'2017-05-06 16:31:36','2017-05-06 16:31:36'),(69,69,21,'2017-05-06 16:36:18','2017-05-06 16:36:18'),(70,70,21,'2017-05-06 16:37:31','2017-05-06 16:37:31'),(71,71,21,'2017-05-06 16:38:15','2017-05-06 16:38:15'),(72,72,21,'2017-05-06 16:38:53','2017-05-06 16:38:53'),(73,73,21,'2017-05-06 16:40:31','2017-05-06 16:40:31'),(74,74,21,'2017-05-06 16:53:53','2017-05-06 16:53:53'),(75,75,21,'2017-05-06 16:55:42','2017-05-06 16:55:42'),(76,76,21,'2017-05-06 16:56:17','2017-05-06 16:56:17'),(77,77,21,'2017-05-06 16:57:31','2017-05-06 16:57:31'),(78,78,21,'2017-05-06 16:59:13','2017-05-06 16:59:13'),(79,79,21,'2017-05-06 17:00:03','2017-05-06 17:00:03'),(80,80,21,'2017-05-06 17:00:59','2017-05-06 17:00:59'),(81,81,21,'2017-05-06 17:02:52','2017-05-06 17:02:52'),(82,82,21,'2017-05-06 17:03:55','2017-05-06 17:03:55'),(83,83,21,'2017-05-06 17:04:58','2017-05-06 17:04:58'),(84,84,21,'2017-05-06 17:06:24','2017-05-06 17:06:24'),(85,85,21,'2017-05-06 17:06:52','2017-05-06 17:06:52'),(86,86,21,'2017-05-06 17:07:37','2017-05-06 17:07:37'),(87,87,21,'2017-05-06 17:09:48','2017-05-06 17:09:48'),(88,88,21,'2017-05-06 17:10:18','2017-05-06 17:10:18'),(89,89,21,'2017-05-06 17:12:36','2017-05-06 17:12:36'),(90,90,21,'2017-05-06 17:13:14','2017-05-06 17:13:14'),(91,91,21,'2017-05-06 17:14:44','2017-05-06 17:14:44'),(92,92,21,'2017-05-06 17:16:15','2017-05-06 17:16:15'),(93,93,21,'2017-05-06 17:17:48','2017-05-06 17:17:48'),(94,94,21,'2017-05-06 17:18:33','2017-05-06 17:18:33'),(95,95,21,'2017-05-06 17:19:44','2017-05-06 17:19:44'),(96,96,21,'2017-05-06 17:23:22','2017-05-06 17:23:22'),(97,97,21,'2017-05-06 17:24:12','2017-05-06 17:24:12'),(98,98,21,'2017-05-06 17:25:35','2017-05-06 17:25:35'),(99,99,21,'2017-05-06 17:26:14','2017-05-06 17:26:14'),(100,100,21,'2017-05-06 17:32:54','2017-05-06 17:32:54');
/*!40000 ALTER TABLE `EntryPermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EntryTranslation`
--

DROP TABLE IF EXISTS `EntryTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EntryTranslation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Subtitle` varchar(255) NOT NULL DEFAULT '',
  `ListTitle` varchar(255) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Title` (`Title`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EntryTranslation`
--

LOCK TABLES `EntryTranslation` WRITE;
/*!40000 ALTER TABLE `EntryTranslation` DISABLE KEYS */;
/*!40000 ALTER TABLE `EntryTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EventDate`
--

DROP TABLE IF EXISTS `EventDate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `EventDate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `EventDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Description` varchar(255) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EventDate`
--

LOCK TABLES `EventDate` WRITE;
/*!40000 ALTER TABLE `EventDate` DISABLE KEYS */;
/*!40000 ALTER TABLE `EventDate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Image`
--

DROP TABLE IF EXISTS `Image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Description` varchar(1023) NOT NULL DEFAULT '',
  `FileName` varchar(255) NOT NULL DEFAULT '',
  `FileDirectory` varchar(255) NOT NULL DEFAULT '',
  `IconFileName` varchar(255) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `PixelWidth` int(11) NOT NULL DEFAULT '0',
  `PixelHeight` int(11) NOT NULL DEFAULT '0',
  `IconPixelWidth` int(11) NOT NULL DEFAULT '0',
  `IconPixelHeight` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Title` (`Title`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Image`
--

LOCK TABLES `Image` WRITE;
/*!40000 ALTER TABLE `Image` DISABLE KEYS */;
INSERT INTO `Image` VALUES (1,'','','copyleft-people.jpg','vmgt','copyleft-people-icon.jpg',3,150,150,0,0,'2017-05-06 13:51:39','2017-05-06 17:28:27'),(2,'','','copyleft-terms.jpg','n3d3','copyleft-terms-icon.jpg',2,150,190,0,0,'2017-05-06 13:59:55','2017-05-06 13:59:55');
/*!40000 ALTER TABLE `Image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImageTranslation`
--

DROP TABLE IF EXISTS `ImageTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImageTranslation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Description` varchar(1023) NOT NULL DEFAULT '',
  `FileName` varchar(255) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Title` (`Title`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImageTranslation`
--

LOCK TABLES `ImageTranslation` WRITE;
/*!40000 ALTER TABLE `ImageTranslation` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImageTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `InternalServerError`
--

DROP TABLE IF EXISTS `InternalServerError`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `InternalServerError` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Resolved` tinyint(1) NOT NULL DEFAULT '0',
  `ErrorMessage` text NOT NULL,
  `ServerVariable` text NOT NULL,
  `PostVariable` text NOT NULL,
  `GetVariable` text NOT NULL,
  `EnvironmentVariables` text NOT NULL,
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Resolved` (`Resolved`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL DEFAULT '',
  `Password` binary(32) NOT NULL DEFAULT '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `EmailAddress` varchar(255) NOT NULL DEFAULT '',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Username` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'you','MASTER PASSWORD HASH','youremail@yoursite.com','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserAdmin`
--

DROP TABLE IF EXISTS `UserAdmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserAdmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Userid` (`Userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserAdmin`
--

LOCK TABLES `UserAdmin` WRITE;
/*!40000 ALTER TABLE `UserAdmin` DISABLE KEYS */;
INSERT INTO `UserAdmin` VALUES (1,1,'2017-05-04 15:41:58','2017-05-04 15:41:58');
/*!40000 ALTER TABLE `UserAdmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPermission`
--

DROP TABLE IF EXISTS `UserPermission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserPermission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Usernameid` int(11) NOT NULL DEFAULT '0',
  `PermissionTypeid` int(11) NOT NULL DEFAULT '0',
  `OwnedTable` varchar(255) NOT NULL DEFAULT '',
  `Ownedid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Usernameid` (`Usernameid`),
  KEY `PermissionTypeid` (`PermissionTypeid`),
  KEY `OwnedTable` (`OwnedTable`),
  KEY `Ownedid` (`Ownedid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPermission`
--

LOCK TABLES `UserPermission` WRITE;
/*!40000 ALTER TABLE `UserPermission` DISABLE KEYS */;
/*!40000 ALTER TABLE `UserPermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPermissionType`
--

DROP TABLE IF EXISTS `UserPermissionType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserPermissionType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Permission` enum('View','Edit') NOT NULL DEFAULT 'View',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPermissionType`
--

LOCK TABLES `UserPermissionType` WRITE;
/*!40000 ALTER TABLE `UserPermissionType` DISABLE KEYS */;
/*!40000 ALTER TABLE `UserPermissionType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserSession`
--

DROP TABLE IF EXISTS `UserSession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserSession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` int(11) NOT NULL DEFAULT '0',
  `CookieToken` varchar(255) NOT NULL DEFAULT '',
  `LastAccess` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `CookieToken` (`CookieToken`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserSession`
--

LOCK TABLES `UserSession` WRITE;
/*!40000 ALTER TABLE `UserSession` DISABLE KEYS */;
INSERT INTO `UserSession` VALUES (21,1,'e6AYQOIjXCB5LADPUhnA=vr7qtg4FDMhXJWGp4LgnK','2017-05-06 17:25:25','2017-05-06 08:30:08','2017-05-06 17:25:25');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'copyleftlicense'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:34:26
