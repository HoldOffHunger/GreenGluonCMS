-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.173.170    Database: removeduplicatelines
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assignment`
--

LOCK TABLES `Assignment` WRITE;
/*!40000 ALTER TABLE `Assignment` DISABLE KEYS */;
INSERT INTO `Assignment` VALUES (1,1,0,'2016-06-28 17:37:32','0000-00-00 00:00:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AssociatedRecordStats`
--

LOCK TABLES `AssociatedRecordStats` WRITE;
/*!40000 ALTER TABLE `AssociatedRecordStats` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Association`
--

LOCK TABLES `Association` WRITE;
/*!40000 ALTER TABLE `Association` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AvailabilityDateRange`
--

LOCK TABLES `AvailabilityDateRange` WRITE;
/*!40000 ALTER TABLE `AvailabilityDateRange` DISABLE KEYS */;
INSERT INTO `AvailabilityDateRange` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'2016-06-28 17:37:32','2016-08-22 17:21:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ChildRecordStats`
--

LOCK TABLES `ChildRecordStats` WRITE;
/*!40000 ALTER TABLE `ChildRecordStats` DISABLE KEYS */;
INSERT INTO `ChildRecordStats` VALUES (1,1,0,0,1,'2017-02-05 14:36:50','2017-05-06 14:08:12'),(2,1,0,0,1,'2017-02-05 14:53:24','2017-02-05 14:53:24');
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
  KEY `Approved` (`Approved`)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Description`
--

LOCK TABLES `Description` WRITE;
/*!40000 ALTER TABLE `Description` DISABLE KEYS */;
INSERT INTO `Description` VALUES (1,'Use this tool to remove duplicate lines from your text lists.','','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entry`
--

LOCK TABLES `Entry` WRITE;
/*!40000 ALTER TABLE `Entry` DISABLE KEYS */;
INSERT INTO `Entry` VALUES (1,'Remove Duplicate Lines','Removing Duplicate Entries from Lists','','RemoveDuplicateLines.com','2016-06-28 17:37:32','2016-08-22 17:21:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EntryPermission`
--

LOCK TABLES `EntryPermission` WRITE;
/*!40000 ALTER TABLE `EntryPermission` DISABLE KEYS */;
INSERT INTO `EntryPermission` VALUES (1,1,21,'2016-06-28 17:37:32','0000-00-00 00:00:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Image`
--

LOCK TABLES `Image` WRITE;
/*!40000 ALTER TABLE `Image` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `LikeDislike`
--

DROP TABLE IF EXISTS `LikeDislike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LikeDislike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LikeOrDislike` tinyint(1) NOT NULL DEFAULT '0',
  `Userid` int(11) NOT NULL DEFAULT '0',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `LikeOrDislike` (`LikeOrDislike`),
  KEY `Userid` (`Userid`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LikeDislike`
--

LOCK TABLES `LikeDislike` WRITE;
/*!40000 ALTER TABLE `LikeDislike` DISABLE KEYS */;
/*!40000 ALTER TABLE `LikeDislike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Link`
--

DROP TABLE IF EXISTS `Link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `URL` varchar(255) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Link`
--

LOCK TABLES `Link` WRITE;
/*!40000 ALTER TABLE `Link` DISABLE KEYS */;
/*!40000 ALTER TABLE `Link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LookupList`
--

DROP TABLE IF EXISTS `LookupList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LookupList` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Title` (`Title`),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupList`
--

LOCK TABLES `LookupList` WRITE;
/*!40000 ALTER TABLE `LookupList` DISABLE KEYS */;
INSERT INTO `LookupList` VALUES (1,'LanguagesMainHeader',0,'2016-07-31 17:33:01','0000-00-00 00:00:00'),(2,'LanguagesMainInstructionsHeader',0,'2016-07-31 18:11:17','0000-00-00 00:00:00'),(3,'LanguagesMainInstructionsContent',0,'2016-08-02 17:43:10','0000-00-00 00:00:00'),(4,'LanguagesMainList1Header',0,'2016-08-03 17:47:17','0000-00-00 00:00:00'),(5,'LanguagesMainList2Header',0,'2016-08-04 17:15:07','0000-00-00 00:00:00'),(6,'LanguagesMainList1Content',0,'2016-08-04 17:37:42','0000-00-00 00:00:00'),(7,'LanguagesMainList2Content',0,'2016-08-04 17:41:48','0000-00-00 00:00:00'),(8,'LanguagesMainButtonText',0,'2016-08-04 17:49:23','0000-00-00 00:00:00'),(9,'LanguagesMainFirstFeatureOptionOneTitle',0,'2016-08-05 12:48:34','0000-00-00 00:00:00'),(10,'LanguagesMainFirstFeatureOptionOneMouseover',0,'2016-08-05 14:04:18','0000-00-00 00:00:00'),(11,'LanguagesMainFirstFeatureOptionTwoTitle',0,'2016-08-05 14:07:00','0000-00-00 00:00:00'),(12,'LanguagesMainFirstFeatureOptionTwoMouseover',0,'2016-08-05 14:09:29','0000-00-00 00:00:00'),(13,'LanguagesMainTrimOption',0,'2016-08-05 14:12:21','0000-00-00 00:00:00'),(14,'LanguagesMainTrimDescription',0,'2016-08-05 14:15:02','0000-00-00 00:00:00'),(15,'LanguagesBottomNavigationHome',0,'2016-08-05 14:23:09','0000-00-00 00:00:00'),(16,'LanguagesBottomNavigationAbout',0,'2016-08-05 14:30:49','0000-00-00 00:00:00'),(17,'LanguagesBottomNavigationContact',0,'2016-08-05 14:38:56','0000-00-00 00:00:00'),(18,'LanguagesAboutUsHeader',0,'2016-08-06 14:40:37','0000-00-00 00:00:00'),(19,'LanguagesAboutUsContent',0,'2016-08-06 14:45:20','0000-00-00 00:00:00'),(20,'LanguagesMainImageQuote',0,'2016-08-06 17:52:14','0000-00-00 00:00:00'),(21,'LanguagesAboutHeader',0,'2016-08-06 17:58:36','0000-00-00 00:00:00'),(23,'LanguagesContactHeader',0,'2016-08-06 18:01:56','0000-00-00 00:00:00'),(24,'LanguagesContactUs',0,'2016-08-06 18:05:49','0000-00-00 00:00:00'),(25,'LanguagesSiteCreator',0,'2016-08-06 18:08:55','0000-00-00 00:00:00'),(26,'LanguagesSiteCreatedOn',0,'2016-08-06 18:11:38','0000-00-00 00:00:00'),(27,'LanguagesContactCreator',0,'2016-08-06 18:14:29','0000-00-00 00:00:00'),(28,'LanguagesRobotsHeader',0,'2016-08-08 17:56:49','0000-00-00 00:00:00'),(29,'LanguagesRobotsInstructions',0,'2016-08-08 18:00:12','0000-00-00 00:00:00'),(30,'LanguagesSitemapHeader',0,'2016-08-09 17:21:50','0000-00-00 00:00:00'),(31,'LanguagesSitemapInstructions',0,'2016-08-09 17:25:49','0000-00-00 00:00:00'),(32,'LanguagesMainKeywords',0,'2016-08-12 18:02:00','0000-00-00 00:00:00'),(33,'LanguagesMainNewsKeywords',0,'2016-08-12 18:19:53','0000-00-00 00:00:00'),(34,'LanguagesMainClassification',0,'2016-08-12 18:22:43','0000-00-00 00:00:00'),(35,'AboutPageInfo',0,'2016-08-19 15:55:44','0000-00-00 00:00:00'),(36,'ContactPageInfo',0,'2016-08-20 13:53:27','0000-00-00 00:00:00'),(37,'HomePageInfo',0,'2016-08-20 13:54:10','0000-00-00 00:00:00'),(38,'LanguagesPageInfo',0,'2016-08-24 17:15:58','0000-00-00 00:00:00'),(39,'LanguagesAnd',0,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(40,'LanguagesOtherCountry',0,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(41,'LanguagesOtherCountries',0,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(42,'LanguagesHeader',0,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(43,'LanguagesBottomNavigationLanguages',0,'2016-08-27 16:15:08','0000-00-00 00:00:00'),(44,'LanguagesShare',0,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(45,'LanguagesShareWith',0,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(46,'LanguagesSelectLanguageTitle',0,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(47,'LanguagesRobotsFilename',0,'2017-01-10 15:46:30','2017-01-10 15:46:30'),(48,'LanguagesMainActivityHeader',0,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(49,'LanguagesMainStatusHeader',0,'2017-01-12 11:46:43','2017-01-12 11:46:43');
/*!40000 ALTER TABLE `LookupList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LookupListItem`
--

DROP TABLE IF EXISTS `LookupListItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LookupListItem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemKey` varchar(1023) NOT NULL DEFAULT '',
  `ItemValue` varchar(1023) NOT NULL DEFAULT '',
  `Disabled` tinyint(1) NOT NULL DEFAULT '0',
  `LookupListid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ItemKey` (`ItemKey`(255)),
  KEY `ItemValue` (`ItemValue`(255)),
  KEY `LookupListid` (`LookupListid`)
) ENGINE=InnoDB AUTO_INCREMENT=498 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupListItem`
--

LOCK TABLES `LookupListItem` WRITE;
/*!40000 ALTER TABLE `LookupListItem` DISABLE KEYS */;
INSERT INTO `LookupListItem` VALUES (1,'de','Entfernen Sie doppelte Zeilen (RemoveDuplicateLines.com) : Entfernen von doppelten EintrÃ¤ge aus Listen',0,1,'2016-07-31 17:33:01','2016-07-31 18:06:23'),(3,'es','Eliminar lÃ­neas duplicadas (RemoveDuplicateLines.com) : La eliminaciÃ³n de entradas duplicadas de las listas',0,1,'2016-07-31 17:51:45','2016-07-31 18:06:23'),(4,'fr','Supprimer les lignes en double (RemoveDuplicateLines.com) : Retrait entrÃ©es en double Ã  partir de listes',0,1,'2016-07-31 17:59:00','2016-07-31 18:06:23'),(5,'ja','é‡è¤‡è¡Œã‚’å‰Šé™¤ã—ã¦ãã ã•ã„ (RemoveDuplicateLines.com) : ãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,1,'2016-07-31 18:00:17','2016-07-31 18:06:23'),(6,'it','Rimuovere linee duplicate (RemoveDuplicateLines.com) : Rimozione di voci duplicate da liste',0,1,'2016-07-31 18:01:13','2016-07-31 18:06:23'),(7,'nl','Verwijder dubbele lijnen (RemoveDuplicateLines.com) : Het verwijderen van dubbele vermeldingen uit lijsten',0,1,'2016-07-31 18:04:20','2016-07-31 18:06:23'),(8,'pl','UsuÅ„ zduplikowane wiersze (RemoveDuplicateLines.com) : Usuwanie zduplikowane wpisy z list',0,1,'2016-07-31 18:04:20','2016-07-31 18:06:23'),(9,'pt','Remover linhas duplicadas (RemoveDuplicateLines.com) : Remover entradas duplicadas a partir de listas',0,1,'2016-07-31 18:04:49','2016-07-31 18:06:23'),(10,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸ÐµÑÑ ÑÑ‚Ñ€Ð¾ÐºÐ¸ (RemoveDuplicateLines.com) : Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,1,'2016-07-31 18:05:21','2016-07-31 18:06:23'),(11,'tr','yinelenen satÄ±rlarÄ± kaldÄ±rÄ±n (RemoveDuplicateLines.com) : Listeler Ã‡oÄŸalt\'Ä± GiriÅŸleri kaldÄ±rÄ±lÄ±yor',0,1,'2016-07-31 18:06:23','0000-00-00 00:00:00'),(12,'zh','åˆ é™¤é‡å¤çš„çº¿è·¯ (RemoveDuplicateLines.com) : ä»Žåˆ—è¡¨ä¸­åˆ é™¤é‡å¤çš„æ¡ç›®',0,1,'2016-07-31 18:06:23','0000-00-00 00:00:00'),(13,'de','Anleitung',0,2,'2016-07-31 18:11:17','2016-08-02 17:41:20'),(14,'es','Instrucciones',0,2,'2016-08-02 17:36:17','2016-08-02 17:41:20'),(15,'fr','Instructions',0,2,'2016-08-02 17:36:17','2016-08-02 17:41:20'),(16,'ja','æŒ‡ç¤º',0,2,'2016-08-02 17:36:17','2016-08-02 17:41:20'),(17,'it','Istruzioni',0,2,'2016-08-02 17:40:30','2016-08-02 17:41:20'),(18,'nl','Instructies',0,2,'2016-08-02 17:40:30','2016-08-02 17:41:20'),(19,'pl','Instrukcje',0,2,'2016-08-02 17:40:30','2016-08-02 17:41:20'),(20,'pt','InstruÃ§Ãµes',0,2,'2016-08-02 17:40:30','2016-08-02 17:41:20'),(21,'ru','InstrucÈ›iunitr',0,2,'2016-08-02 17:40:31','2016-08-02 17:41:20'),(22,'tr','Talimatlar',0,2,'2016-08-02 17:40:31','2016-08-02 17:41:20'),(23,'zh','è¯´æ˜Ž',0,2,'2016-08-02 17:40:31','2016-08-02 17:41:20'),(24,'de','Verwenden Sie dieses Werkzeug, um doppelte Zeilen aus dem Text-Listen zu entfernen.',0,3,'2016-08-02 17:43:10','2016-08-03 17:44:29'),(25,'es','Utilice esta herramienta para eliminar las lÃ­neas duplicadas de sus listas de texto.',0,3,'2016-08-02 17:43:44','2016-08-03 17:44:29'),(26,'fr','Utilisez cet outil pour supprimer des lignes en double de vos listes de textes.',0,3,'2016-08-02 18:13:23','2016-08-03 17:44:29'),(27,'ja','ã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã®ãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡è¡Œã‚’å‰Šé™¤ã™ã‚‹ã«ã¯ã€ã“ã®ãƒ„ãƒ¼ãƒ«ã‚’ä½¿ç”¨ã—ã¾ã™',0,3,'2016-08-02 20:03:50','2016-08-03 17:44:29'),(28,'it','Utilizzare questo strumento per rimuovere le linee duplicate dalle vostre liste di testo.',0,3,'2016-08-03 17:38:45','2016-08-03 17:44:29'),(29,'nl','Gebruik deze tool om dubbele regels uit uw tekst lijsten te verwijderen.',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(30,'pl','Za pomocÄ… tego narzÄ™dzia do usuwania zduplikowanych wierszy z list tekstowych.',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(31,'pt','Utilize esta ferramenta para remover linhas duplicadas de suas listas de texto.',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(32,'ru','Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐ¹Ñ‚Ðµ ÑÑ‚Ð¾Ñ‚ Ð¸Ð½ÑÑ‚Ñ€ÑƒÐ¼ÐµÐ½Ñ‚ Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð¾Ð² ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ñ‹Ñ… ÑÐ¿Ð¸ÑÐºÐ¾Ð².',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(33,'tr','Metin listelerinden yinelenen satÄ±rlarÄ± kaldÄ±rmak iÃ§in bu aracÄ± kullanÄ±n.',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(34,'zh','ä½¿ç”¨æ­¤å·¥å…·å¯ä»¥ä»Žä½ çš„æ–‡å­—åˆ—è¡¨ä¸­åˆ é™¤é‡å¤çš„è¡Œã€‚',0,3,'2016-08-03 17:44:29','0000-00-00 00:00:00'),(35,'de','Liste entfernen Dubletten aus',0,4,'2016-08-03 17:47:17','2016-08-03 17:55:42'),(36,'es','Enumerar quitar los duplicados de',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(37,'fr','Liste pour supprimer les doublons',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(38,'ja','ã‹ã‚‰é‡è¤‡ã‚’å‰Šé™¤ã™ã‚‹ãŸã‚ã«ãƒªã‚¹ãƒˆã—ã¾ã™',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(39,'it','Elencare per rimuovere i duplicati da',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(40,'nl','Lijst om duplicaten te verwijderen van',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(41,'pl','Lista, aby usunÄ…Ä‡ duplikaty z',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(42,'pt','Lista para remover duplicatas de',0,4,'2016-08-03 17:55:42','0000-00-00 00:00:00'),(43,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹ Ð¸Ð·',0,4,'2016-08-03 17:55:43','0000-00-00 00:00:00'),(44,'tr','GÃ¶nderen Ã§oÄŸaltÄ±r Ã§Ä±karÄ±n iÃ§in listeler',0,4,'2016-08-03 17:55:43','0000-00-00 00:00:00'),(45,'zh','åˆ—è¡¨ä¸­åˆ é™¤é‡å¤é¡¹',0,4,'2016-08-03 17:55:43','0000-00-00 00:00:00'),(46,'de','Liste mit Dubletten bearbeiteter',0,5,'2016-08-04 17:15:07','2016-08-04 17:18:11'),(47,'es','Una lista con Duplicados manipulado',0,5,'2016-08-04 17:15:07','2016-08-04 17:18:11'),(48,'fr','Liste des duplicatas Handled',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(49,'ja','å–æ‰±é‡è¤‡ã—ã¦ä¸€è¦§è¡¨ç¤ºã—ã¾ã™',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(50,'it','Elencare con i duplicati gestite',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(51,'nl','Lijst met duplicaten afgehandeld',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(52,'pl','List z duplikatÃ³w obsÅ‚ugiwane',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(53,'pt','Listar com duplicatas manipulados',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(54,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð°Ð¼Ð¸ Ð¾Ð±Ñ€Ð°Ð±Ð¾Ñ‚Ð°Ð½Ñ‹',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(55,'tr','Kulplu Ã§oÄŸaltÄ±r ile listeleyin',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(56,'zh','ä¸Žå¤„ç†çš„é‡å¤åˆ—å‡º',0,5,'2016-08-04 17:18:11','0000-00-00 00:00:00'),(57,'de','Geben Sie oder kopieren und fÃ¼gen Sie Ihre Liste in diesem Textfeld .',0,6,'2016-08-04 17:37:42','2016-08-04 17:40:53'),(58,'es','Escribir o copiar y pegar su lista en este cuadro de texto.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(59,'fr','Tapez ou copier-coller votre liste dans cette zone de texte.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(60,'ja','ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ã‚ãªãŸã®ãƒªã‚¹ãƒˆã‚’ã‚³ãƒ”ãƒ¼ã‚¢ãƒ³ãƒ‰ãƒšãƒ¼ã‚¹ãƒˆå…¥åŠ›ã—ã¾ã™ã‹ã€‚',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(61,'it','Digitare o copiare e incollare l\'elenco in questa casella di testo.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(62,'nl','Typ of kopieer-en-plak uw lijst in dit tekstvak.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(63,'pl','Wpisz lub skopiuj i wklej swojÄ… listÄ™ w tym polu tekstowym.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(64,'pt','Digite ou copie e cole a sua lista para este caixa de texto.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(65,'ru','Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð»Ð¸ ÑÐºÐ¾Ð¿Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¸ Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ ÑÐ¿Ð¸ÑÐ¾Ðº Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(66,'tr','Bu metin kutusuna listenizi kopyalayÄ±p yapÄ±ÅŸtÄ±rÄ±n ve-veya yazÄ±n.',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(67,'zh','é”®å…¥æˆ–å¤åˆ¶å’Œç²˜è´´æ‚¨çš„æ¸…å•åˆ°è¿™ä¸ªæ–‡æœ¬æ¡†ã€‚',0,6,'2016-08-04 17:40:53','0000-00-00 00:00:00'),(68,'de','Dann ist Ihre Liste mit Duplikate entfernt werden in diesem Textfeld angezeigt.',0,7,'2016-08-04 17:41:49','2016-08-04 17:48:34'),(69,'es','A continuaciÃ³n, la lista de los duplicados eliminado aparecerÃ¡ en este cuadro de texto.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(70,'fr','Ensuite, votre liste avec les doublons supprimÃ©s apparaÃ®tra dans cette zone de texte.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(71,'ja','ãã®å¾Œã€é‡è¤‡ã‚’å‰Šé™¤ã—ã¦ã€ã‚ãªãŸã®ãƒªã‚¹ãƒˆã«ã¯ã€ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«è¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(72,'it','Poi apparirÃ  l\'elenco con i duplicati rimossi in questa casella di testo.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(73,'nl','Dan is uw lijst met duplicaten verwijderd zal verschijnen in dit tekstvak.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(74,'pl','NastÄ™pnie pojawi siÄ™ lista z usuniÄ™tymi duplikatami w polu tekstowym.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(75,'pt','Em seguida, a sua lista com duplicatas removidas aparecerÃ£o nessa caixa de texto.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(76,'ru','Ð¢Ð¾Ð³Ð´Ð° Ð²Ð°Ñˆ ÑÐ¿Ð¸ÑÐ¾Ðº Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð°Ð¼Ð¸ ÑƒÐ´Ð°Ð»ÐµÐ½Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð¶Ð°Ñ‚ÑŒÑÑ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(77,'tr','Sonra kaldÄ±rÄ±lÄ±r Ã§iftleri ile liste bu metin kutusunda belirecektir.',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(78,'zh','ç„¶åŽï¼ŒåŽ»æŽ‰é‡å¤çš„åˆ—è¡¨ä¼šå‡ºçŽ°åœ¨è¯¥æ–‡æœ¬æ¡†ä¸­ã€‚',0,7,'2016-08-04 17:48:35','0000-00-00 00:00:00'),(79,'de','Duplikate entfernen',0,8,'2016-08-04 17:49:23','2016-08-04 18:03:43'),(80,'es','Eliminar duplicados',0,8,'2016-08-04 18:03:43','0000-00-00 00:00:00'),(81,'fr','Supprimer les doublons',0,8,'2016-08-04 18:03:43','0000-00-00 00:00:00'),(82,'ja','é‡è¤‡ã‚’å‰Šé™¤ã—ã¦ãã ã•ã„',0,8,'2016-08-04 18:03:43','0000-00-00 00:00:00'),(83,'it','Rimuovi duplicati',0,8,'2016-08-04 18:03:43','0000-00-00 00:00:00'),(84,'nl','Duplicaten verwijderen',0,8,'2016-08-04 18:03:43','0000-00-00 00:00:00'),(85,'pl','UsuÅ„ duplikaty',0,8,'2016-08-04 18:03:44','0000-00-00 00:00:00'),(86,'pt','Remover Duplicatas',0,8,'2016-08-04 18:03:44','0000-00-00 00:00:00'),(87,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹',0,8,'2016-08-04 18:03:44','0000-00-00 00:00:00'),(88,'tr','Ã‡oÄŸaltÄ±r Ã§Ä±karÄ±n',0,8,'2016-08-04 18:03:44','0000-00-00 00:00:00'),(89,'zh','åˆ é™¤é‡å¤',0,8,'2016-08-04 18:03:44','0000-00-00 00:00:00'),(90,'de','Duplikate entfernen',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(91,'es','Eliminar duplicados',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(92,'fr','Supprimer les doublons',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(93,'ja','é‡è¤‡ã‚’å‰Šé™¤',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(94,'it','Rimuovi duplicati',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(95,'nl','Verwijder Duplicaten',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(96,'pl','UsuÅ„ duplikaty',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(97,'pt','Remover duplicatas',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(98,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(99,'tr','Yinelenenleri KaldÄ±r',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(100,'zh','åˆ é™¤é‡å¤',0,9,'2016-08-05 14:03:54','0000-00-00 00:00:00'),(101,'de','Duplikate entfernen aus der ersten Liste und legen Sie sie in die zweite Liste',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(102,'es','Eliminar duplicados de la primera lista y los situarÃ¡ en la segunda lista',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(103,'fr','Supprimer les doublons de la premiÃ¨re liste et les placer dans la deuxiÃ¨me liste',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(104,'ja','æœ€åˆã®ãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã‚’å‰Šé™¤ã—ã€ç¬¬2ã®ãƒªã‚¹ãƒˆã«ãã‚Œã‚‰ã‚’é…ç½®ã—ã¾ã™',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(105,'it','Rimuovi duplicati dal primo elenco e metterli nella seconda lista',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(106,'nl','Duplicaten verwijderen uit de eerste lijst en plaats ze in de tweede lijst',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(107,'pl','UsuÅ„ duplikaty z pierwszej listy i umieÅ›ciÄ‡ je na drugÄ… listÄ™',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(108,'pt','Remover Duplicatas da primeira lista e colocÃ¡-los na segunda lista',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(109,'ru','Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð¾Ð² Ð¸Ð· Ð¿ÐµÑ€Ð²Ð¾Ð³Ð¾ ÑÐ¿Ð¸ÑÐºÐ° Ð¸ Ð¿Ð¾Ð¼ÐµÑÑ‚Ð¸Ñ‚ÑŒ Ð¸Ñ… Ð² Ð²Ñ‚Ð¾Ñ€Ð¾Ð¹ ÑÐ¿Ð¸ÑÐ¾Ðº',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(110,'tr','Ä°lk Listesinden Ã§oÄŸaltÄ±r Ã§Ä±karÄ±n ve Ä°kinci Listesine iÃ§ine yerleÅŸtirin',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(111,'zh','ä»Žç¬¬ä¸€ä¸ªåˆ—è¡¨ä¸­åˆ é™¤é‡å¤é¡¹ï¼Œå¹¶å°†å…¶æ”¾å…¥ç¬¬äºŒä¸ªåˆ—è¡¨',0,10,'2016-08-05 14:06:50','0000-00-00 00:00:00'),(112,'de','Finden Sie Dubletten',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(113,'es','encontrar Duplicados',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(114,'fr','Rechercher les doublons',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(115,'ja','é‡è¤‡ã‚’æŽ¢ã—ã¾ã™',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(116,'it','Trova duplicati',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(117,'nl','Vind duplicaten',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(118,'pl','ZnajdÅº duplikaty',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(119,'pt','Localizar duplicatas',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(120,'ru','ÐÐ°Ð¹Ñ‚Ð¸ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(121,'tr','Ã§oÄŸaltÄ±r bul',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(122,'zh','æŸ¥æ‰¾é‡å¤',0,11,'2016-08-05 14:09:21','0000-00-00 00:00:00'),(123,'de','Finden Sie Dubletten aus der ersten Liste und legen Sie sie in die zweite Liste',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(124,'es','Encontrar Duplicados de la primera lista y los situarÃ¡ en la segunda lista',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(125,'fr','Rechercher les doublons dans la premiÃ¨re liste et les placer dans la deuxiÃ¨me liste',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(126,'ja','æœ€åˆã®ãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã™ã‚‹ã‚‚ã®ã‚’è¦‹ã¤ã‘ã€ç¬¬2ã®ãƒªã‚¹ãƒˆã«ãã‚Œã‚‰ã‚’é…ç½®ã—ã¾ã™',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(127,'it','Trova duplicati dal primo elenco e metterli nella seconda lista',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(128,'nl','Vind duplicaten van de eerste lijst en plaats ze in de tweede lijst',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(129,'pl','ZnajdÅº duplikaty z pierwszej listy i umieÅ›ciÄ‡ je na drugÄ… listÄ™',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(130,'pt','Localizar duplicatas na primeira lista e colocÃ¡-los na segunda lista',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(131,'ru','ÐÐ°Ð¹Ñ‚Ð¸ Ð”ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹ Ð¸Ð· Ð¿ÐµÑ€Ð²Ð¾Ð³Ð¾ ÑÐ¿Ð¸ÑÐºÐ° Ð¸ Ð¿Ð¾Ð¼ÐµÑÑ‚Ð¸Ñ‚ÑŒ Ð¸Ñ… Ð² Ð²Ñ‚Ð¾Ñ€Ð¾Ð¹ ÑÐ¿Ð¸ÑÐ¾Ðº',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(132,'tr','Ä°lk Listesi\'nden Ã§oÄŸaltÄ±r bulun ve Ä°kinci Listesine iÃ§ine yerleÅŸtirin',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(133,'zh','ä»Žç¬¬ä¸€ä¸ªåˆ—è¡¨ä¸­æŸ¥æ‰¾é‡å¤ï¼Œå¹¶å°†å…¶æ”¾å…¥ç¬¬äºŒä¸ªåˆ—è¡¨',0,12,'2016-08-05 14:12:10','0000-00-00 00:00:00'),(134,'de','Trim Leerzeichen aus Objekte in der Liste',0,13,'2016-08-05 14:14:46','0000-00-00 00:00:00'),(135,'es','Recortar los espacios en blanco de los elementos en la lista',0,13,'2016-08-05 14:14:46','0000-00-00 00:00:00'),(136,'fr','Coupez Whitespace Ã  partir des Ã©lÃ©ments dans la liste',0,13,'2016-08-05 14:14:46','0000-00-00 00:00:00'),(137,'ja','ãƒªã‚¹ãƒˆã®é …ç›®ã‹ã‚‰ç©ºç™½ã‚’ãƒˆãƒªãƒ ',0,13,'2016-08-05 14:14:46','0000-00-00 00:00:00'),(138,'it','Trim Gli spazi bianchi da voci di elenco',0,13,'2016-08-05 14:14:46','0000-00-00 00:00:00'),(139,'nl','Trim Whitespace van Items in List',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(140,'pl','PrzyciÄ…Ä‡ biaÅ‚e znaki od pozycji na liÅ›cie',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(141,'pt','Aparar espaÃ§o em branco do itens na lista',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(142,'ru','ÐžÐ±Ñ€ÐµÐ¶ÑŒÑ‚Ðµ Whitespace Ð¸Ð· ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð¾Ð² ÑÐ¿Ð¸ÑÐºÐ°',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(143,'tr','Listesinde Ã–ÄŸeler Whitespace Trim',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(144,'zh','ä»Žåˆ—è¡¨é¡¹ä¿®å‰ªç©ºç™½',0,13,'2016-08-05 14:14:47','0000-00-00 00:00:00'),(145,'de','Diese Option wird entfernen Starten und Leerzeichen in der sich aus jedem Element Hinter, sortierte Liste.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(146,'es','Esta opciÃ³n eliminarÃ¡ el arranque y arrastrar caracteres de espacio en blanco entre cada elemento de la resultante, lista ordenada.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(147,'fr','Cette option va supprimer le dÃ©marrage et l\'arriÃ¨re des caractÃ¨res blancs de chaque Ã©lÃ©ment de la rÃ©sultante, liste triÃ©e.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(148,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã€é–‹å§‹ã—ã€å¾—ã‚‰ã‚ŒãŸå„é …ç›®ã‹ã‚‰ç©ºç™½æ–‡å­—ã‚’æœ«å°¾ã«å‰Šé™¤ã•ã‚Œã€ãƒªã‚¹ãƒˆã‚’ä¸¦ã¹æ›¿ãˆã€‚',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(149,'it','Questa opzione rimuoverÃ  di partenza e finali caratteri di spazio vuoto da ogni elemento della risultante, lista ordinata.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(150,'nl','Deze optie zal verwijderen starten en witruimte karakters van elk item in de resulterende, gesorteerd lijst.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(151,'pl','Ta opcja usunie rozpoczÄ™ciem i koÅ„cowe biaÅ‚e znaki z kaÅ¼dego elementu w wynikowym, lista posortowana.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(152,'pt','Esta opÃ§Ã£o irÃ¡ remover comeÃ§ando e Ã  direita espaÃ§os em branco de cada item na resultante, lista classificada.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(153,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð·Ð°Ð¿ÑƒÑÐº Ð¸ ÐºÐ¾Ð½ÐµÑ‡Ð½Ñ‹Ðµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ ÑÐ¸Ð¼Ð²Ð¾Ð»Ð¾Ð² Ð¸Ð· ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð² Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð¸Ñ€ÑƒÑŽÑ‰ÐµÐ¼, ÑÐ¾Ñ€Ñ‚Ð¸Ñ€ÑƒÐµÑ‚ÑÑ ÑÐ¿Ð¸ÑÐ¾Ðº.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(154,'tr','Bu seÃ§enek, baÅŸlangÄ±Ã§ ve sonuÃ§ olarak her Ã¶ÄŸenin beyaz boÅŸluk karakterleri sondaki kaldÄ±rÄ±r, liste sÄ±ralanÄ±r.',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(155,'zh','æ­¤é€‰é¡¹å°†åˆ é™¤ï¼Œå¹¶å¼€å§‹åœ¨ç”±æ­¤äº§ç”Ÿçš„æ¯ä¸ªé¡¹ç›®ç»“å°¾çš„ç©ºç™½å­—ç¬¦ï¼ŒæŽ’åºåˆ—è¡¨ã€‚',0,14,'2016-08-05 14:17:30','0000-00-00 00:00:00'),(156,'de','Zuhause',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(157,'es','Casa',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(158,'fr','Accueil',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(159,'ja','ãƒ›ãƒ¼ãƒ ',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(160,'it','Casa',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(161,'nl','Huis',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(162,'pl','Dom',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(163,'pt','Casa',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(164,'ru','Ð“Ð»Ð°Ð²Ð½Ð°Ñ',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(165,'tr','Ev',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(166,'zh','å®¶',0,15,'2016-08-05 14:26:27','0000-00-00 00:00:00'),(167,'de','Etwa',0,16,'2016-08-05 14:35:30','0000-00-00 00:00:00'),(168,'es','Acerca de',0,16,'2016-08-05 14:35:30','0000-00-00 00:00:00'),(169,'fr','Sur',0,16,'2016-08-05 14:35:30','0000-00-00 00:00:00'),(170,'ja','ç´„',0,16,'2016-08-05 14:35:30','0000-00-00 00:00:00'),(171,'it','Di',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(172,'nl','Over',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(173,'pl','O',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(174,'pt','Sobre',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(175,'ru','ÐžÐºÐ¾Ð»Ð¾',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(176,'tr','hakkÄ±nda',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(177,'zh','å…³äºŽ',0,16,'2016-08-05 14:35:31','0000-00-00 00:00:00'),(178,'de','Kontakt',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(179,'es','Contacto',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(180,'fr','Contact',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(181,'ja','æŽ¥è§¦',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(182,'it','contatto',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(183,'nl','Contact',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(184,'pl','Kontakt',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(185,'pt','Contato',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(186,'ru','ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(187,'tr','Temas',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(188,'zh','è”ç³»',0,17,'2016-08-05 14:41:45','0000-00-00 00:00:00'),(189,'de','Weitere Informationen Ã¼ber uns',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(190,'es','MÃ¡s informaciÃ³n sobre nosotros',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(191,'fr','Plus d\'informations sur nous',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(192,'ja','ä¼šç¤¾ã®è©³ç´°æƒ…å ±',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(193,'it','Altre informazioni Chi siamo',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(194,'nl','Meer informatie over ons',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(195,'pl','WiÄ™cej informacji o nas',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(196,'pt','Mais informaÃ§Ãµes Sobre nÃ³s',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(197,'ru','Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ð¾ Ð½Ð°Ñ',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(198,'tr','HakkÄ±mÄ±zda Daha Fazla Bilgi',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(199,'zh','æ›´å¤šä¿¡æ¯å…³äºŽæˆ‘ä»¬',0,18,'2016-08-06 14:43:41','0000-00-00 00:00:00'),(200,'de','<p class=\"margin-0px\">Also, Sie wollten einige doppelte Linien zu entfernen, nicht wahr? Das ist, was Sie auf dieser Seite gebracht, ist es nicht?</p><br><p class=\"margin-0px\">Gut, ich hoffe, es half.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(201,'es','<p class=\"margin-0px\">Por lo tanto, querÃ­a suprimir algunas lÃ­neas duplicadas, Â¿verdad? Eso es lo que llevÃ³ a que a esta pÃ¡gina, Â¿verdad?</p><br><p class=\"margin-0px\">Bueno, espero que ayudÃ³.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(202,'fr','<p class=\"margin-0px\">Donc, vous vouliez supprimer certaines lignes en double, Ã  droite? VoilÃ  ce qui vous Ã  cette page, est-ce pas?</p><br><p class=\"margin-0px\">Bon, je l\'espÃ¨re, il a aidÃ©.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(203,'ja','<p class=\"margin-0px\">ã ã‹ã‚‰ã€ã‚ãªãŸã¯å³ã€ã„ãã¤ã‹ã®é‡è¤‡è¡Œã‚’å‰Šé™¤ã—ãŸã„ã§ã™ã‹ï¼Ÿãã‚Œã¯ãã‚Œã¯ã€ã“ã®ãƒšãƒ¼ã‚¸ã«ã‚ãªãŸã«ã‚‚ãŸã‚‰ã—ãŸã‚‚ã®ã¯ãªã„ã§ã™ã­ã€‚</p><br><p class=\"margin-0px\">è‰¯ã„ã€ç§ã¯ãã‚ŒãŒåŠ©ã‘ã‚’é¡˜ã£ã¦ã„ã¾ã™ã€‚</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(204,'it','<p class=\"margin-0px\">Quindi, si voleva eliminare alcune linee duplicate, giusto? Questo Ã¨ quello che ha portato a voi a questa pagina, non Ã¨ vero?</p><br><p class=\"margin-0px\">Bene, spero che lo ha aiutato.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(205,'nl','<p class=\"margin-0px\">Dus, je wilde een aantal dubbele lijnen te verwijderen, toch? Dat is wat u aangeboden op deze pagina, is het niet?</p><br><p class=\"margin-0px\">Goed, ik hoop dat het hielp.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(206,'pl','<p class=\"margin-0px\">WiÄ™c chciaÅ‚ usunÄ…Ä‡ niektÃ³re zduplikowane linie, prawda? To, co przedstawia PaÅ„stwu do tej strony, prawda?</p><br><p class=\"margin-0px\">Dobra, mam nadziejÄ™, Å¼e pomogÅ‚o.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(207,'pt','<p class=\"margin-0px\">EntÃ£o, vocÃª queria remover algumas linhas duplicadas, certo? Isso Ã© o que trouxe vocÃª para esta pÃ¡gina, nÃ£o Ã©?</p><br><p class=\"margin-0px\">Bom, espero que ajudou.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(208,'ru','<p class=\"margin-0px\">Ð˜Ñ‚Ð°Ðº, Ð²Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸ÐµÑÑ ÑÑ‚Ñ€Ð¾ÐºÐ¸, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸? Ð­Ñ‚Ð¾ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ð¿Ñ€Ð¸Ñ…Ð¾Ð´Ð¸Ñ‚ Ðº Ð²Ð°Ð¼ Ð½Ð° ÑÑ‚Ð¾Ð¹ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸?</p><br><p class=\"margin-0px\">Ð¥Ð¾Ñ€Ð¾ÑˆÐ¾, Ñ Ð½Ð°Ð´ÐµÑŽÑÑŒ, Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ð³Ð»Ð¾.</p>',0,19,'2016-08-06 14:48:48','2016-08-22 17:33:23'),(209,'tr','<p class=\"margin-0px\">Yani, doÄŸru, bazÄ± yinelenen satÄ±rlarÄ± kaldÄ±rmak istedi? Yani, bu sayfaya getirdi deÄŸil mi?</p><br><p class=\"margin-0px\">Ä°yi, ben yardÄ±mcÄ± umuyoruz.</p>',0,19,'2016-08-06 14:48:49','2016-08-22 17:33:23'),(210,'zh','<p class=\"margin-0px\">æ‰€ä»¥ï¼Œä½ æƒ³åŽ»æŽ‰ä¸€äº›é‡å¤çš„è¡Œï¼Œå¯¹ä¸å¯¹ï¼Ÿè¿™å°±æ˜¯å¸¦ç»™ä½ è¿™ä¸ªé¡µé¢ï¼Œä¸æ˜¯å—ï¼Ÿ</p><br><p class=\"margin-0px\">å¥½ï¼Œæˆ‘å¸Œæœ›å®ƒå¸®åŠ©ã€‚</p>',0,19,'2016-08-06 14:48:49','2016-08-22 17:33:23'),(211,'de','Ich entfernte so viele doppelte Linien heute!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(212,'es','He quitado tantas lÃ­neas duplicadas hoy!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(213,'fr','Je l\'ai enlevÃ© tant de lignes en double aujourd\'hui!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(214,'ja','ä»Šæ—¥ã¯éžå¸¸ã«å¤šãã®é‡è¤‡è¡Œã‚’å‰Šé™¤ã—ã¾ã—ãŸï¼',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(215,'it','Ho rimosso tante linee duplicate oggi!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(216,'nl','Ik verwijderde zo veel dubbele lijnen vandaag!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(217,'pl','UsunÄ…Å‚em tak wiele zduplikowanych wierszy juÅ¼ dziÅ›!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(218,'pt','Tirei tantas linhas duplicadas hoje!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(219,'ru','Ð¯ ÑƒÐ´Ð°Ð»Ð¸Ð» Ñ‚Ð°Ðº Ð¼Ð½Ð¾Ð³Ð¾ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ ÑÑ‚Ñ€Ð¾Ðº ÑÐµÐ³Ð¾Ð´Ð½Ñ!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(220,'tr','BugÃ¼n pek Ã§ok yinelenen satÄ±rlarÄ± kaldÄ±rÄ±ldÄ±!',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(221,'zh','ä»Šå¤©æˆ‘åˆ é™¤è¿™ä¹ˆå¤šçš„é‡å¤è¡Œï¼',0,20,'2016-08-06 17:55:42','0000-00-00 00:00:00'),(222,'de','Entfernen Ãœber doppelte Zeilen: Entfernen von doppelten EintrÃ¤gen aus Listen',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(223,'es','Sobre Quitar lÃ­neas duplicadas: EliminaciÃ³n de las entradas duplicadas de las Listas',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(224,'fr','A propos de supprimer les lignes en double: Retrait des entrÃ©es en double Ã  partir de listes',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(225,'ja','é‡è¤‡è¡Œã‚’å‰Šé™¤ã™ã‚‹ï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(226,'it','A proposito di rimuovere le linee duplicati: Rimuovere voci duplicate da liste',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(227,'nl','Over Verwijder dubbele lijnen: Het verwijderen van dubbele vermeldingen uit lijsten',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(228,'pl','O UsuÅ„ powtarzajÄ…ce siÄ™ linie: Usuwanie zduplikowane wpisy z list',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(229,'pt','Sobre remove as linhas duplicadas: Remover entradas duplicadas a partir de listas',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(230,'ru','Ðž Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸ÐµÑÑ ÑÑ‚Ñ€Ð¾ÐºÐ¸: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(231,'tr','HakkÄ±nda Yinelenen SatÄ±rlarÄ± KaldÄ±r: Listeler Ã‡oÄŸalt\'Ä± Girdileri KaldÄ±rma',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(232,'zh','å…³äºŽåˆ é™¤é‡å¤è¡Œï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,21,'2016-08-06 18:00:53','0000-00-00 00:00:00'),(233,'de','Namen entfernen doppelte Zeilen: Entfernen von doppelten EintrÃ¤gen aus Listen',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(234,'es','PÃ³ngase en contacto con las lÃ­neas duplicadas Eliminar: Eliminar las entradas duplicadas de las Listas',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(235,'fr','Contact, enlever les lignes en double: Retrait des entrÃ©es en double Ã  partir de listes',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(236,'ja','é‡è¤‡è¡Œã‚’å‰Šé™¤ã™ã‚‹é€£çµ¡å…ˆï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(237,'it','Contatto rimuovere le righe duplicate: Rimuovere voci duplicate da liste',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(238,'nl','Neem Verwijder dubbele lijnen: Het verwijderen van dubbele vermeldingen uit lijsten',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(239,'pl','Kontakt UsuÅ„ powtarzajÄ…ce siÄ™ linie: Usuwanie zduplikowane wpisy z list',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(240,'pt','Contato remove as linhas duplicadas: Remover entradas duplicadas a partir de listas',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(241,'ru','ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð½Ð°Ñ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸ÐµÑÑ ÑÑ‚Ñ€Ð¾ÐºÐ¸: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(242,'tr','Yinelenen SatÄ±rlarÄ± KaldÄ±r Ä°letiÅŸim: Listeler Ã‡oÄŸalt\'Ä± Girdileri KaldÄ±rma',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(243,'zh','è”ç³»æ–¹å¼åˆ é™¤é‡å¤è¡Œï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,23,'2016-08-06 18:05:28','0000-00-00 00:00:00'),(244,'de','Kontaktiere uns',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(245,'es','ContÃ¡ctenos',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(246,'fr','Contactez nous',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(247,'ja','ãŠå•ã„åˆã‚ã›',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(248,'it','Contattaci',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(249,'nl','Neem contact met ons op',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(250,'pl','Skontaktuj siÄ™ z nami',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(251,'pt','Entre Em Contato Conosco',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(252,'ru','Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(253,'tr','Bizimle iletiÅŸime geÃ§in',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(254,'zh','è”ç³»æˆ‘ä»¬',0,24,'2016-08-06 18:08:10','0000-00-00 00:00:00'),(255,'de','Site Creator',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(256,'es','Creador del sitio',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(257,'fr','site Creator',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(258,'ja','ã‚µã‚¤ãƒˆä½œæˆè€…',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(259,'it','Creatore del sito',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(260,'nl','Site Creator',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(261,'pl','TwÃ³rca strony',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(262,'pt','Criador do site',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(263,'ru','Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÐµÐ»ÑŒ ÑÐ°Ð¹Ñ‚Ð°',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(264,'tr','Site Creator',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(265,'zh','ç½‘ç«™çš„åˆ›å»ºè€…',0,25,'2016-08-06 18:11:23','0000-00-00 00:00:00'),(266,'de','Webseite Erstellt am',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(267,'es','Sitio desarrollado en',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(268,'fr','Site CrÃ©Ã© le',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(269,'ja','ã‚µã‚¤ãƒˆã«ã¯ã€ä¸Šã§ä½œæˆã—ã¾ã™',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(270,'it','Sito Creato il',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(271,'nl','Site Gemaakt op',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(272,'pl','Strona stworzona dniu',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(273,'pt','Site criado em',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(274,'ru','Ð¡Ð°Ð¹Ñ‚ ÑÐ¾Ð·Ð´Ð°Ð½ Ð½Ð°',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(275,'tr','Site Ã¼zerinde dÃ¼zenlendi',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(276,'zh','ç½‘ç«™åˆ›å»ºæ—¶é—´',0,26,'2016-08-06 18:14:08','0000-00-00 00:00:00'),(277,'de','Kontakt Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(278,'es','Contacto Creador',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(279,'fr','Contactez Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(280,'ja','é€£çµ¡ã‚¯ãƒªã‚¨ãƒ¼ã‚¿ãƒ¼',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(281,'it','Contatto Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(282,'nl','Contact Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(283,'pl','Kontakt Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(284,'pt','Contact Creator',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(285,'ru','ÐšÐ°Ðº ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð¢Ð²Ð¾Ñ€Ñ†Ð¾Ð¼',0,27,'2016-08-06 18:18:09','0000-00-00 00:00:00'),(286,'tr','Ä°letiÅŸim OluÅŸturan',0,27,'2016-08-06 18:18:10','0000-00-00 00:00:00'),(287,'zh','è”ç³»é€ ç‰©ä¸»',0,27,'2016-08-06 18:18:10','0000-00-00 00:00:00'),(288,'de','Datei Roboter fÃ¼r Remove Duplicate Linien: Entfernen von doppelten EintrÃ¤ge aus Listen',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(289,'es','Los robots de archivo para las lÃ­neas duplicadas eliminar los siguientes: EliminaciÃ³n de entradas duplicadas de las Listas',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(290,'fr','Robots de fichiers Pour supprimer les doublons Lignes: Retrait entrÃ©es en double Ã  partir de listes',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(291,'ja','ãƒ­ãƒœãƒƒãƒˆã¯å‰Šé™¤é‡è¤‡è¡Œã®ãƒ•ã‚¡ã‚¤ãƒ«ï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(292,'it','I robot dei file per rimuovere le linee duplicate: Rimuovere voci duplicate da liste',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(293,'nl','Robots-bestand Voor Remove Duplicate Lines: Het verwijderen van dubbele vermeldingen uit lijsten',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(294,'pl','Roboty plikÃ³w dla usuwanie linii Duplikat: Usuwanie zduplikowane wpisy z list',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(295,'pt','Robots arquivo Para linhas duplicadas Remover: Remover entradas duplicadas a partir de listas',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(296,'ru','Ð Ð¾Ð±Ð¾Ñ‚Ñ‹ Ñ„Ð°Ð¹Ð» Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð¾Ð² ÑÑ‚Ñ€Ð¾Ðº: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(297,'tr','Robotlar KaldÄ±r Duplicate HatlarÄ± Ä°Ã§in Dosya: Listesinden yinelenen girdileri kaldÄ±rÄ±lÄ±yor',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(298,'zh','æœºå™¨äººæ–‡ä»¶åˆ é™¤é‡å¤çš„çº¿è·¯ï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,28,'2016-08-08 17:59:40','0000-00-00 00:00:00'),(299,'de','Dies ist die fÃ¼r Menschen lesbare Version unserer robots.txt-Datei. Die <a href=\"/robots.txt\">Robots.txt File</a> ist, was tatsÃ¤chlich Suchmaschinen kriechen. Eine alternative <a href=\"/robots.xml\">Robots.xml File</a> hat auch zur VerfÃ¼gung gestellt, wenn Sie etwas mehr maschinenlesbar mÃ¼ssen. Die XML-Version hat auch eine <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(300,'es','Esta es la versiÃ³n legible por humanos de nuestro archivo robots.txt. El <a href=\"/robots.txt\">Robots.txt File</a> es lo que los motores de bÃºsqueda reales se arrastran. Una alternativa <a href=\"/robots.xml\">Robots.xml File</a> Se ha previsto tambiÃ©n que si necesitas algo mÃ¡s legible por mÃ¡quina. La versiÃ³n XML tambiÃ©n tiene una <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(301,'fr','Ceci est la version lisible par l\'homme de notre fichier robots.txt. Le <a href=\"/robots.txt\">Robots.txt File</a> est ce que les moteurs de recherche rÃ©els vont parcourir. Un supplÃ©ant <a href=\"/robots.xml\">Robots.xml File</a> a Ã©galement Ã©tÃ© fourni si vous avez besoin quelque chose de plus lisible par machine. La version XML a Ã©galement un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(302,'ja','ã“ã‚ŒãŒç§ãŸã¡ã®robots.txtãƒ•ã‚¡ã‚¤ãƒ«ã®äººé–“ãŒèª­ã‚ã‚‹ãƒãƒ¼ã‚¸ãƒ§ãƒ³ã§ã™ã€‚ <a href=\"/robots.txt\">Robots.txt File</a>ã¯ã€å®Ÿéš›ã®æ¤œç´¢ã‚¨ãƒ³ã‚¸ãƒ³ãŒã‚¯ãƒ­ãƒ¼ãƒ«ã•ã‚Œã¾ã™ã‚‚ã®ã§ã™ã€‚ã‚ãªãŸãŒä½•ã‹ã‚’è¤‡æ•°ã®æ©Ÿæ¢°å¯èª­ãŒå¿…è¦ãªå ´åˆã®ä»£æ›¿ã¯<a href=\"/robots.xml\">Robots.xml File</a>ã‚‚æä¾›ã•ã‚Œã¦ã„ã¾ã™ã€‚ XMLãƒãƒ¼ã‚¸ãƒ§ãƒ³ã‚‚<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã‚’æŒã£ã¦ã„ã¾ã™ã€‚',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(303,'it','Questa Ã¨ la versione leggibile del nostro file robots.txt. Il <a href=\"/robots.txt\">Robots.txt File</a> Ã¨ quello che effettivamente i motori di ricerca esegue la scansione. Un supplente <a href=\"/robots.xml\">Robots.xml File</a> Ã¨ stato anche fornito se avete bisogno di qualcosa di piÃ¹ leggibile dalla macchina. La versione XML ha anche un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(304,'nl','Dit is de leesbare versie van onze robots.txt bestand. De <a href=\"/robots.txt\">Robots.txt File</a> is wat de werkelijke zoekmachines zullen kruipen. Een alternatieve <a href=\"/robots.xml\">Robots.xml File</a> is ook voorzien als je iets meer machine leesbare nodig. De XML-versie heeft ook een <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(305,'pl','Ta wersja jest czytelny dla czÅ‚owieka naszego pliku robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Jest to, co rzeczywiste wyszukiwarek bÄ™dzie indeksowaÄ‡. Alternatywny <a href=\"/robots.xml\">Robots.xml File</a> zostaÅ‚y przekazane, jeÅ›li potrzebujesz czegoÅ› wiÄ™cej do odczytu maszynowego. Wersja XML ma rÃ³wnieÅ¼ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(306,'pt','Esta Ã© a versÃ£o legÃ­vel do nosso arquivo robots.txt. O <a href=\"/robots.txt\">Robots.txt File</a> Ã© o que os motores de busca reais irÃ¡ rastrear. Uma alternativa <a href=\"/robots.xml\">Robots.xml File</a> tambÃ©m foi fornecido se vocÃª precisa de algo mais legÃ­vel por mÃ¡quina. A versÃ£o XML tambÃ©m tem um <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(307,'ru','Ð­Ñ‚Ð¾ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº-ÑÑ‡Ð¸Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð²ÐµÑ€ÑÐ¸Ñ Ð½Ð°ÑˆÐµÐ³Ð¾ Ñ„Ð°Ð¹Ð»Ð° robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Ð¯Ð²Ð»ÑÐµÑ‚ÑÑ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ñ„Ð°ÐºÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ðµ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ ÑÐºÐ°Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ. ÐÐ»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¼ <a href=\"/robots.xml\">Robots.xml File</a> Ñ‚Ð°ÐºÐ¶Ðµ Ð¿Ñ€Ð¸ ÑƒÑÐ»Ð¾Ð²Ð¸Ð¸, ÐµÑÐ»Ð¸ Ð²Ð°Ð¼ Ð½ÑƒÐ¶Ð½Ð¾ Ñ‡Ñ‚Ð¾-Ñ‚Ð¾ Ð±Ð¾Ð»ÐµÐµ Ð¼Ð°ÑˆÐ¸Ð½Ð¾Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼ÑƒÑŽ. Ð’ÐµÑ€ÑÐ¸Ñ XML Ñ‚Ð°ÐºÐ¶Ðµ Ð¸Ð¼ÐµÐµÑ‚ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(308,'tr','Bu bizim robots.txt dosyanÄ±zÄ±n insan tarafÄ±ndan okunabilir sÃ¼rÃ¼mÃ¼dÃ¼r. <a href=\"/robots.txt\">Robots.txt File</a> GerÃ§ek arama motorlarÄ± tarama budur. Bir ÅŸey daha makine tarafÄ±ndan okunabilir gerekirse alternatif <a href=\"/robots.xml\">Robots.xml File</a> da saÄŸlanmÄ±ÅŸtÄ±r. XML versiyonu da bir <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a> vardÄ±r.',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(309,'zh','è¿™æ˜¯æˆ‘ä»¬çš„robots.txtæ–‡ä»¶çš„äººç±»å¯è¯»çš„ç‰ˆæœ¬ã€‚åœ¨<a href=\"/robots.txt\">Robots.txt File</a>æ˜¯å®žé™…çš„æœç´¢å¼•æ“Žå°†æŠ“å–ã€‚å¦ä¸€ç§<a href=\"/robots.xml\">Robots.xml File</a>ï¼Œå¦‚æžœä½ éœ€è¦æ›´å¤šçš„ä¸œè¥¿æœºå™¨å¯è¯»ä¹Ÿæœ‰è§„å®šã€‚ XMLç‰ˆæœ¬ä¹Ÿæœ‰<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã€‚',0,29,'2016-08-08 18:04:47','2016-08-08 18:12:07'),(310,'de','Sitemap fÃ¼r RemoveDuplicateLines.com: Entfernen von doppelten EintrÃ¤gen aus Listen',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(311,'es','Mapa del sitio de RemoveDuplicateLines.com: EliminaciÃ³n de las entradas duplicadas de las Listas',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(312,'fr','Plan du site pour RemoveDuplicateLines.com: Retrait des entrÃ©es en double Ã  partir de listes',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(313,'ja','RemoveDuplicateLines.comã®ãŸã‚ã®ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(314,'it','Mappa del sito per RemoveDuplicateLines.com: Rimozione di voci duplicate da liste',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(315,'nl','Sitemap voor RemoveDuplicateLines.com: Het verwijderen van dubbele vermeldingen uit lijsten',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(316,'pl','Mapa dla RemoveDuplicateLines.com: Usuwanie zduplikowane wpisy z list',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(317,'pt','Sitemap para RemoveDuplicateLines.com: Remover entradas duplicadas a partir de listas',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(318,'ru','ÐšÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð° Ð´Ð»Ñ RemoveDuplicateLines.com: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(319,'tr','RemoveDuplicateLines.com iÃ§in Site HaritasÄ±: Listesinden yinelenen Girdileri KaldÄ±rma',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(320,'zh','ç½‘ç«™åœ°å›¾ä¸ºRemoveDuplicateLines.comï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,30,'2016-08-09 17:24:47','0000-00-00 00:00:00'),(321,'de','Dies ist die Site-Map. Sie finden hier eine Liste von jeder Seite auf dieser Website zu finden. Die <a href=\"/sitemap.xml\">XML Sitemap</a> und ein <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sind ebenfalls verfÃ¼gbar, sowie ein <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(322,'es','Este es el mapa del sitio. Usted encontrarÃ¡ una lista de todas las pÃ¡ginas de este sitio aquÃ­. El <a href=\"/sitemap.xml\">XML Sitemap</a> y un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> tambiÃ©n estÃ¡n disponibles, asÃ­ como un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(323,'fr','Ceci est le plan du site. Vous trouverez une liste de chaque page sur ce site ici. Le <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> et sont Ã©galement disponibles, ainsi qu\'un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(324,'ja','ã“ã‚Œã¯ã€ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã§ã™ã€‚ã‚ãªãŸã¯ã“ã“ã«ã“ã®ã‚µã‚¤ãƒˆä¸Šã®ã™ã¹ã¦ã®ãƒšãƒ¼ã‚¸ã®ä¸€è¦§ãŒã‚ã‚Šã¾ã™ã€‚ <a href=\"/sitemap.xml\">XML Sitemap</a>ã¨<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ã‚‚åˆ©ç”¨ã§ãã‚‹ã ã‘ã§ãªãã€<a href=\"/sitemap.txt\">TXT Sitemap</a>ã§ã™ã€‚',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(325,'it','Questa Ã¨ la mappa del sito. Troverete un elenco di ogni pagina di questo sito qui. Il <a href=\"/sitemap.xml\">XML Sitemap</a> e un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sono disponibili, cosÃ¬ come un <a href=\"/sitemap.txt\">TXT Sitemap</a> anche.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(326,'nl','Dit is de site map. U ziet een lijst van alle pagina\'s op deze site hier. De <a href=\"/sitemap.xml\">XML Sitemap</a> en een <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> zijn ook beschikbaar, evenals een <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(327,'pl','Jest to mapa serwisu. Znajdziesz tu listÄ™ wszystkich stron na tej stronie tutaj. <a href=\"/sitemap.xml\">XML Sitemap</a> I <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> dostÄ™pne, jak rÃ³wnieÅ¼ <a href=\"/sitemap.txt\">TXT Sitemap</a> rÃ³wnieÅ¼.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(328,'pt','Este Ã© o mapa do site. VocÃª vai encontrar uma lista de todas as pÃ¡ginas neste site aqui. O <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> e tambÃ©m estÃ£o disponÃ­veis, assim como um <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(329,'ru','Ð­Ñ‚Ð¾ ÐºÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð°. Ð’Ñ‹ Ð½Ð°Ð¹Ð´ÐµÑ‚Ðµ ÑÐ¿Ð¸ÑÐ¾Ðº Ð²ÑÐµÑ… ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ† Ð½Ð° ÑÑ‚Ð¾Ð¼ ÑÐ°Ð¹Ñ‚Ðµ Ð·Ð´ÐµÑÑŒ. <a href=\"/sitemap.xml\">XML Sitemap</a> Ð˜ <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>, Ñ‚Ð°ÐºÐ¶Ðµ Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹, Ð° Ñ‚Ð°ÐºÐ¶Ðµ <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(330,'tr','Bu site haritasÄ±dÄ±r. Burada bu sitede her sayfanÄ±n bir listesini bulacaksÄ±nÄ±z. <a href=\"/sitemap.xml\">XML Sitemap</a> Ve <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> da mevcuttur, hem de bir <a href=\"/sitemap.txt\">TXT Sitemap</a> vardÄ±r.',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(331,'zh','è¿™æ˜¯åœ¨ç«™ç‚¹åœ°å›¾ã€‚ä½ ä¼šå‘çŽ°æ¯ä¸€é¡µçš„åˆ—è¡¨ï¼Œåœ¨è¿™ä¸ªç½‘ç«™åœ¨è¿™é‡Œã€‚åœ¨<a href=\"/sitemap.xml\">XML Sitemap</a>å’Œ<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ä¹Ÿéƒ½å…·å¤‡ï¼Œè¿˜æœ‰ä¸€ä¸ª<a href=\"/sitemap.txt\">TXT Sitemap</a>ã€‚',0,31,'2016-08-09 17:50:11','0000-00-00 00:00:00'),(332,'de','Deduplizierung, Deduplizierung, Deduplizierung, Duplikate entfernen, eindeutige Liste',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(333,'es','desduplica, deduplicaciÃ³n, deduplicaciÃ³n, eliminar duplicados, lista Ãºnica',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(334,'fr','dÃ©dupliquer, dÃ©duplication, dÃ©doublonnage, supprimer les doublons, la liste unique,',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(335,'ja','é‡è¤‡æŽ’é™¤æ©Ÿèƒ½ã¯ã€é‡è¤‡æŽ’é™¤ã¯ã€é‡è¤‡ã‚’å‰Šé™¤ã€é‡è¤‡æŽ’é™¤ã€ãƒ¦ãƒ‹ãƒ¼ã‚¯ãªãƒªã‚¹ãƒˆ',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(336,'it','deduplicare, deduplicazione, deduplicazione, rimuovere i duplicati, la lista unica',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(337,'nl','ontdubbelen, deduplicatie, deduplicatie, verwijderen duplicaten, unieke lijst',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(338,'pl','deduplikuj, deduplikacja, dedupe, usuwanie duplikatÃ³w, wyjÄ…tkowa lista',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(339,'pt','desduplicar, deduplicaÃ§Ã£o, dedupe, remova duplicatas, lista Ãºnica',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(340,'ru','Ð´ÐµÐ´ÑƒÐ¿Ð»Ð¸Ñ†Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ, Ð´ÐµÐ´ÑƒÐ¿Ð»Ð¸ÐºÐ°Ñ†Ð¸Ð¸, Ð´ÐµÐ´ÑƒÐ¿Ð»Ð¸ÐºÐ°Ñ†Ð¸Ð¸, ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ñ‹, ÑƒÐ½Ð¸ÐºÐ°Ð»ÑŒÐ½Ñ‹Ð¹ ÑÐ¿Ð¸ÑÐ¾Ðº',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:28'),(341,'tr','deduplication, dedupe, Ã§iftleri kaldÄ±rmak, deduplicate, benzersiz liste',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:29'),(342,'zh','é‡å¤æ•°æ®åˆ é™¤ï¼Œé‡å¤æ•°æ®åˆ é™¤ï¼Œé‡å¤æ•°æ®åˆ é™¤ï¼Œåˆ é™¤é‡å¤ï¼Œå”¯ä¸€åˆ—è¡¨',0,32,'2016-08-12 18:18:42','2016-08-12 18:19:29'),(343,'de','Sortierung Anwendung, Web Application, Word-Anwendung',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(344,'es','AplicaciÃ³n de clasificaciÃ³n, aplicaciÃ³n Web, Word AplicaciÃ³n',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(345,'fr','Demande de tri, application Web, Word application',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(346,'ja','ã‚½ãƒ¼ãƒˆã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Wordã®ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(347,'it','Ordinamento Application, applicazioni Web, Word Application',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(348,'nl','Sortering Application, Web Application, Word Application',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(349,'pl','Sortowanie aplikacji, aplikacji internetowych, aplikacji SÅ‚owo',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(350,'pt','Classificando Aplicativo, Web, aplicativo Palavra',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(351,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Word Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(352,'tr','SÄ±ralama Uygulama, Web Uygulama, Word uygulama',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(353,'zh','æŽ’åºåº”ç”¨ç¨‹åºï¼ŒWebåº”ç”¨ç¨‹åºï¼ŒWordåº”ç”¨ç¨‹åº',0,33,'2016-08-12 18:22:24','0000-00-00 00:00:00'),(354,'de','Internetanwendung',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(355,'es','AplicaciÃ³n web',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(356,'fr','Application Web',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(357,'ja','ã‚¦ã‚§ãƒ–ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(358,'it','Applicazione web',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(359,'nl','Web applicatie',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(360,'pl','Aplikacja internetowa',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(361,'pt','AplicaÃ§Ã£o web',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(362,'ru','Ð’ÐµÐ± Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(363,'tr','Web UygulamasÄ±',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(364,'zh','Webåº”ç”¨ç¨‹åº',0,34,'2016-08-12 18:25:04','0000-00-00 00:00:00'),(365,'AboutChangeFreq','yearly',0,35,'2016-08-19 15:55:44','0000-00-00 00:00:00'),(366,'AboutLastMod','2016-06-04',0,35,'2016-08-19 15:55:44','0000-00-00 00:00:00'),(367,'AboutPriority','0.5',0,35,'2016-08-19 15:55:44','0000-00-00 00:00:00'),(368,'ContactChangeFreq','yearly',0,36,'2016-08-20 13:53:27','0000-00-00 00:00:00'),(369,'ContactLastMod','2016-08-20',0,36,'2016-08-20 13:53:27','0000-00-00 00:00:00'),(370,'ContactPriority','0.2',0,36,'2016-08-20 13:53:27','0000-00-00 00:00:00'),(371,'HomeChangeFreq','weekly',0,37,'2016-08-20 13:54:10','2016-09-05 14:07:48'),(372,'HomeLastMod','2016-09-05',0,37,'2016-08-20 13:54:10','2016-09-05 14:07:48'),(373,'HomePriority','1.0',0,37,'2016-08-20 13:54:10','2016-09-05 14:07:48'),(374,'LanguagesFreq','yearly',0,38,'2016-08-24 17:15:58','2016-08-27 16:22:02'),(375,'LanguagesLastMod','2016-08-27',0,38,'2016-08-24 17:15:59','2016-08-27 16:22:02'),(376,'LanguagesPriority','0.1',0,38,'2016-08-24 17:15:59','2016-08-27 16:22:02'),(377,'de','Und',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(378,'es','Y',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(379,'fr','Et',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(380,'ja','ãã—ã¦',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(381,'it','E',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(382,'nl','En',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(383,'pl','I',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(384,'pt','E',0,39,'2016-08-27 15:07:31','0000-00-00 00:00:00'),(385,'ru','Ð Ñ‚Ð°ÐºÐ¶Ðµ',0,39,'2016-08-27 15:07:32','0000-00-00 00:00:00'),(386,'tr','Ve',0,39,'2016-08-27 15:07:32','0000-00-00 00:00:00'),(387,'zh','å’Œ',0,39,'2016-08-27 15:07:32','0000-00-00 00:00:00'),(388,'de','anderes Land',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(389,'es','otro paÃ­s',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(390,'fr','autre pays',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(391,'ja','ä»–ã®å›½',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(392,'it','altro paese',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(393,'nl','ander land',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(394,'pl','inne paÅ„stwo',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(395,'pt','outro paÃ­s',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(396,'ru','Ð´Ñ€ÑƒÐ³Ð°Ñ ÑÑ‚Ñ€Ð°Ð½Ð°',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(397,'tr','diÄŸer Ã¼lke',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(398,'zh','å…¶ä»–å›½å®¶',0,40,'2016-08-27 15:07:50','0000-00-00 00:00:00'),(399,'de','andere LÃ¤nder',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(400,'es','otros paÃ­ses',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(401,'fr','autres pays',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(402,'ja','ä»–ã®å›½ã€…',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(403,'it','altri paesi',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(404,'nl','andere landen',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(405,'pl','inne kraje',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(406,'pt','outros paÃ­ses',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(407,'ru','Ð´Ñ€ÑƒÐ³Ð¸Ðµ ÑÑ‚Ñ€Ð°Ð½Ñ‹',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(408,'tr','diÄŸer Ã¼lkeler',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(409,'zh','å…¶ä»–å›½å®¶',0,41,'2016-08-27 15:08:03','0000-00-00 00:00:00'),(410,'de','Sprache wÃ¤hlen FÃ¼r Remove Duplicate Linien: Entfernen von doppelten EintrÃ¤ge aus Listen',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(411,'es','Seleccionar el idioma para eliminar las lÃ­neas duplicadas: La eliminaciÃ³n de entradas duplicadas de las Listas',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(412,'fr','SÃ©lectionnez la langue Pour supprimer des lignes en double: Retrait entrÃ©es en double Ã  partir de listes',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(413,'ja','å‰Šé™¤é‡è¤‡è¡Œã®è¨€èªžã‚’é¸æŠžï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(414,'it','Selezionare la lingua per rimuovere le linee duplicate: Rimuovere voci duplicate da liste',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(415,'nl','Selecteer Taal Voor Remove Duplicate Lines: Het verwijderen van dubbele vermeldingen uit lijsten',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(416,'pl','Wybierz jÄ™zyk usunÄ…Ä‡ duplikaty Lines: Usuwanie zduplikowane wpisy z list',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(417,'pt','Selecione o idioma Para remover linhas duplicadas: Remover entradas duplicadas a partir de listas',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(418,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð¾Ð² ÑÑ‚Ñ€Ð¾Ðº: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(419,'tr','KaldÄ±r Yinelenen SatÄ±rlÄ± Dil SeÃ§iniz: Listesinden yinelenen girdileri kaldÄ±rÄ±lÄ±yor',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(420,'zh','é€‰æ‹©è¯­è¨€å¯¹äºŽåˆ é™¤é‡å¤çš„çº¿è·¯ï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,42,'2016-08-27 15:14:11','0000-00-00 00:00:00'),(421,'de','Sprachen',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(422,'es','idiomas',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(423,'fr','Langues',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(424,'ja','è¨€èªž',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(425,'it','Le lingue',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(426,'nl','talen',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(427,'pl','JÄ™zyki',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(428,'pt','idiomas',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(429,'ru','Ð¯Ð·Ñ‹ÐºÐ¸',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(430,'tr','Diller',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(431,'zh','è¯­è¨€',0,43,'2016-08-27 16:15:09','0000-00-00 00:00:00'),(432,'de','Aktie',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(433,'es','Compartir',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(434,'fr','Partager',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(435,'ja','ã‚·ã‚§ã‚¢',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(436,'it','Condividere',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(437,'nl','Delen',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(438,'pl','DzieliÄ‡',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(439,'pt','Compartilhar',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(440,'ru','ÐŸÐ¾Ð´ÐµÐ»Ð¸Ñ‚ÑŒÑÑ',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(441,'tr','Pay',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(442,'zh','åˆ†äº«',0,44,'2016-09-05 14:02:08','0000-00-00 00:00:00'),(443,'de','Teilen mit',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(444,'es','Compartir con',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(445,'fr','Partager avec',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(446,'ja','ã¨å…±æœ‰ã™ã‚‹',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(447,'it','Condividi con',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(448,'nl','Delen met',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(449,'pl','UdostÄ™pniaÄ‡',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(450,'pt','Compartilhar com',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(451,'ru','Ð Ð°Ð·Ñ€ÐµÑˆÐ¸Ñ‚ÑŒ',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(452,'tr','Ä°le paylaÅŸ',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(453,'zh','ä¸ŽæŸäººåˆ†äº«',0,45,'2016-09-05 14:02:12','0000-00-00 00:00:00'),(454,'de','Sprache auswÃ¤hlen',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(455,'es','Seleccione el idioma',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(456,'fr','Choisir la langue',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(457,'ja','è¨€èªžã‚’é¸æŠžã™ã‚‹',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(458,'it','Seleziona la lingua',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(459,'nl','Selecteer Taal',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(460,'pl','Wybierz jÄ™zyk',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(461,'pt','Selecione o idioma',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(462,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(463,'tr','Dil SeÃ§in',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(464,'zh','é€‰æ‹©è¯­è¨€',0,46,'2017-01-10 15:32:21','2017-01-10 15:32:21'),(465,'de','Robots.txt Datei',0,47,'2017-01-10 15:46:30','2017-01-10 15:46:30'),(466,'es','Archivo Robots.txt',0,47,'2017-01-10 15:46:30','2017-01-10 15:46:30'),(467,'fr','Fichier Robots.txt',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(468,'ja','Robots.txtãƒ•ã‚¡ã‚¤ãƒ«',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(469,'it','file robots.txt',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(470,'nl','robots.txt bestand',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(471,'pl','Plik robots.txt',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(472,'pt','Arquivo Robots.txt',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(473,'ru','Ð¤Ð°Ð¹Ð» robots.txt',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(474,'tr','Robots.txt DosyasÄ±',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(475,'zh','Robots.txtæ–‡ä»¶',0,47,'2017-01-10 15:46:31','2017-01-10 15:46:31'),(476,'de','Warten auf Benutzer',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(477,'es','Esperando usuario',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(478,'fr','Attente de l\'utilisateur',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(479,'ja','ãƒ¦ãƒ¼ã‚¶ãƒ¼å¾…ã¡',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(480,'it','In attesa di utente',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(481,'nl','Wachten op gebruiker',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(482,'pl','Oczekiwanie na uÅ¼ytkownika',0,48,'2017-01-12 11:46:37','2017-01-12 11:46:37'),(483,'pt','Aguardando UsuÃ¡rio',0,48,'2017-01-12 11:46:38','2017-01-12 11:46:38'),(484,'ru','ÐžÐ¶Ð¸Ð´Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',0,48,'2017-01-12 11:46:38','2017-01-12 11:46:38'),(485,'tr','KullanÄ±cÄ±yÄ± Bekliyor',0,48,'2017-01-12 11:46:38','2017-01-12 11:46:38'),(486,'zh','æ­£åœ¨ç­‰å¾…ç”¨æˆ·',0,48,'2017-01-12 11:46:38','2017-01-12 11:46:38'),(487,'de','Status',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(488,'es','Estado',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(489,'fr','statut',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(490,'ja','çŠ¶æ…‹',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(491,'it','Stato',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(492,'nl','toestand',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(493,'pl','Status',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(494,'pt','Status',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(495,'ru','ÐŸÐ¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð´ÐµÐ»',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(496,'tr','Durum',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43'),(497,'zh','çŠ¶æ€',0,49,'2017-01-12 11:46:43','2017-01-12 11:46:43');
/*!40000 ALTER TABLE `LookupListItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PrimaryHostRecord`
--

DROP TABLE IF EXISTS `PrimaryHostRecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PrimaryHostRecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RecordKey` varchar(255) NOT NULL DEFAULT '',
  `RecordValue` varchar(255) NOT NULL DEFAULT '',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Parentid` (`RecordKey`),
  KEY `Childid` (`RecordValue`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PrimaryHostRecord`
--

LOCK TABLES `PrimaryHostRecord` WRITE;
/*!40000 ALTER TABLE `PrimaryHostRecord` DISABLE KEYS */;
INSERT INTO `PrimaryHostRecord` VALUES (1,'Copyright','All Material Created by the Owners of this Site is Owned by the Site\'s Owners','2016-06-26 17:36:42','2017-02-08 16:29:39'),(2,'Contributor','No Other Contributors','2016-06-29 18:04:38','2017-02-08 16:29:39'),(3,'Subject','Sorting, Organizing, Alphabetizing','2016-06-29 18:04:38','2017-02-08 16:29:39'),(4,'Rights','All Material Copyrighted by its Owners, Public Use as made available is allowed.','2016-08-06 14:34:28','2017-02-08 16:29:39'),(5,'Publisher','Self-Published (removeduplicatelines.com)','2016-08-06 14:34:28','2017-02-08 16:29:39'),(6,'PublicReleaseDate','2016-08-20','2016-08-06 14:34:28','2017-02-08 16:29:39'),(7,'PrimaryImageRight','remove-duplicate-lines-right.jpg','2016-08-06 14:34:28','2017-02-08 16:29:39'),(8,'BaseTemplate','file.html','2016-08-06 14:34:28','2017-02-08 16:29:39'),(9,'Classification','Web Application','2016-08-06 14:34:28','2017-02-08 16:29:39'),(10,'Contact','uprisingengineer@gmail.com','2016-08-06 14:34:28','2017-02-08 16:29:39'),(11,'ApplicationName','Remove Duplicate Lines','2016-08-06 14:34:28','2017-02-08 16:29:39'),(12,'Author','UprisingEngineer','2016-08-06 14:34:28','2017-02-08 16:29:39'),(13,'PrimaryImageLeft','remove-duplicate-lines-left.jpg','2016-08-06 14:34:28','2017-02-08 16:29:39'),(14,'NewsKeywords','Sorting Application, Web Application, Word Application','2016-08-06 14:34:28','2017-02-08 16:29:39'),(15,'Creator','UprisingEngineer','2016-08-06 14:34:28','2017-02-08 16:29:39'),(16,'NotReadyForSearch','1','2017-01-27 16:52:31','2017-02-08 16:29:39'),(17,'FullImage','remove-duplicate-lines-left-full.jpg','2017-02-08 16:29:39','2017-02-08 16:29:39');
/*!40000 ALTER TABLE `PrimaryHostRecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Quote`
--

DROP TABLE IF EXISTS `Quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Quote` varchar(2048) NOT NULL DEFAULT '',
  `Source` varchar(512) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Quote` (`Quote`(255)),
  KEY `Entryid` (`Entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Quote`
--

LOCK TABLES `Quote` WRITE;
/*!40000 ALTER TABLE `Quote` DISABLE KEYS */;
INSERT INTO `Quote` VALUES (1,'I removed so many duplicate lines today!','','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46');
/*!40000 ALTER TABLE `Quote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tag`
--

DROP TABLE IF EXISTS `Tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tag` varchar(255) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`),
  KEY `Tag` (`Tag`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (1,'deduplicate','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46'),(2,'deduplication','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46'),(3,'dedupe','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46'),(4,'remove duplicates','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46'),(5,'unique list','',1,'2016-06-28 17:37:32','2016-08-22 17:21:46');
/*!40000 ALTER TABLE `Tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TextBody`
--

DROP TABLE IF EXISTS `TextBody`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TextBody` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Text` mediumtext NOT NULL,
  `Source` varchar(512) NOT NULL DEFAULT '',
  `Language` varchar(32) NOT NULL DEFAULT '',
  `WordCount` int(11) NOT NULL DEFAULT '0',
  `CharacterCount` int(11) NOT NULL DEFAULT '0',
  `Entryid` int(11) NOT NULL DEFAULT '0',
  `OriginalCreationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LastModificationDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Entryid` (`Entryid`),
  FULLTEXT KEY `Text` (`Text`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TextBody`
--

LOCK TABLES `TextBody` WRITE;
/*!40000 ALTER TABLE `TextBody` DISABLE KEYS */;
INSERT INTO `TextBody` VALUES (1,'<p class=\"margin-0px\">So, you wanted to remove some duplicate lines, right?  That\'s what brought to you to this page, isn\'t it?</p>\r\n<br>\r\n<p class=\"margin-0px\">Good, I hope it helped.</p>','','',0,0,1,'2016-08-05 18:10:00','2016-08-22 17:21:46');
/*!40000 ALTER TABLE `TextBody` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `UserAdmin` VALUES (1,1,'2016-06-26 17:12:03','0000-00-00 00:00:00');
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
INSERT INTO `UserSession` VALUES (21,1,'liWN3+M3JLaVMTlp941g+YWSKrTW9caOzewGFHELfg','2017-02-08 16:27:42','2016-06-26 17:32:59','2017-02-08 16:27:42');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'removeduplicatelines'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:36:31
