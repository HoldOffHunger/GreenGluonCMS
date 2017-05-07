-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.173.170    Database: removeblanklines
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
INSERT INTO `Assignment` VALUES (1,1,0,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
INSERT INTO `AvailabilityDateRange` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ChildRecordStats`
--

LOCK TABLES `ChildRecordStats` WRITE;
/*!40000 ALTER TABLE `ChildRecordStats` DISABLE KEYS */;
INSERT INTO `ChildRecordStats` VALUES (1,1,0,0,1,'2017-02-05 15:09:07','2017-05-06 16:09:45');
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
INSERT INTO `Description` VALUES (1,'Use this tool to remove blank lines from your text lists.','','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
INSERT INTO `Entry` VALUES (1,'Remove Blank Lines','Removing Blank Lines from Lists','','RemoveBlankLines.com','2016-08-22 17:23:06','0000-00-00 00:00:00');
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
INSERT INTO `EntryPermission` VALUES (1,1,21,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupList`
--

LOCK TABLES `LookupList` WRITE;
/*!40000 ALTER TABLE `LookupList` DISABLE KEYS */;
INSERT INTO `LookupList` VALUES (1,'LanguagesMainHeader',0,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(2,'LanguagesMainInstructionsHeader',0,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(3,'LanguagesMainInstructionsContent',0,'2016-08-24 16:42:59','0000-00-00 00:00:00'),(4,'LanguagesMainList1Header',0,'2016-08-24 16:42:59','0000-00-00 00:00:00'),(5,'LanguagesMainList2Header',0,'2016-08-24 16:42:59','0000-00-00 00:00:00'),(6,'LanguagesMainList1Content',0,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(7,'LanguagesMainList2Content',0,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(8,'LanguagesMainButtonText',0,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(13,'LanguagesMainTrimOption',0,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(14,'LanguagesMainTrimDescription',0,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(15,'LanguagesBottomNavigationHome',0,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(16,'LanguagesBottomNavigationAbout',0,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(17,'LanguagesBottomNavigationContact',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(18,'LanguagesAboutUsHeader',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(19,'LanguagesAboutUsContent',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(20,'LanguagesMainImageQuote',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(21,'LanguagesAboutHeader',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(22,'LanguagesContactHeader',0,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(23,'LanguagesContactUs',0,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(24,'LanguagesSiteCreator',0,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(25,'LanguagesSiteCreatedOn',0,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(26,'LanguagesContactCreator',0,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(27,'LanguagesRobotsHeader',0,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(28,'LanguagesRobotsInstructions',0,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(29,'LanguagesSitemapHeader',0,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(30,'LanguagesSitemapInstructions',0,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(31,'LanguagesMainKeywords',0,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(32,'LanguagesMainNewsKeywords',0,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(33,'LanguagesMainClassification',0,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(34,'AboutPageInfo',0,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(35,'ContactPageInfo',0,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(36,'HomePageInfo',0,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(37,'LanguagesPageInfo',0,'2016-08-24 16:44:37','0000-00-00 00:00:00'),(38,'LanguagesAnd',0,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(39,'LanguagesOtherCountry',0,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(40,'LanguagesOtherCountries',0,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(41,'LanguagesHeader',0,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(42,'LanguagesBottomNavigationLanguages',0,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(43,'LanguagesShare',0,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(44,'LanguagesShareWith',0,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(45,'LanguagesSelectLanguageTitle',0,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(46,'LanguagesRobotsFilename',0,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(47,'LanguagesMainStatusHeader',0,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(48,'LanguagesMainActivityHeader',0,'2017-01-12 11:42:42','2017-01-12 11:42:42');
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
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupListItem`
--

LOCK TABLES `LookupListItem` WRITE;
/*!40000 ALTER TABLE `LookupListItem` DISABLE KEYS */;
INSERT INTO `LookupListItem` VALUES (1,'de','Entfernen Sie Leerzeilen (removeblanklines.com): Entfernen von Leerzeilen aus Listen',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(2,'es','Quitar lÃ­neas en blanco (removeblanklines.com): EliminaciÃ³n de lÃ­neas en blanco de Listas',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(3,'fr','Supprimer les lignes vides (removeblanklines.com): Suppression des lignes vides de listes',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(4,'ja','ç´„ç©ºç™½è¡Œã‚’å‰Šé™¤ã™ã‚‹ï¼ˆremoveblanklines.comï¼‰ï¼šãƒªã‚¹ãƒˆã‹ã‚‰ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(5,'it','Rimuovere le righe vuote (removeblanklines.com): eliminando le righe vuote da liste',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(6,'nl','Blanco regels verwijderen (removeblanklines.com): Het verwijderen Blank Lines uit lijsten',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(7,'pl','UsuÅ„ puste wiersze (removeblanklines.com): Usuwanie pustych wierszy z listy',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(8,'pt','Remover linhas em branco (removeblanklines.com): Remover linhas em branco de listas',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:23'),(9,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸ (removeblanklines.com): Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:24'),(10,'tr','BoÅŸ SatÄ±rlarÄ± KaldÄ±r (removeblanklines.com): Listesinden BoÅŸ SatÄ±rlarÄ± Ã‡Ä±karma',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:24'),(11,'zh','åˆ é™¤ç©ºè¡Œï¼ˆremoveblanklines.comï¼‰ï¼šå–ä¸‹åˆ—å‡ºç©ºè¡Œ',0,1,'2016-08-24 16:42:58','2016-08-24 17:48:24'),(12,'de','Anleitung',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(13,'es','Instrucciones',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(14,'fr','Instructions',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(15,'ja','æŒ‡ç¤º',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(16,'it','Istruzioni',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(17,'nl','Instructies',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(18,'pl','Instrukcje',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(19,'pt','InstruÃ§Ãµes',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(20,'ru','InstrucÈ›iunitr',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(21,'tr','Talimatlar',0,2,'2016-08-24 16:42:58','0000-00-00 00:00:00'),(22,'zh','è¯´æ˜Ž',0,2,'2016-08-24 16:42:59','0000-00-00 00:00:00'),(23,'de','Mit diesem Tool kÃ¶nnen leere Zeilen aus dem Text-Listen zu entfernen.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:31'),(24,'es','Utilice esta herramienta para eliminar lÃ­neas en blanco de sus listas de texto.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:31'),(25,'fr','Utilisez cet outil pour supprimer les lignes vides de vos listes de textes.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:31'),(26,'ja','ã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã®ãƒªã‚¹ãƒˆã‹ã‚‰ç©ºç™½è¡Œã‚’å‰Šé™¤ã™ã‚‹ã«ã¯ã€ã“ã®ãƒ„ãƒ¼ãƒ«ã‚’ä½¿ç”¨ã—ã¾ã™ã€‚',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(27,'it','Utilizzare questo strumento per rimuovere le righe vuote dalle vostre liste di testo.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(28,'nl','Gebruik deze tool om lege regels uit je tekst lijsten te verwijderen.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(29,'pl','Za pomocÄ… tego narzÄ™dzia, aby usunÄ…Ä‡ puste wiersze z list tekstowych.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(30,'pt','Utilize esta ferramenta para remover linhas em branco de suas listas de texto.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(31,'ru','Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐ¹Ñ‚Ðµ ÑÑ‚Ð¾Ñ‚ Ð¸Ð½ÑÑ‚Ñ€ÑƒÐ¼ÐµÐ½Ñ‚ Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ñ‹Ñ… ÑÐ¿Ð¸ÑÐºÐ¾Ð².',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(32,'tr','Metin listelerinden boÅŸ satÄ±rlarÄ± kaldÄ±rmak iÃ§in bu aracÄ± kullanÄ±n.',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(33,'zh','ä½¿ç”¨æ­¤å·¥å…·å¯ä»¥ä»Žä½ çš„æ–‡å­—åˆ—è¡¨ä¸­åˆ é™¤ç©ºè¡Œã€‚',0,3,'2016-08-24 16:42:59','2016-08-24 17:57:32'),(34,'de','Liste zu entfernen Leerzeichen aus',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(35,'es','Lista quitar los paneles protectores de',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(36,'fr','Liste pour supprimer Blanks De',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(37,'ja','ã‹ã‚‰ç©ºç™½ã‚’å‰Šé™¤ã™ã‚‹ãƒªã‚¹ãƒˆ',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(38,'it','Lista rimuovere Blanks Da',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(39,'nl','Lijst te verwijderen Blanks Van',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(40,'pl','Lista usunÄ…Ä‡ Blanks Od',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(41,'pt','Lista de remover Blanks De',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(42,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ Ð¸Ð·',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(43,'tr','GÃ¶nderen BoÅŸluklar\'Ä± Ã§Ä±karmak iÃ§in Liste',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(44,'zh','åˆ—è¡¨åˆ é™¤ç©ºç™½ä»Ž',0,4,'2016-08-24 16:42:59','2016-08-24 18:05:52'),(45,'de','Liste mit Blanks behandelter',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(46,'es','Lista manejadas con espacios en blanco',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(47,'fr','Liste avec Blanks Handled',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(48,'ja','å–æ‰±ãƒ–ãƒ©ãƒ³ã‚¯ã¨ä¸€è¦§',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(49,'it','Lista con Blanks gestite',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(50,'nl','Lijst met Blanks Behandeld',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(51,'pl','Lista z Blanks obsÅ‚ugiwane',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(52,'pt','Lista com Blanks Manipulados',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(53,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ñ…Ð¾Ð»Ð¾ÑÑ‚Ñ‹Ð¼Ð¸ Ð¾Ð±Ñ€Ð°Ð±Ð°Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ñ…',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(54,'tr','Kulplu BoÅŸluklar ile Listesi',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(55,'zh','ä¸Žå¤„ç†çš„ç©ºç™½åˆ—è¡¨',0,5,'2016-08-24 16:42:59','2016-08-24 18:12:52'),(56,'de','Geben Sie oder kopieren und fÃ¼gen Sie Ihre Liste in diesem Textfeld .',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(57,'es','Escribir o copiar y pegar su lista en este cuadro de texto.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(58,'fr','Tapez ou copier-coller votre liste dans cette zone de texte.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(59,'ja','ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ã‚ãªãŸã®ãƒªã‚¹ãƒˆã‚’ã‚³ãƒ”ãƒ¼ã‚¢ãƒ³ãƒ‰ãƒšãƒ¼ã‚¹ãƒˆå…¥åŠ›ã—ã¾ã™ã‹ã€‚',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(60,'it','Digitare o copiare e incollare l\'elenco in questa casella di testo.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(61,'nl','Typ of kopieer-en-plak uw lijst in dit tekstvak.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(62,'pl','Wpisz lub skopiuj i wklej swojÄ… listÄ™ w tym polu tekstowym.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(63,'pt','Digite ou copie e cole a sua lista para este caixa de texto.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(64,'ru','Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð»Ð¸ ÑÐºÐ¾Ð¿Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¸ Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ ÑÐ¿Ð¸ÑÐ¾Ðº Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(65,'tr','Bu metin kutusuna listenizi kopyalayÄ±p yapÄ±ÅŸtÄ±rÄ±n ve-veya yazÄ±n.',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(66,'zh','é”®å…¥æˆ–å¤åˆ¶å’Œç²˜è´´æ‚¨çš„æ¸…å•åˆ°è¿™ä¸ªæ–‡æœ¬æ¡†ã€‚',0,6,'2016-08-24 16:43:00','0000-00-00 00:00:00'),(67,'de','Dann ist Ihre Liste mit entfernt Rohlinge werden in diesem Textfeld angezeigt.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(68,'es','A continuaciÃ³n, la lista con espacios en blanco eliminado aparecerÃ¡ en este cuadro de texto.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(69,'fr','Ensuite, votre liste avec des blancs enlevÃ©s apparaÃ®tra dans cette zone de texte.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(70,'ja','ãã®å¾Œã€å‰Šé™¤ç©ºç™½ã‚’ã‚ãªãŸã®ãƒªã‚¹ãƒˆã«ã¯ã€ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«è¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(71,'it','Poi apparirÃ  l\'elenco con spazi rimossi in questa casella di testo.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(72,'nl','Dan is uw lijst met spaties verwijderd zal verschijnen in dit tekstvak.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(73,'pl','NastÄ™pnie pojawi siÄ™ lista z usuniÄ™tymi spacjami w polu tekstowym.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(74,'pt','Em seguida, sua lista com espaÃ§os em branco removidos irÃ£o aparecer na caixa de texto.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(75,'ru','Ð¢Ð¾Ð³Ð´Ð° Ð²Ð°Ñˆ ÑÐ¿Ð¸ÑÐ¾Ðº Ñ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ð°Ð¼Ð¸ ÑƒÐ´Ð°Ð»ÐµÐ½Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð¶Ð°Ñ‚ÑŒÑÑ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(76,'tr','Sonra kaldÄ±rÄ±lÄ±r boÅŸluklarÄ± ile liste bu metin kutusunda belirecektir.',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(77,'zh','ç„¶åŽç”¨ç©ºç™½å·²åˆ é™¤æ‚¨çš„åˆ—è¡¨å°†å‡ºçŽ°åœ¨è¯¥æ–‡æœ¬æ¡†ä¸­ã€‚',0,7,'2016-08-24 16:43:00','2016-08-24 18:09:56'),(78,'de','Entfernen Sie Leerzeilen',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(79,'es','Quitar lÃ­neas en blanco',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(80,'fr','Supprimer les lignes vides',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(81,'ja','ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(82,'it','Rimuovere le righe vuote',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(83,'nl','Blanco regels verwijderen',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(84,'pl','UsuÅ„ puste wiersze',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(85,'pt','Remover linhas em branco',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(86,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(87,'tr','BoÅŸ SatÄ±rlarÄ± KaldÄ±r',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(88,'zh','åˆ é™¤ç©ºè¡Œ',0,8,'2016-08-24 16:43:00','2016-08-24 17:43:44'),(133,'de','Trim Leerzeichen aus Objekte in der Liste',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(134,'es','Recortar los espacios en blanco de los elementos en la lista',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(135,'fr','Coupez Whitespace Ã  partir des Ã©lÃ©ments dans la liste',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(136,'ja','ãƒªã‚¹ãƒˆã®é …ç›®ã‹ã‚‰ç©ºç™½ã‚’ãƒˆãƒªãƒ ',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(137,'it','Trim Gli spazi bianchi da voci di elenco',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(138,'nl','Trim Whitespace van Items in List',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(139,'pl','PrzyciÄ…Ä‡ biaÅ‚e znaki od pozycji na liÅ›cie',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(140,'pt','Aparar espaÃ§o em branco do itens na lista',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(141,'ru','ÐžÐ±Ñ€ÐµÐ¶ÑŒÑ‚Ðµ Whitespace Ð¸Ð· ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð¾Ð² ÑÐ¿Ð¸ÑÐºÐ°',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(142,'tr','Listesinde Ã–ÄŸeler Whitespace Trim',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(143,'zh','ä»Žåˆ—è¡¨é¡¹ä¿®å‰ªç©ºç™½',0,13,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(144,'de','Diese Option wird entfernen Starten und Leerzeichen in der sich aus jedem Element Hinter, sortierte Liste.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(145,'es','Esta opciÃ³n eliminarÃ¡ el arranque y arrastrar caracteres de espacio en blanco entre cada elemento de la resultante, lista ordenada.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(146,'fr','Cette option va supprimer le dÃ©marrage et l\'arriÃ¨re des caractÃ¨res blancs de chaque Ã©lÃ©ment de la rÃ©sultante, liste triÃ©e.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(147,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã€é–‹å§‹ã—ã€å¾—ã‚‰ã‚ŒãŸå„é …ç›®ã‹ã‚‰ç©ºç™½æ–‡å­—ã‚’æœ«å°¾ã«å‰Šé™¤ã•ã‚Œã€ãƒªã‚¹ãƒˆã‚’ä¸¦ã¹æ›¿ãˆã€‚',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(148,'it','Questa opzione rimuoverÃ  di partenza e finali caratteri di spazio vuoto da ogni elemento della risultante, lista ordinata.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(149,'nl','Deze optie zal verwijderen starten en witruimte karakters van elk item in de resulterende, gesorteerd lijst.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(150,'pl','Ta opcja usunie rozpoczÄ™ciem i koÅ„cowe biaÅ‚e znaki z kaÅ¼dego elementu w wynikowym, lista posortowana.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(151,'pt','Esta opÃ§Ã£o irÃ¡ remover comeÃ§ando e Ã  direita espaÃ§os em branco de cada item na resultante, lista classificada.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(152,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð·Ð°Ð¿ÑƒÑÐº Ð¸ ÐºÐ¾Ð½ÐµÑ‡Ð½Ñ‹Ðµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ ÑÐ¸Ð¼Ð²Ð¾Ð»Ð¾Ð² Ð¸Ð· ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð² Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð¸Ñ€ÑƒÑŽÑ‰ÐµÐ¼, ÑÐ¾Ñ€Ñ‚Ð¸Ñ€ÑƒÐµÑ‚ÑÑ ÑÐ¿Ð¸ÑÐ¾Ðº.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(153,'tr','Bu seÃ§enek, baÅŸlangÄ±Ã§ ve sonuÃ§ olarak her Ã¶ÄŸenin beyaz boÅŸluk karakterleri sondaki kaldÄ±rÄ±r, liste sÄ±ralanÄ±r.',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(154,'zh','æ­¤é€‰é¡¹å°†åˆ é™¤ï¼Œå¹¶å¼€å§‹åœ¨ç”±æ­¤äº§ç”Ÿçš„æ¯ä¸ªé¡¹ç›®ç»“å°¾çš„ç©ºç™½å­—ç¬¦ï¼ŒæŽ’åºåˆ—è¡¨ã€‚',0,14,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(155,'de','Zuhause',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(156,'es','Casa',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(157,'fr','Accueil',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(158,'ja','ãƒ›ãƒ¼ãƒ ',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(159,'it','Casa',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(160,'nl','Huis',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(161,'pl','Dom',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(162,'pt','Casa',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(163,'ru','Ð“Ð»Ð°Ð²Ð½Ð°Ñ',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(164,'tr','Ev',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(165,'zh','å®¶',0,15,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(166,'de','Etwa',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(167,'es','Acerca de',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(168,'fr','Sur',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(169,'ja','ç´„',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(170,'it','Di',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(171,'nl','Over',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(172,'pl','O',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(173,'pt','Sobre',0,16,'2016-08-24 16:43:01','0000-00-00 00:00:00'),(174,'ru','ÐžÐºÐ¾Ð»Ð¾',0,16,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(175,'tr','hakkÄ±nda',0,16,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(176,'zh','å…³äºŽ',0,16,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(177,'de','Kontakt',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(178,'es','Contacto',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(179,'fr','Contact',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(180,'ja','æŽ¥è§¦',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(181,'it','contatto',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(182,'nl','Contact',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(183,'pl','Kontakt',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(184,'pt','Contato',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(185,'ru','ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(186,'tr','Temas',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(187,'zh','è”ç³»',0,17,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(188,'de','Weitere Informationen Ã¼ber uns',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(189,'es','MÃ¡s informaciÃ³n sobre nosotros',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(190,'fr','Plus d\'informations sur nous',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(191,'ja','ä¼šç¤¾ã®è©³ç´°æƒ…å ±',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(192,'it','Altre informazioni Chi siamo',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(193,'nl','Meer informatie over ons',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(194,'pl','WiÄ™cej informacji o nas',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(195,'pt','Mais informaÃ§Ãµes Sobre nÃ³s',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(196,'ru','Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ð¾ Ð½Ð°Ñ',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(197,'tr','HakkÄ±mÄ±zda Daha Fazla Bilgi',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(198,'zh','æ›´å¤šä¿¡æ¯å…³äºŽæˆ‘ä»¬',0,18,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(199,'de','<p class=\"margin-0px\">Also, Sie wollten ein paar Leerzeilen zu entfernen, nicht wahr? Das ist, was Sie auf dieser Seite gebracht, ist es nicht?</p><br><p class=\"margin-0px\">Gut, ich hoffe, es half.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(200,'es','<p class=\"margin-0px\">Por lo tanto, querÃ­a suprimir algunas lÃ­neas en blanco, Â¿verdad? Eso es lo que llevÃ³ a que a esta pÃ¡gina, Â¿verdad?</p><br><p class=\"margin-0px\">Bueno, espero que ayudÃ³.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(201,'fr','<p class=\"margin-0px\">Donc, vous vouliez supprimer certaines lignes vides, non? VoilÃ  ce qui vous Ã  cette page, est-ce pas?</p><br><p class=\"margin-0px\">Bon, je l\'espÃ¨re, il a aidÃ©.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(202,'ja','<p class=\"margin-0px\">ã ã‹ã‚‰ã€ã‚ãªãŸã¯å³ã€ã„ãã¤ã‹ã®ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ãŸã„ã§ã™ã‹ï¼Ÿãã‚Œã¯ãã‚Œã¯ã€ã“ã®ãƒšãƒ¼ã‚¸ã«ã‚ãªãŸã«ã‚‚ãŸã‚‰ã—ãŸã‚‚ã®ã¯ãªã„ã§ã™ã­ã€‚</p><br><p class=\"margin-0px\">è‰¯ã„ã€ç§ã¯ãã‚ŒãŒåŠ©ã‘ã‚’é¡˜ã£ã¦ã„ã¾ã™ã€‚</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(203,'it','<p class=\"margin-0px\">Quindi, si voleva eliminare alcune righe vuote, giusto? Questo Ã¨ quello che ha portato a voi a questa pagina, non Ã¨ vero?</p><br><p class=\"margin-0px\">Bene, spero che lo ha aiutato.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(204,'nl','<p class=\"margin-0px\">Dus, wilde u een aantal lege regels te verwijderen, toch? Dat is wat u aangeboden op deze pagina, is het niet?</p><br><p class=\"margin-0px\">Goed, ik hoop dat het hielp.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(205,'pl','<p class=\"margin-0px\">WiÄ™c chciaÅ‚ usunÄ…Ä‡ niektÃ³re puste linie, prawda? To, co przedstawia PaÅ„stwu do tej strony, prawda?</p><br><p class=\"margin-0px\">Dobra, mam nadziejÄ™, Å¼e pomogÅ‚o.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(206,'pt','<p class=\"margin-0px\">EntÃ£o, vocÃª queria remover algumas linhas em branco, certo? Isso Ã© o que trouxe vocÃª para esta pÃ¡gina, nÃ£o Ã©?</p><br><p class=\"margin-0px\">Bom, espero que ajudou.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(207,'ru','<p class=\"margin-0px\">Ð˜Ñ‚Ð°Ðº, Ð²Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸? Ð­Ñ‚Ð¾ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ð¿Ñ€Ð¸Ñ…Ð¾Ð´Ð¸Ñ‚ Ðº Ð²Ð°Ð¼ Ð½Ð° ÑÑ‚Ð¾Ð¹ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸?</p><br><p class=\"margin-0px\">Ð¥Ð¾Ñ€Ð¾ÑˆÐ¾, Ñ Ð½Ð°Ð´ÐµÑŽÑÑŒ, Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ð³Ð»Ð¾.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(208,'tr','<p class=\"margin-0px\">Yani, doÄŸru, bazÄ± boÅŸ satÄ±rlarÄ± kaldÄ±rmak istedi? Yani, bu sayfaya getirdi deÄŸil mi?</p><br><p class=\"margin-0px\">Ä°yi, ben yardÄ±mcÄ± umuyoruz.</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(209,'zh','<p class=\"margin-0px\">æ‰€ä»¥ï¼Œä½ æƒ³åˆ é™¤ä¸€äº›ç©ºè¡Œï¼Œå¯¹ä¸å¯¹ï¼Ÿè¿™å°±æ˜¯å¸¦ç»™ä½ è¿™ä¸ªé¡µé¢ï¼Œä¸æ˜¯å—ï¼Ÿ</p><br><p class=\"margin-0px\">å¥½ï¼Œæˆ‘å¸Œæœ›å®ƒå¸®åŠ©ã€‚</p>',0,19,'2016-08-24 16:43:02','2016-08-24 17:37:01'),(210,'de','Ich entfernte so viele leere Zeilen heute!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(211,'es','He quitado tantas lÃ­neas en blanco hoy!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(212,'fr','J\'ai enlevÃ© tant de lignes vides aujourd\'hui!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(213,'ja','ä»Šæ—¥ã¯éžå¸¸ã«å¤šãã®ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã—ãŸï¼',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(214,'it','Ho rimosso tante righe vuote oggi!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(215,'nl','Ik verwijderde zoveel lege regels vandaag!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(216,'pl','UsunÄ…Å‚em tylu wierszy juÅ¼ dziÅ›!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(217,'pt','Tirei tantas linhas em branco hoje!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(218,'ru','Ð¯ ÑÐ½ÑÐ» Ñ‚Ð°Ðº Ð¼Ð½Ð¾Ð³Ð¾ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº ÑÐµÐ³Ð¾Ð´Ð½Ñ!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(219,'tr','BugÃ¼n pek Ã§ok boÅŸ satÄ±r kaldÄ±rÄ±ldÄ±!',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(220,'zh','ä»Šå¤©æˆ‘åˆ é™¤è¿™ä¹ˆå¤šçš„ç©ºè¡Œï¼',0,20,'2016-08-24 16:43:02','2016-08-24 17:51:36'),(221,'de','Entfernen Ãœber Leerzeilen : Leerzeilen aus Listen entfernen',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(222,'es','Sobre Eliminar lÃ­neas en blanco: EliminaciÃ³n de lÃ­neas en blanco de Listas',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(223,'fr','A propos de supprimer les lignes vides: Suppression des lignes vides de listes',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(224,'ja','ç´„ç©ºç™½è¡Œã‚’å‰Šé™¤ã™ã‚‹ï¼šãƒªã‚¹ãƒˆã‹ã‚‰ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(225,'it','A proposito di rimuovere le righe vuote: eliminando le righe vuote da liste',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(226,'nl','Over Blanco regels verwijderen: Het verwijderen Blank Lines uit lijsten',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(227,'pl','O Usuwanie pustych wierszy: Usuwanie pustych wierszy z listy',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(228,'pt','Sobre Remover linhas em branco: Remover linhas em branco de listas',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(229,'ru','Ðž Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(230,'tr','HakkÄ±nda BoÅŸ SatÄ±rlarÄ± KaldÄ±r: Listesinden BoÅŸ SatÄ±rlarÄ± Ã‡Ä±karma',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(231,'zh','å…³äºŽåˆ é™¤ç©ºè¡Œï¼šåˆ é™¤ä»Žåˆ—è¡¨ç©ºç™½è¡Œ',0,21,'2016-08-24 16:43:02','2016-08-24 17:40:49'),(232,'de','Namen entfernen doppelte Zeilen: Entfernen von doppelten EintrÃ¤gen aus Listen',0,22,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(233,'es','PÃ³ngase en contacto con las lÃ­neas duplicadas Eliminar: Eliminar las entradas duplicadas de las Listas',0,22,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(234,'fr','Contact, enlever les lignes en double: Retrait des entrÃ©es en double Ã  partir de listes',0,22,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(235,'ja','é‡è¤‡è¡Œã‚’å‰Šé™¤ã™ã‚‹é€£çµ¡å…ˆï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,22,'2016-08-24 16:43:02','0000-00-00 00:00:00'),(236,'it','Contatto rimuovere le righe duplicate: Rimuovere voci duplicate da liste',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(237,'nl','Neem Verwijder dubbele lijnen: Het verwijderen van dubbele vermeldingen uit lijsten',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(238,'pl','Kontakt UsuÅ„ powtarzajÄ…ce siÄ™ linie: Usuwanie zduplikowane wpisy z list',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(239,'pt','Contato remove as linhas duplicadas: Remover entradas duplicadas a partir de listas',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(240,'ru','ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð½Ð°Ñ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸ÐµÑÑ ÑÑ‚Ñ€Ð¾ÐºÐ¸: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(241,'tr','Yinelenen SatÄ±rlarÄ± KaldÄ±r Ä°letiÅŸim: Listeler Ã‡oÄŸalt\'Ä± Girdileri KaldÄ±rma',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(242,'zh','è”ç³»æ–¹å¼åˆ é™¤é‡å¤è¡Œï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,22,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(243,'de','Kontaktiere uns',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(244,'es','ContÃ¡ctenos',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(245,'fr','Contactez nous',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(246,'ja','ãŠå•ã„åˆã‚ã›',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(247,'it','Contattaci',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(248,'nl','Neem contact met ons op',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(249,'pl','Skontaktuj siÄ™ z nami',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(250,'pt','Entre Em Contato Conosco',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(251,'ru','Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(252,'tr','Bizimle iletiÅŸime geÃ§in',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(253,'zh','è”ç³»æˆ‘ä»¬',0,23,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(254,'de','Site Creator',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(255,'es','Creador del sitio',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(256,'fr','site Creator',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(257,'ja','ã‚µã‚¤ãƒˆä½œæˆè€…',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(258,'it','Creatore del sito',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(259,'nl','Site Creator',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(260,'pl','TwÃ³rca strony',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(261,'pt','Criador do site',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(262,'ru','Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÐµÐ»ÑŒ ÑÐ°Ð¹Ñ‚Ð°',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(263,'tr','Site Creator',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(264,'zh','ç½‘ç«™çš„åˆ›å»ºè€…',0,24,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(265,'de','Webseite Erstellt am',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(266,'es','Sitio desarrollado en',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(267,'fr','Site CrÃ©Ã© le',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(268,'ja','ã‚µã‚¤ãƒˆã«ã¯ã€ä¸Šã§ä½œæˆã—ã¾ã™',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(269,'it','Sito Creato il',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(270,'nl','Site Gemaakt op',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(271,'pl','Strona stworzona dniu',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(272,'pt','Site criado em',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(273,'ru','Ð¡Ð°Ð¹Ñ‚ ÑÐ¾Ð·Ð´Ð°Ð½ Ð½Ð°',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(274,'tr','Site Ã¼zerinde dÃ¼zenlendi',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(275,'zh','ç½‘ç«™åˆ›å»ºæ—¶é—´',0,25,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(276,'de','Kontakt Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(277,'es','Contacto Creador',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(278,'fr','Contactez Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(279,'ja','é€£çµ¡ã‚¯ãƒªã‚¨ãƒ¼ã‚¿ãƒ¼',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(280,'it','Contatto Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(281,'nl','Contact Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(282,'pl','Kontakt Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(283,'pt','Contact Creator',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(284,'ru','ÐšÐ°Ðº ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð¢Ð²Ð¾Ñ€Ñ†Ð¾Ð¼',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(285,'tr','Ä°letiÅŸim OluÅŸturan',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(286,'zh','è”ç³»é€ ç‰©ä¸»',0,26,'2016-08-24 16:43:03','0000-00-00 00:00:00'),(287,'de','Datei Roboter fÃ¼r Entfernen von Leerzeilen : Leerzeilen aus Listen entfernen',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(288,'es','Los robots de archivo para eliminar las lÃ­neas en blanco: EliminaciÃ³n de lÃ­neas en blanco de Listas',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(289,'fr','Robots fichier pour Remove Blank Lines: Suppression des lignes vides de listes',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(290,'ja','ãƒ­ãƒœãƒƒãƒˆã¯å‰Šé™¤ç©ºç™½è¡Œã®ãƒ•ã‚¡ã‚¤ãƒ«ï¼šãƒªã‚¹ãƒˆã‹ã‚‰ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(291,'it','I robot dei file per rimuovere le righe vuote: eliminando le righe vuote da liste',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(292,'nl','Robots-bestand Voor Blanco regels verwijderen: Het verwijderen Blank Lines uit lijsten',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(293,'pl','Roboty plikÃ³w dla usuwanie pustych linii: Usuwanie pustych wierszy z listy',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(294,'pt','Robots arquivo Para remover linhas em branco: Remover linhas em branco de listas',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(295,'ru','Ð Ð¾Ð±Ð¾Ñ‚Ñ‹ Ñ„Ð°Ð¹Ð» Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(296,'tr','Robotlar KaldÄ±r BoÅŸ HatlarÄ± Ä°Ã§in Dosya: Listesinden BoÅŸ SatÄ±rlarÄ± Ã‡Ä±karma',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(297,'zh','æœºå™¨äººæ–‡ä»¶åˆ é™¤ç©ºè¡Œï¼šå–ä¸‹åˆ—å‡ºç©ºè¡Œ',0,27,'2016-08-24 16:43:03','2016-08-24 18:18:42'),(298,'de','Dies ist die fÃ¼r Menschen lesbare Version unserer robots.txt-Datei. Die <a href=\"/robots.txt\">Robots.txt File</a> Datei ist, was tatsÃ¤chlich Suchmaschinen kriechen. Eine alternative ___________ Datei wurde ebenfalls zur VerfÃ¼gung gestellt, wenn Sie etwas mehr maschinenlesbar mÃ¼ssen. Die XML-Version hat auch eine <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(299,'es','Esta es la versiÃ³n legible por humanos de nuestro archivo robots.txt. El archivo <a href=\"/robots.txt\">Robots.txt File</a> es lo que los motores de bÃºsqueda reales se arrastran. Una alternativa ___________ de archivos tambiÃ©n se ha proporcionado si necesita algo mÃ¡s legible por mÃ¡quina. La versiÃ³n XML tambiÃ©n tiene una <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(300,'fr','Ceci est la version lisible par l\'homme de notre fichier robots.txt. Le fichier <a href=\"/robots.txt\">Robots.txt File</a> est ce que les moteurs de recherche rÃ©els vont parcourir. Un autre fichier <a href=\"/robots.xml\">Robots.xml File</a> a Ã©galement Ã©tÃ© fourni si vous avez besoin quelque chose de plus lisible par machine. La version XML a Ã©galement un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(301,'ja','ã“ã‚ŒãŒç§ãŸã¡ã®robots.txtãƒ•ã‚¡ã‚¤ãƒ«ã®äººé–“ãŒèª­ã‚ã‚‹ãƒãƒ¼ã‚¸ãƒ§ãƒ³ã§ã™ã€‚ <a href=\"/robots.txt\">Robots.txt File</a>ãƒ•ã‚¡ã‚¤ãƒ«ã¯ã€å®Ÿéš›ã®æ¤œç´¢ã‚¨ãƒ³ã‚¸ãƒ³ãŒã‚¯ãƒ­ãƒ¼ãƒ«ã•ã‚Œã¾ã™ã‚‚ã®ã§ã™ã€‚ã‚ãªãŸãŒä½•ã‹ã‚’è¤‡æ•°ã®æ©Ÿæ¢°å¯èª­ãŒå¿…è¦ãªå ´åˆã¯ã€ä»£æ›¿<a href=\"/robots.xml\">Robots.xml File</a>ãƒ•ã‚¡ã‚¤ãƒ«ã‚‚æä¾›ã•ã‚Œã¦ã„ã¾ã™ã€‚ XMLãƒãƒ¼ã‚¸ãƒ§ãƒ³ã‚‚<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã‚’æŒã£ã¦ã„ã¾ã™ã€‚',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(302,'it','Questa Ã¨ la versione leggibile del nostro file robots.txt. Il file <a href=\"/robots.txt\">Robots.txt File</a> Ã¨ quello che effettivamente i motori di ricerca esegue la scansione. Un supplente <a href=\"/robots.xml\">Robots.xml File</a> Il file Ã¨ stato fornito anche se avete bisogno di qualcosa di piÃ¹ leggibile dalla macchina. La versione XML ha anche un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(303,'nl','Dit is de leesbare versie van onze robots.txt bestand. De <a href=\"/robots.txt\">Robots.txt File</a> File is wat de werkelijke zoekmachines zullen kruipen. Een alternatieve <a href=\"/robots.xml\">Robots.xml File</a> File is ook voorzien als je iets meer machine leesbare nodig. De XML-versie heeft ook een <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(304,'pl','Ta wersja jest czytelny dla czÅ‚owieka naszego pliku robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Pliku, co rzeczywiste wyszukiwarek bÄ™dzie indeksowaÄ‡. Alternatywny <a href=\"/robots.xml\">Robots.xml File</a> pliku zostaÅ‚y przekazane, jeÅ›li potrzebujesz czegoÅ› wiÄ™cej do odczytu maszynowego. Wersja XML ma rÃ³wnieÅ¼ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(305,'pt','Esta Ã© a versÃ£o legÃ­vel do nosso arquivo robots.txt. O Arquivo <a href=\"/robots.txt\">Robots.txt File</a> Ã© o que os motores de busca reais irÃ¡ rastrear. Uma alternativa <a href=\"/robots.xml\">Robots.xml File</a> arquivo tambÃ©m foi fornecido se vocÃª precisa de algo mais legÃ­vel por mÃ¡quina. A versÃ£o XML tambÃ©m tem um <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(306,'ru','Ð­Ñ‚Ð¾ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº-ÑÑ‡Ð¸Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð²ÐµÑ€ÑÐ¸Ñ Ð½Ð°ÑˆÐµÐ³Ð¾ Ñ„Ð°Ð¹Ð»Ð° robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Ð¤Ð°Ð¹Ð» Ñ‡Ñ‚Ð¾ Ñ„Ð°ÐºÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ðµ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ ÑÐºÐ°Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ. ÐÐ»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¹ <a href=\"/robots.xml\">Robots.xml File</a> Ð¤Ð°Ð¹Ð» Ñ‚Ð°ÐºÐ¶Ðµ Ð¿Ñ€Ð¸ ÑƒÑÐ»Ð¾Ð²Ð¸Ð¸, ÐµÑÐ»Ð¸ Ð²Ð°Ð¼ Ð½ÑƒÐ¶Ð½Ð¾ Ñ‡Ñ‚Ð¾-Ñ‚Ð¾ Ð±Ð¾Ð»ÐµÐµ Ð¼Ð°ÑˆÐ¸Ð½Ð¾Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼ÑƒÑŽ. Ð’ÐµÑ€ÑÐ¸Ñ XML Ñ‚Ð°ÐºÐ¶Ðµ Ð¸Ð¼ÐµÐµÑ‚ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(307,'tr','Bu bizim robots.txt dosyanÄ±zÄ±n insan tarafÄ±ndan okunabilir sÃ¼rÃ¼mÃ¼dÃ¼r. <a href=\"/robots.txt\">Robots.txt File</a> Dosya gerÃ§ek arama motorlarÄ± tarama budur. Bir ÅŸey daha makine tarafÄ±ndan okunabilir gerekirse alternatif <a href=\"/robots.xml\">Robots.xml File</a> Dosya da saÄŸlanmÄ±ÅŸtÄ±r. XML versiyonu da bir <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a> vardÄ±r.',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(308,'zh','è¿™æ˜¯æˆ‘ä»¬çš„robots.txtæ–‡ä»¶çš„äººç±»å¯è¯»çš„ç‰ˆæœ¬ã€‚è¯¥æ–‡ä»¶<a href=\"/robots.txt\">Robots.txt File</a>æ˜¯å®žé™…çš„æœç´¢å¼•æ“Žå°†æŠ“å–ã€‚å¦ä¸€ç§<a href=\"/robots.xml\">Robots.xml File</a>æ–‡ä»¶ï¼Œå¦‚æžœä½ éœ€è¦æ›´å¤šçš„ä¸œè¥¿æœºå™¨å¯è¯»ä¹Ÿæœ‰è§„å®šã€‚ XMLç‰ˆæœ¬ä¹Ÿæœ‰<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã€‚',0,28,'2016-08-24 16:43:04','2016-08-25 18:16:39'),(309,'de','Sitemap fÃ¼r RemoveDuplicateLines.com: Entfernen von doppelten EintrÃ¤gen aus Listen',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(310,'es','Mapa del sitio de RemoveDuplicateLines.com: EliminaciÃ³n de las entradas duplicadas de las Listas',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(311,'fr','Plan du site pour RemoveDuplicateLines.com: Retrait des entrÃ©es en double Ã  partir de listes',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(312,'ja','RemoveDuplicateLines.comã®ãŸã‚ã®ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(313,'it','Mappa del sito per RemoveDuplicateLines.com: Rimozione di voci duplicate da liste',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(314,'nl','Sitemap voor RemoveDuplicateLines.com: Het verwijderen van dubbele vermeldingen uit lijsten',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(315,'pl','Mapa dla RemoveDuplicateLines.com: Usuwanie zduplikowane wpisy z list',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(316,'pt','Sitemap para RemoveDuplicateLines.com: Remover entradas duplicadas a partir de listas',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(317,'ru','ÐšÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð° Ð´Ð»Ñ RemoveDuplicateLines.com: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(318,'tr','RemoveDuplicateLines.com iÃ§in Site HaritasÄ±: Listesinden yinelenen Girdileri KaldÄ±rma',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(319,'zh','ç½‘ç«™åœ°å›¾ä¸ºRemoveDuplicateLines.comï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,29,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(320,'de','Dies ist die Site-Map. Sie finden hier eine Liste von jeder Seite auf dieser Website zu finden. Die <a href=\"/sitemap.xml\">XML Sitemap</a> und ein <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sind ebenfalls verfÃ¼gbar, sowie ein <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(321,'es','Este es el mapa del sitio. Usted encontrarÃ¡ una lista de todas las pÃ¡ginas de este sitio aquÃ­. El <a href=\"/sitemap.xml\">XML Sitemap</a> y un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> tambiÃ©n estÃ¡n disponibles, asÃ­ como un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(322,'fr','Ceci est le plan du site. Vous trouverez une liste de chaque page sur ce site ici. Le <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> et sont Ã©galement disponibles, ainsi qu\'un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(323,'ja','ã“ã‚Œã¯ã€ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã§ã™ã€‚ã‚ãªãŸã¯ã“ã“ã«ã“ã®ã‚µã‚¤ãƒˆä¸Šã®ã™ã¹ã¦ã®ãƒšãƒ¼ã‚¸ã®ä¸€è¦§ãŒã‚ã‚Šã¾ã™ã€‚ <a href=\"/sitemap.xml\">XML Sitemap</a>ã¨<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ã‚‚åˆ©ç”¨ã§ãã‚‹ã ã‘ã§ãªãã€<a href=\"/sitemap.txt\">TXT Sitemap</a>ã§ã™ã€‚',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(324,'it','Questa Ã¨ la mappa del sito. Troverete un elenco di ogni pagina di questo sito qui. Il <a href=\"/sitemap.xml\">XML Sitemap</a> e un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sono disponibili, cosÃ¬ come un <a href=\"/sitemap.txt\">TXT Sitemap</a> anche.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(325,'nl','Dit is de site map. U ziet een lijst van alle pagina\'s op deze site hier. De <a href=\"/sitemap.xml\">XML Sitemap</a> en een <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> zijn ook beschikbaar, evenals een <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(326,'pl','Jest to mapa serwisu. Znajdziesz tu listÄ™ wszystkich stron na tej stronie tutaj. <a href=\"/sitemap.xml\">XML Sitemap</a> I <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> dostÄ™pne, jak rÃ³wnieÅ¼ <a href=\"/sitemap.txt\">TXT Sitemap</a> rÃ³wnieÅ¼.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(327,'pt','Este Ã© o mapa do site. VocÃª vai encontrar uma lista de todas as pÃ¡ginas neste site aqui. O <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> e tambÃ©m estÃ£o disponÃ­veis, assim como um <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(328,'ru','Ð­Ñ‚Ð¾ ÐºÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð°. Ð’Ñ‹ Ð½Ð°Ð¹Ð´ÐµÑ‚Ðµ ÑÐ¿Ð¸ÑÐ¾Ðº Ð²ÑÐµÑ… ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ† Ð½Ð° ÑÑ‚Ð¾Ð¼ ÑÐ°Ð¹Ñ‚Ðµ Ð·Ð´ÐµÑÑŒ. <a href=\"/sitemap.xml\">XML Sitemap</a> Ð˜ <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>, Ñ‚Ð°ÐºÐ¶Ðµ Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹, Ð° Ñ‚Ð°ÐºÐ¶Ðµ <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(329,'tr','Bu site haritasÄ±dÄ±r. Burada bu sitede her sayfanÄ±n bir listesini bulacaksÄ±nÄ±z. <a href=\"/sitemap.xml\">XML Sitemap</a> Ve <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> da mevcuttur, hem de bir <a href=\"/sitemap.txt\">TXT Sitemap</a> vardÄ±r.',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(330,'zh','è¿™æ˜¯åœ¨ç«™ç‚¹åœ°å›¾ã€‚ä½ ä¼šå‘çŽ°æ¯ä¸€é¡µçš„åˆ—è¡¨ï¼Œåœ¨è¿™ä¸ªç½‘ç«™åœ¨è¿™é‡Œã€‚åœ¨<a href=\"/sitemap.xml\">XML Sitemap</a>å’Œ<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ä¹Ÿéƒ½å…·å¤‡ï¼Œè¿˜æœ‰ä¸€ä¸ª<a href=\"/sitemap.txt\">TXT Sitemap</a>ã€‚',0,30,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(331,'de','entfernen Rohlinge, entfernen Sie leere Zeilen, Text-Dokument formatiert, das Format Text, Formatierung, Leerzeilen',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:01'),(332,'es','eliminar espacios en blanco, eliminar las lÃ­neas vacÃ­as, formato de documento de texto, dar formato al texto, formato, lÃ­neas en blanco',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:01'),(333,'fr','supprimer les blancs, supprimer des lignes vides, document de formatage du texte, au format texte, mise en forme, des lignes vides',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(334,'ja','ã€ç©ºç™½ã‚’å‰Šé™¤ã—ã€ç©ºè¡Œã€ãƒ†ã‚­ã‚¹ãƒˆæ–‡æ›¸ã®æ›¸å¼ã€å½¢å¼ã®ãƒ†ã‚­ã‚¹ãƒˆã€æ›¸å¼ã€ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(335,'it','rimuovere gli spazi, rimuovere le linee vuote, formattazione del documento di testo, formattare il testo, la formattazione, righe vuote',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(336,'nl','verwijderen blanks, verwijder lege regels, tekst documentopmaak, tekstformaat, opmaak, lege regels',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(337,'pl','usuÅ„ spacje, usuwanie pustych wierszy, formatowanie dokumentu tekstu, formatowanie tekstu, formatowanie, puste linie',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(338,'pt','remover espaÃ§os em branco, remover linhas vazias, a formataÃ§Ã£o do documento de texto, formato de texto, formataÃ§Ã£o, linhas em branco',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(339,'ru','ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹, ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸, Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ñ‚ÐµÐºÑÑ‚Ð° Ð´Ð¾ÐºÑƒÐ¼ÐµÐ½Ñ‚Ð°, Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ñ‚ÐµÐºÑÑ‚Ð°, Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ, Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(340,'tr',', BoÅŸluklarÄ± kaldÄ±rmak boÅŸ satÄ±rlarÄ±, metin belge biÃ§imlendirme, biÃ§im metin, biÃ§imlendirme, boÅŸ satÄ±rlarÄ± kaldÄ±rÄ±n',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(341,'zh','åˆ é™¤ç©ºæ ¼ï¼Œåˆ é™¤ç©ºè¡Œï¼Œæ–‡æœ¬æ–‡æ¡£æ ¼å¼ï¼Œæ ¼å¼æ–‡æœ¬ï¼Œæ ¼å¼åŒ–ï¼Œç©ºè¡Œ',0,31,'2016-08-24 16:43:04','2016-08-24 18:02:02'),(342,'de','Sortierung Anwendung, Web Application, Word-Anwendung',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(343,'es','AplicaciÃ³n de clasificaciÃ³n, aplicaciÃ³n Web, Word AplicaciÃ³n',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(344,'fr','Demande de tri, application Web, Word application',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(345,'ja','ã‚½ãƒ¼ãƒˆã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Wordã®ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(346,'it','Ordinamento Application, applicazioni Web, Word Application',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(347,'nl','Sortering Application, Web Application, Word Application',0,32,'2016-08-24 16:43:04','0000-00-00 00:00:00'),(348,'pl','Sortowanie aplikacji, aplikacji internetowych, aplikacji SÅ‚owo',0,32,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(349,'pt','Classificando Aplicativo, Web, aplicativo Palavra',0,32,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(350,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Word Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹',0,32,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(351,'tr','SÄ±ralama Uygulama, Web Uygulama, Word uygulama',0,32,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(352,'zh','æŽ’åºåº”ç”¨ç¨‹åºï¼ŒWebåº”ç”¨ç¨‹åºï¼ŒWordåº”ç”¨ç¨‹åº',0,32,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(353,'de','Internetanwendung',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(354,'es','AplicaciÃ³n web',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(355,'fr','Application Web',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(356,'ja','ã‚¦ã‚§ãƒ–ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(357,'it','Applicazione web',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(358,'nl','Web applicatie',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(359,'pl','Aplikacja internetowa',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(360,'pt','AplicaÃ§Ã£o web',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(361,'ru','Ð’ÐµÐ± Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(362,'tr','Web UygulamasÄ±',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(363,'zh','Webåº”ç”¨ç¨‹åº',0,33,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(364,'AboutChangeFreq','yearly',0,34,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(365,'AboutLastMod','2016-06-04',0,34,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(366,'AboutPriority','0.5',0,34,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(367,'ContactChangeFreq','yearly',0,35,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(368,'ContactLastMod','2016-08-20',0,35,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(369,'ContactPriority','0.2',0,35,'2016-08-24 16:43:05','0000-00-00 00:00:00'),(370,'HomeChangeFreq','weekly',0,36,'2016-08-24 16:43:05','2016-09-05 14:08:12'),(371,'HomeLastMod','2016-09-05',0,36,'2016-08-24 16:43:05','2016-09-05 14:08:12'),(372,'HomePriority','1.0',0,36,'2016-08-24 16:43:05','2016-09-05 14:08:12'),(373,'LanguagesFreq','yearly',0,37,'2016-08-24 16:44:38','2016-08-27 16:22:27'),(374,'LanguagesLastMod','2016-08-27',0,37,'2016-08-24 16:44:38','2016-08-27 16:22:27'),(375,'LanguagesPriority','0.1',0,37,'2016-08-24 16:44:38','2016-08-27 16:22:27'),(376,'de','Und',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(377,'es','Y',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(378,'fr','Et',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(379,'ja','ãã—ã¦',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(380,'it','E',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(381,'nl','En',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(382,'pl','I',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(383,'pt','E',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(384,'ru','Ð Ñ‚Ð°ÐºÐ¶Ðµ',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(385,'tr','Ve',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(386,'zh','å’Œ',0,38,'2016-08-27 15:07:40','0000-00-00 00:00:00'),(387,'de','anderes Land',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(388,'es','otro paÃ­s',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(389,'fr','autre pays',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(390,'ja','ä»–ã®å›½',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(391,'it','altro paese',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(392,'nl','ander land',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(393,'pl','inne paÅ„stwo',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(394,'pt','outro paÃ­s',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(395,'ru','Ð´Ñ€ÑƒÐ³Ð°Ñ ÑÑ‚Ñ€Ð°Ð½Ð°',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(396,'tr','diÄŸer Ã¼lke',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(397,'zh','å…¶ä»–å›½å®¶',0,39,'2016-08-27 15:07:53','0000-00-00 00:00:00'),(398,'de','andere LÃ¤nder',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(399,'es','otros paÃ­ses',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(400,'fr','autres pays',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(401,'ja','ä»–ã®å›½ã€…',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(402,'it','altri paesi',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(403,'nl','andere landen',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(404,'pl','inne kraje',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(405,'pt','outros paÃ­ses',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(406,'ru','Ð´Ñ€ÑƒÐ³Ð¸Ðµ ÑÑ‚Ñ€Ð°Ð½Ñ‹',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(407,'tr','diÄŸer Ã¼lkeler',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(408,'zh','å…¶ä»–å›½å®¶',0,40,'2016-08-27 15:08:00','0000-00-00 00:00:00'),(409,'de','Sprache wÃ¤hlen FÃ¼r Leerzeilen entfernen: Entfernen von Leerzeilen aus Listen',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(410,'es','Seleccionar el idioma para eliminar las lÃ­neas en blanco: EliminaciÃ³n de lÃ­neas en blanco de Listas',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(411,'fr','SÃ©lectionnez la langue Pour supprimer les lignes vides: Suppression des lignes vides de listes',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(412,'ja','è¨€èªžã®å ´åˆã¯ã€ç©ºç™½è¡Œã®å‰Šé™¤]ã‚’é¸æŠžï¼šãƒªã‚¹ãƒˆã‹ã‚‰ç©ºç™½è¡Œã‚’å‰Šé™¤ã—ã¾ã™',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(413,'it','Selezionare la lingua per rimuovere le righe vuote: eliminando le righe vuote da liste',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(414,'nl','Selecteer Taal Voor Blanco regels verwijderen: Het verwijderen Blank Lines uit lijsten',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(415,'pl','Wybierz jÄ™zyk usunÄ…Ä‡ puste wiersze: Usuwanie pustych wierszy z listy',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(416,'pt','Selecione Para Idioma Remover linhas em branco: Remover linhas em branco de listas',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(417,'ru','Ð’Ñ‹Ð±Ð¾Ñ€ ÑÐ·Ñ‹ÐºÐ° Ð”Ð»Ñ Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿ÑƒÑÑ‚Ñ‹Ðµ ÑÑ‚Ñ€Ð¾ÐºÐ¸: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿ÑƒÑÑ‚Ñ‹Ñ… ÑÑ‚Ñ€Ð¾Ðº Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(418,'tr','Dil iÃ§in BoÅŸ SatÄ±rlarÄ± KaldÄ±r seÃ§in: Listesinden BoÅŸ SatÄ±rlarÄ± Ã‡Ä±karma',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(419,'zh','é€‰æ‹©è¯­è¨€å¯¹äºŽåˆ é™¤ç©ºè¡Œï¼šåˆ é™¤ä»Žåˆ—è¡¨ç©ºç™½è¡Œ',0,41,'2016-08-27 15:11:16','0000-00-00 00:00:00'),(420,'de','Sprachen',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(421,'es','idiomas',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(422,'fr','Langues',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(423,'ja','è¨€èªž',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(424,'it','Le lingue',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(425,'nl','talen',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(426,'pl','JÄ™zyki',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(427,'pt','idiomas',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(428,'ru','Ð¯Ð·Ñ‹ÐºÐ¸',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(429,'tr','Diller',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(430,'zh','è¯­è¨€',0,42,'2016-08-27 16:14:28','0000-00-00 00:00:00'),(431,'de','Aktie',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(432,'es','Compartir',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(433,'fr','Partager',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(434,'ja','ã‚·ã‚§ã‚¢',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(435,'it','Condividere',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(436,'nl','Delen',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(437,'pl','DzieliÄ‡',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(438,'pt','Compartilhar',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(439,'ru','ÐŸÐ¾Ð´ÐµÐ»Ð¸Ñ‚ÑŒÑÑ',0,43,'2016-09-05 14:02:39','0000-00-00 00:00:00'),(440,'tr','Pay',0,43,'2016-09-05 14:02:40','0000-00-00 00:00:00'),(441,'zh','åˆ†äº«',0,43,'2016-09-05 14:02:40','0000-00-00 00:00:00'),(442,'de','Teilen mit',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(443,'es','Compartir con',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(444,'fr','Partager avec',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(445,'ja','ã¨å…±æœ‰ã™ã‚‹',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(446,'it','Condividi con',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(447,'nl','Delen met',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(448,'pl','UdostÄ™pniaÄ‡',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(449,'pt','Compartilhar com',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(450,'ru','Ð Ð°Ð·Ñ€ÐµÑˆÐ¸Ñ‚ÑŒ',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(451,'tr','Ä°le paylaÅŸ',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(452,'zh','ä¸ŽæŸäººåˆ†äº«',0,44,'2016-09-05 14:02:44','0000-00-00 00:00:00'),(453,'de','Sprache auswÃ¤hlen',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(454,'es','Seleccione el idioma',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(455,'fr','Choisir la langue',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(456,'ja','è¨€èªžã‚’é¸æŠžã™ã‚‹',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(457,'it','Seleziona la lingua',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(458,'nl','Selecteer Taal',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(459,'pl','Wybierz jÄ™zyk',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(460,'pt','Selecione o idioma',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(461,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(462,'tr','Dil SeÃ§in',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(463,'zh','é€‰æ‹©è¯­è¨€',0,45,'2017-01-10 15:33:46','2017-01-10 15:33:46'),(464,'de','Robots.txt Datei',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(465,'es','Archivo Robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(466,'fr','Fichier Robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(467,'ja','Robots.txtãƒ•ã‚¡ã‚¤ãƒ«',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(468,'it','file robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(469,'nl','robots.txt bestand',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(470,'pl','Plik robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(471,'pt','Arquivo Robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(472,'ru','Ð¤Ð°Ð¹Ð» robots.txt',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(473,'tr','Robots.txt DosyasÄ±',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(474,'zh','Robots.txtæ–‡ä»¶',0,46,'2017-01-10 15:46:13','2017-01-10 15:46:13'),(475,'de','Status',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(476,'es','Estado',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(477,'fr','statut',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(478,'ja','çŠ¶æ…‹',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(479,'it','Stato',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(480,'nl','toestand',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(481,'pl','Status',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(482,'pt','Status',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(483,'ru','ÐŸÐ¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð´ÐµÐ»',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(484,'tr','Durum',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(485,'zh','çŠ¶æ€',0,47,'2017-01-12 11:42:36','2017-01-12 11:42:36'),(486,'de','Warten auf Benutzer',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(487,'es','Esperando usuario',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(488,'fr','Attente de l\'utilisateur',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(489,'ja','ãƒ¦ãƒ¼ã‚¶ãƒ¼å¾…ã¡',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(490,'it','In attesa di utente',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(491,'nl','Wachten op gebruiker',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(492,'pl','Oczekiwanie na uÅ¼ytkownika',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(493,'pt','Aguardando UsuÃ¡rio',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(494,'ru','ÐžÐ¶Ð¸Ð´Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(495,'tr','KullanÄ±cÄ±yÄ± Bekliyor',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42'),(496,'zh','æ­£åœ¨ç­‰å¾…ç”¨æˆ·',0,48,'2017-01-12 11:42:42','2017-01-12 11:42:42');
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
INSERT INTO `PrimaryHostRecord` VALUES (1,'Creator','UprisingEngineer','2016-08-22 17:56:49','2017-02-08 16:25:52'),(2,'Publisher','Self-Published (removeblanklines.com)','2016-08-22 17:56:49','2017-02-08 16:25:52'),(3,'PublicReleaseDate','2016-08-28','2016-08-22 18:00:14','2017-02-08 16:25:52'),(4,'PrimaryImageRight','remove-blank-lines-right.jpg','2016-08-22 18:00:14','2017-02-08 16:25:52'),(5,'Author','UprisingEngineer','2016-08-22 18:00:14','2017-02-08 16:25:52'),(6,'BaseTemplate','file.html','2016-08-22 18:00:14','2017-02-08 16:25:52'),(7,'Classification','Web Application','2016-08-22 18:00:14','2017-02-08 16:25:52'),(8,'Contact','uprisingengineer@gmail.com','2016-08-22 18:00:14','2017-02-08 16:25:52'),(9,'Contributor','No Other Contributors','2016-08-22 18:00:14','2017-02-08 16:25:52'),(10,'Copyright','All Material Created by the Owners of this Site is Owned by the Site\'s Owners','2016-08-22 18:00:14','2017-02-08 16:25:52'),(11,'Rights','All Material Copyrighted by its Owners, Public Use as made available is allowed.','2016-08-22 18:00:14','2017-02-08 16:25:52'),(12,'Subject','Listing, Sorting, Organizing, Alphabetizing','2016-08-22 18:00:14','2017-02-08 16:25:52'),(13,'ApplicationName','Remove Blank Lines','2016-08-22 18:00:14','2017-02-08 16:25:52'),(14,'PrimaryImageLeft','remove-blank-lines-left.jpg','2016-08-22 18:00:14','2017-02-08 16:25:52'),(15,'NewsKeywords','Sorting Application, Web Application, Word Application','2016-08-22 18:00:14','2017-02-08 16:25:52'),(16,'NotReadyForSearch','1','2017-01-27 16:51:45','2017-02-08 16:25:52'),(17,'FullImage','remove-blank-lines-left-full.jpg','2017-02-08 16:25:52','2017-02-08 16:25:52');
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
INSERT INTO `Quote` VALUES (1,'I removed so many blank lines today!','','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (1,'remove blanks','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00'),(2,'remove empty lines','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00'),(3,'text document formatting','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00'),(4,'format text','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00'),(5,'formatting','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00'),(6,'blank lines','',1,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
INSERT INTO `TextBody` VALUES (1,'<p class=\"margin-0px\">So, you wanted to remove some blank lines, right?  That\'s what brought to you to this page, isn\'t it?</p>\r\n<br>\r\n<p class=\"margin-0px\">Good, I hope it helped.</p>','','',0,0,1,'2016-08-22 17:23:06','0000-00-00 00:00:00');
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
INSERT INTO `UserAdmin` VALUES (1,1,'2016-08-21 12:38:30','0000-00-00 00:00:00');
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
INSERT INTO `UserSession` VALUES (21,1,'5oLGu3HvPa8VoYEQUGDfECms67MOfbqgkXS+lTx=7T','2017-02-08 16:24:18','2016-08-22 17:16:40','2017-02-08 16:24:18');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'removeblanklines'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:36:06
