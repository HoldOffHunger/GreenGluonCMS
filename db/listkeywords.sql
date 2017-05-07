-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.173.170    Database: listkeywords
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
INSERT INTO `Assignment` VALUES (1,1,0,'2017-01-09 13:49:51','2017-01-09 13:49:51');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AvailabilityDateRange`
--

LOCK TABLES `AvailabilityDateRange` WRITE;
/*!40000 ALTER TABLE `AvailabilityDateRange` DISABLE KEYS */;
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
INSERT INTO `ChildRecordStats` VALUES (1,1,0,0,1,'2017-02-05 17:26:13','2017-05-06 18:17:25');
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
INSERT INTO `Description` VALUES (1,'Use this web app to list keywords and keyphrases.  You may remove html, ignore common words, and sort generated lists of keywords.','','en',1,'2017-01-09 13:49:50','2017-01-10 14:08:12');
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
INSERT INTO `Entry` VALUES (1,'List Keywords','Finding and Listing Your Keywords For You','','ListKeywords.com','2017-01-09 13:49:50','2017-01-10 14:08:12');
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
INSERT INTO `EntryPermission` VALUES (1,1,21,'2017-01-09 13:49:51','2017-01-09 13:49:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupList`
--

LOCK TABLES `LookupList` WRITE;
/*!40000 ALTER TABLE `LookupList` DISABLE KEYS */;
INSERT INTO `LookupList` VALUES (1,'LanguagesMainInstructionsContent',0,'2017-01-10 13:55:15','2017-01-10 13:55:15'),(2,'LanguagesShareWith',0,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(3,'LanguagesShare',0,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(4,'LanguagesMainImageQuote',0,'2017-01-10 14:05:52','2017-01-10 14:05:52'),(5,'LanguagesMainInstructionsHeader',0,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(6,'LanguagesAboutUsHeader',0,'2017-01-10 14:06:58','2017-01-10 14:06:58'),(7,'LanguagesAboutUsContent',0,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(8,'LanguagesMainHeader',0,'2017-01-10 14:11:56','2017-01-10 14:11:56'),(9,'LanguagesAboutHeader',0,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(10,'LanguagesMainKeywords',0,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(11,'LanguagesMainNewsKeywords',0,'2017-01-10 15:11:53','2017-01-10 15:11:53'),(12,'LanguagesMainClassification',0,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(13,'LanguagesContactHeader',0,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(14,'LanguagesHeader',0,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(15,'LanguagesRobotsHeader',0,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(16,'LanguagesSitemapHeader',0,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(17,'LanguagesContactUs',0,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(18,'LanguagesSiteCreator',0,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(19,'LanguagesSiteCreatedOn',0,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(20,'LanguagesContactCreator',0,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(21,'LanguagesAnd',0,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(22,'LanguagesOtherCountry',0,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(23,'LanguagesOtherCountries',0,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(24,'LanguagesSelectLanguageTitle',0,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(25,'LanguagesRobotsInstructions',0,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(26,'LanguagesRobotsFilename',0,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(27,'LanguagesSitemapInstructions',0,'2017-01-10 15:53:45','2017-01-10 15:53:45'),(28,'LanguagesMainStatusHeader',0,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(29,'LanguagesMainActivityHeader',0,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(30,'LanguagesMainList1Header',0,'2017-01-10 16:03:37','2017-01-10 16:03:37'),(31,'LanguagesMainList2Header',0,'2017-01-10 16:06:28','2017-01-10 16:06:28'),(32,'LanguagesMainList1Content',0,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(33,'LanguagesMainList2Content',0,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(34,'LanguagesMainButtonText',0,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(35,'LanguagesMainFirstFeatureOptionOneTitle',0,'2017-01-10 16:17:00','2017-01-10 16:17:00'),(36,'LanguagesMainFirstFeatureOptionOneMouseover',0,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(37,'LanguagesMainFirstFeatureOptionTwoTitle',0,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(38,'LanguagesMainFirstFeatureOptionTwoMouseover',0,'2017-01-10 16:24:30','2017-01-10 16:24:30'),(39,'LanguagesMainStripHTMLOption',0,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(40,'LanguagesMainStripHTMLDescription',0,'2017-01-10 16:32:44','2017-01-10 16:32:44'),(41,'LanguagesMainIgnoreCommonWordsOption',0,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(42,'LanguagesMainIgnoreCommonWordsDescription',0,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(43,'LanguagesMainIncludePhrasesOption',0,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(44,'LanguagesMainIncludePhrasesDescription',0,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(45,'LanguagesMainShowCountsOption',0,'2017-01-11 10:09:11','2017-01-11 10:09:11'),(46,'LanguagesMainShowCountsDescription',0,'2017-01-11 10:11:59','2017-01-11 10:11:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=513 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupListItem`
--

LOCK TABLES `LookupListItem` WRITE;
/*!40000 ALTER TABLE `LookupListItem` DISABLE KEYS */;
INSERT INTO `LookupListItem` VALUES (1,'de','Verwenden Sie diese Webanwendung, um Keywords und Keywords anzuzeigen. Sie kÃ¶nnen HTML entfernen, allgemeine WÃ¶rter ignorieren und generierte Listen von Keywords sortieren.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(2,'es','Utilice esta aplicaciÃ³n web para enumerar palabras clave y frases clave. Puede quitar html, ignorar palabras comunes y ordenar listas generadas de palabras clave.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(3,'fr','Utilisez cette application Web pour rÃ©pertorier les mots clÃ©s et les phrases clÃ©s. Vous pouvez supprimer html, ignorer les mots courants et trier les listes gÃ©nÃ©rÃ©es de mots clÃ©s.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(4,'ja','ã“ã®Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã‚’ä½¿ç”¨ã—ã¦ã€ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã¨ã‚­ãƒ¼ãƒ•ãƒ¬ãƒ¼ã‚ºã‚’ä¸€è¦§è¡¨ç¤ºã—ã¾ã™ã€‚ HTMLã‚’å‰Šé™¤ã—ãŸã‚Šã€ä¸€èˆ¬çš„ãªå˜èªžã‚’ç„¡è¦–ã—ãŸã‚Šã€ç”Ÿæˆã•ã‚ŒãŸã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã®ãƒªã‚¹ãƒˆã‚’ä¸¦ã¹æ›¿ãˆã‚‹ã“ã¨ãŒã§ãã¾ã™ã€‚',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(5,'it','Utilizzare questa applicazione web per elencare le parole chiave e frasi chiave. Ãˆ possibile rimuovere html, ignorare le parole comuni, e liste sorta generati di parole chiave.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(6,'nl','Gebruik deze web-app naar de lijst trefwoorden en omschrijvingen. U mag html te verwijderen, negeert gewone woorden, en sorteren gegenereerde lijsten met zoekwoorden.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(7,'pl','Za pomocÄ… tej aplikacji internetowej do listy sÅ‚Ã³w kluczowych i fraz. MoÅ¼esz usunÄ…Ä‡ html, ignorujÄ… wspÃ³lnych sÅ‚Ã³w i porzÄ…dek wygenerowane listy sÅ‚Ã³w kluczowych.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(8,'pt','Use este aplicativo da Web para listar palavras-chave e frases-chave. VocÃª pode remover html, ignorar palavras comuns e classificar listas geradas de palavras-chave.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(9,'ru','Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐ¹Ñ‚Ðµ ÑÑ‚Ð¾ Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð² ÑÐ¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² Ð¸ Ñ„Ñ€Ð°Ð·. Ð’Ñ‹ Ð¼Ð¾Ð¶ÐµÑ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ HTML, Ð¸Ð³Ð½Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¾Ð±Ñ‰Ð¸Ðµ ÑÐ»Ð¾Ð²Ð° Ð¸ ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð³ÐµÐ½ÐµÑ€Ð¸Ñ€ÑƒÐµÐ¼Ñ‹Ðµ ÑÐ¿Ð¸ÑÐºÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð².',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(10,'tr','Anahtar kelimeleri ve anahtar sÃ¶zcÃ¼k gruplarÄ±nÄ± listelemek iÃ§in bu web uygulamasÄ±nÄ± kullanÄ±n. Html\'yi kaldÄ±rabilir, ortak kelimeleri yoksayabilir ve oluÅŸturulan anahtar kelime listelerini sÄ±ralayabilirsiniz.',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(11,'zh','ä½¿ç”¨æ­¤ç½‘ç»œåº”ç”¨ç¨‹åºåˆ—å‡ºå…³é”®å­—å’Œå…³é”®çŸ­è¯­ã€‚ æ‚¨å¯ä»¥åˆ é™¤htmlï¼Œå¿½ç•¥å¸¸è§å­—è¯ï¼Œå¹¶å¯¹ç”Ÿæˆçš„å…³é”®å­—åˆ—è¡¨æŽ’åºã€‚',0,1,'2017-01-10 13:55:16','2017-01-10 14:01:01'),(12,'de','Teilen mit',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(13,'es','Compartir con',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(14,'fr','Partager avec',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(15,'ja','ã¨å…±æœ‰ã™ã‚‹',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(16,'it','Condividi con',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(17,'nl','Delen met',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(18,'pl','UdostÄ™pniaÄ‡',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(19,'pt','Compartilhar com',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(20,'ru','Ð Ð°Ð·Ñ€ÐµÑˆÐ¸Ñ‚ÑŒ',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(21,'tr','Ä°le paylaÅŸ',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(22,'zh','ä¸ŽæŸäººåˆ†äº«',0,2,'2017-01-10 14:01:47','2017-01-10 14:01:47'),(23,'de','Aktie',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(24,'es','Compartir',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(25,'fr','Partager',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(26,'ja','ã‚·ã‚§ã‚¢',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(27,'it','Condividere',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(28,'nl','Delen',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(29,'pl','DzieliÄ‡',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(30,'pt','Compartilhar',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(31,'ru','ÐŸÐ¾Ð´ÐµÐ»Ð¸Ñ‚ÑŒÑÑ',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(32,'tr','Pay',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(33,'zh','åˆ†äº«',0,3,'2017-01-10 14:01:53','2017-01-10 14:01:53'),(34,'de','Ich habe einige Keywords heute!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(35,'es','He generado algunas palabras clave hoy!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(36,'fr','J\'ai gÃ©nÃ©rÃ© quelques mots-clÃ©s aujourd\'hui!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(37,'ja','ç§ã¯ä»Šæ—¥ã„ãã¤ã‹ã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’ç”Ÿæˆã—ã¾ã—ãŸï¼',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(38,'it','Ho generato alcune parole chiave oggi!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(39,'nl','Ik gegenereerd sommige zoekwoorden vandaag!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(40,'pl','I generowane dziÅ› kilka sÅ‚Ã³w kluczowych!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(41,'pt','Eu gerei algumas palavras-chave hoje!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(42,'ru','Ð¯ ÑÐ¾Ð·Ð´Ð°Ð» Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² ÑÐµÐ³Ð¾Ð´Ð½Ñ!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(43,'tr','BugÃ¼n bazÄ± anahtar kelimeler Ã¼rettim!',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(44,'zh','æˆ‘ä»Šå¤©ç”Ÿæˆäº†ä¸€äº›å…³é”®å­—ï¼',0,4,'2017-01-10 14:05:52','2017-01-10 14:06:00'),(46,'de','Anleitung',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(47,'es','Instrucciones',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(48,'fr','Instructions',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(49,'ja','æŒ‡ç¤º',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(50,'it','Istruzioni',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(51,'nl','Instructies',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(52,'pl','Instrukcje',0,5,'2017-01-10 14:06:36','2017-01-10 14:06:36'),(53,'pt','InstruÃ§Ãµes',0,5,'2017-01-10 14:06:37','2017-01-10 14:06:37'),(54,'ru','InstrucÈ›iunitr',0,5,'2017-01-10 14:06:37','2017-01-10 14:06:37'),(55,'tr','Talimatlar',0,5,'2017-01-10 14:06:37','2017-01-10 14:06:37'),(56,'zh','è¯´æ˜Ž',0,5,'2017-01-10 14:06:37','2017-01-10 14:06:37'),(57,'de','Weitere Informationen Ã¼ber uns',0,6,'2017-01-10 14:06:58','2017-01-10 14:06:58'),(58,'es','MÃ¡s informaciÃ³n sobre nosotros',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(59,'fr','Plus d\'informations sur nous',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(60,'ja','ä¼šç¤¾ã®è©³ç´°æƒ…å ±',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(61,'it','Altre informazioni Chi siamo',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(62,'nl','Meer informatie over ons',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(63,'pl','WiÄ™cej informacji o nas',0,6,'2017-01-10 14:06:59','2017-01-10 14:06:59'),(64,'pt','Mais informaÃ§Ãµes Sobre nÃ³s',0,6,'2017-01-10 14:07:00','2017-01-10 14:07:00'),(65,'ru','Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ð¾ Ð½Ð°Ñ',0,6,'2017-01-10 14:07:00','2017-01-10 14:07:00'),(66,'tr','HakkÄ±mÄ±zda Daha Fazla Bilgi',0,6,'2017-01-10 14:07:00','2017-01-10 14:07:00'),(67,'zh','æ›´å¤šä¿¡æ¯å…³äºŽæˆ‘ä»¬',0,6,'2017-01-10 14:07:00','2017-01-10 14:07:00'),(68,'de','<p class=\"margin-0px\">Also, Sie wollten ein paar Worte zu sortieren, nicht wahr? Das ist, was Sie auf dieser Seite gebracht, ist es nicht?</p><br><p class=\"margin-0px\">Gut, ich hoffe, es half.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(69,'es','<p class=\"margin-0px\">Por lo tanto, usted quiere ordenar algunas palabras, Â¿verdad? Eso es lo que llevÃ³ a que a esta pÃ¡gina, Â¿verdad?</p><br><p class=\"margin-0px\">Bueno, espero que ayudÃ³.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(70,'fr','<p class=\"margin-0px\">Donc, vous vouliez trier quelques mots, non? VoilÃ  ce qui vous Ã  cette page, est-ce pas?</p><br><p class=\"margin-0px\">Bon, je l\'espÃ¨re, il a aidÃ©.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(71,'ja','<p class=\"margin-0px\">ã ã‹ã‚‰ã€ã‚ãªãŸã¯å³ã€ã„ãã¤ã‹ã®å˜èªžã‚’ä¸¦ã¹æ›¿ãˆã—ãŸã„ã§ã™ã‹ï¼Ÿãã‚Œã¯ãã‚Œã¯ã€ã“ã®ãƒšãƒ¼ã‚¸ã«ã‚ãªãŸã«ã‚‚ãŸã‚‰ã—ãŸã‚‚ã®ã¯ãªã„ã§ã™ã­ã€‚è‰¯ã„ã€ç§ã¯ãã‚ŒãŒåŠ©ã‘ã‚’é¡˜ã£ã¦ã„ã¾ã™ã€‚</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(72,'it','<p class=\"margin-0px\">Quindi, si voleva ordinare alcune parole, giusto? Questo Ã¨ quello che ha portato a voi a questa pagina, non Ã¨ vero?</p><br><p class=\"margin-0px\">Bene, spero che lo ha aiutato.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(73,'nl','<p class=\"margin-0px\">Dus, je wilde een paar woorden te sorteren, toch? Dat is wat u aangeboden op deze pagina, is het niet?</p><br><p class=\"margin-0px\">Goed, ik hoop dat het hielp.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(74,'pl','<p class=\"margin-0px\">WiÄ™c chciaÅ‚ uporzÄ…dkowaÄ‡ pewne sÅ‚owa, prawda? To, co przedstawia PaÅ„stwu do tej strony, prawda?</p><br><p class=\"margin-0px\">Dobra, mam nadziejÄ™, Å¼e pomogÅ‚o.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(75,'pt','<p class=\"margin-0px\">Assim, vocÃª quis classificar algumas palavras, certo? Isso Ã© o que trouxe vocÃª para esta pÃ¡gina, nÃ£o Ã©?</p><br><p class=\"margin-0px\">Bom, espero que ajudou.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(76,'ru','<p class=\"margin-0px\">Ð˜Ñ‚Ð°Ðº, Ð²Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ Ð¾Ñ‚ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð°, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸? Ð­Ñ‚Ð¾ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ð¿Ñ€Ð¸Ñ…Ð¾Ð´Ð¸Ñ‚ Ðº Ð²Ð°Ð¼ Ð½Ð° ÑÑ‚Ð¾Ð¹ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸?</p><br><p class=\"margin-0px\">Ð¥Ð¾Ñ€Ð¾ÑˆÐ¾, Ñ Ð½Ð°Ð´ÐµÑŽÑÑŒ, Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ð³Ð»Ð¾.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(77,'tr','<p class=\"margin-0px\">Yani, doÄŸru, bazÄ± kelimeler sÄ±ralamak istedim? Yani, bu sayfaya getirdi deÄŸil mi?</p><br><p class=\"margin-0px\">Ä°yi, ben yardÄ±mcÄ± umuyoruz.</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(78,'zh','<p class=\"margin-0px\">æ‰€ä»¥ï¼Œä½ æƒ³ä¸€äº›æŽ’åºçš„è¯ï¼Œå¯¹ä¸å¯¹ï¼Ÿè¿™å°±æ˜¯å¸¦ç»™ä½ è¿™ä¸ªé¡µé¢ï¼Œä¸æ˜¯å—ï¼Ÿ</p><br><p class=\"margin-0px\">å¥½ï¼Œæˆ‘å¸Œæœ›å®ƒå¸®åŠ©ã€‚</p>',0,7,'2017-01-10 14:07:12','2017-01-10 14:07:12'),(79,'de','List Keywords (www.listkeywords.com): Finden und Auflisten Ihrer Keywords fÃ¼r Sie',0,8,'2017-01-10 14:11:56','2017-01-10 14:11:56'),(80,'es','Palabras claves de la lista (www.listkeywords.com): Encontrando y enumerando sus palabras claves para usted',0,8,'2017-01-10 14:11:56','2017-01-10 14:11:56'),(81,'fr','Mots-clÃ©s de liste (www.listkeywords.com): Trouver et Ã©numÃ©rer vos mots-clÃ©s pour vous',0,8,'2017-01-10 14:11:56','2017-01-10 14:11:56'),(82,'ja','ãƒªã‚¹ãƒˆã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ï¼ˆwww.listkeywords.comï¼‰ï¼šã‚ãªãŸã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’è¦‹ã¤ã‘ã¦ãƒªã‚¹ãƒˆã™ã‚‹',0,8,'2017-01-10 14:11:56','2017-01-10 14:11:56'),(83,'it','Elenco di parole chiave (www.listkeywords.com): Ricerca e Listing le parole chiave per voi',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(84,'nl','Lijst Trefwoorden (www.listkeywords.com): Het vinden en Listing uw zoekwoorden For You',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(85,'pl','Lista sÅ‚Ã³w (www.listkeywords.com): Znajdowanie i Wystawianie sÅ‚owa kluczowe dla Ciebie',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(86,'pt','Palavras-chave da lista (www.listkeywords.com): Encontrando e lista suas palavras-chaves para vocÃª',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(87,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² (www.listkeywords.com): ÐŸÐ¾Ð¸ÑÐº Ð¸ Ð›Ð¸ÑÑ‚Ð¸Ð½Ð³ Ð²Ð°ÑˆÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð´Ð»Ñ Ð²Ð°Ñ',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(88,'tr','Liste Anahtar Kelimeleri (www.listkeywords.com): Sizin Ä°Ã§in Anahtar Kelimeleri Bulma ve Listeleme',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(89,'zh','åˆ—å‡ºå…³é”®å­—ï¼ˆwww.listkeywords.comï¼‰ï¼šæŸ¥æ‰¾å’Œåˆ—å‡ºæ‚¨çš„å…³é”®å­—',0,8,'2017-01-10 14:11:57','2017-01-10 14:11:57'),(90,'de','Ãœber List Keywords (www.listkeywords.com): Finden und Auflisten Ihrer Keywords fÃ¼r Sie',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(91,'es','Acerca de las palabras clave de la lista (www.listkeywords.com): BÃºsqueda y listado de sus palabras clave para usted',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(92,'fr','Ã€ propos des mots-clÃ©s de liste (www.listkeywords.com): Trouver et Ã©numÃ©rer vos mots-clÃ©s pour vous',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(93,'ja','ãƒªã‚¹ãƒˆã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã«ã¤ã„ã¦ï¼ˆwww.listkeywords.comï¼‰ï¼šã‚ãªãŸã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’è¦‹ã¤ã‘ã¦ä¸€è¦§è¡¨ç¤ºã™ã‚‹',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(94,'it','A proposito di elenco di parole chiave (www.listkeywords.com): Ricerca e Listing le parole chiave per voi',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(95,'nl','Over Lijst Trefwoorden (www.listkeywords.com): Het vinden en Listing uw zoekwoorden For You',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(96,'pl','O Lista sÅ‚Ã³w (www.listkeywords.com): Znajdowanie i Wystawianie sÅ‚owa kluczowe dla Ciebie',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(97,'pt','Sobre palavras-chave da lista (www.listkeywords.com): Encontrando e lista suas palavras-chaves para vocÃª',0,9,'2017-01-10 14:15:20','2017-01-10 14:15:20'),(98,'ru','Ðž Ð¡Ð¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² (www.listkeywords.com): ÐŸÐ¾Ð¸ÑÐº Ð¸ Ð›Ð¸ÑÑ‚Ð¸Ð½Ð³ Ð²Ð°ÑˆÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð´Ð»Ñ Ð²Ð°Ñ',0,9,'2017-01-10 14:15:21','2017-01-10 14:15:21'),(99,'tr','HakkÄ±nda Liste Anahtar Kelimeler (www.listkeywords.com): Sizin Ä°Ã§in Anahtar Kelimeleri Bulma ve Listeleme',0,9,'2017-01-10 14:15:21','2017-01-10 14:15:21'),(100,'zh','å…³äºŽåˆ—è¡¨å…³é”®å­—ï¼ˆwww.listkeywords.comï¼‰ï¼šæŸ¥æ‰¾å’Œåˆ—å‡ºæ‚¨çš„å…³é”®å­—',0,9,'2017-01-10 14:15:21','2017-01-10 14:15:21'),(101,'de','Keyword, Keyword, Kennung, Suchbegriff, Abfragebegriff, Suchabfrage, Suche, Liste',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(102,'es','Palabra clave, frase clave, identificador, tÃ©rmino de bÃºsqueda, tÃ©rmino de consulta, consulta de bÃºsqueda, bÃºsqueda, lista',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(103,'fr','Mot-clÃ©, mot-clÃ©, identifiant, terme de recherche, terme de requÃªte, requÃªte de recherche, recherche, liste',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(104,'ja','ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã€ã‚­ãƒ¼ãƒ•ãƒ¬ãƒ¼ã‚ºã€è­˜åˆ¥å­ã€æ¤œç´¢èªžå¥ã€æ¤œç´¢èªžå¥ã€æ¤œç´¢ã‚¯ã‚¨ãƒªã€æ¤œç´¢ã€ãƒªã‚¹ãƒˆ',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(105,'it','parola chiave, frase chiave, identificatore, termine di ricerca, termine della query, query di ricerca, di ricerca, la lista',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(106,'nl','trefwoord, keyphrase, identifier, zoekterm, zoekterm, zoekopdracht, zoeken, lijst',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(107,'pl','HasÅ‚o, keyphrase, identyfikator, wyszukiwania termin, termin zapytaÅ„, kwerendy wyszukiwania, wyszukiwanie, lista',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(108,'pt','Palavra-chave, keyphrase, identificador, termo de pesquisa, termo de consulta, consulta de pesquisa, pesquisa, lista',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(109,'ru','ÐšÐ»ÑŽÑ‡ÐµÐ²Ð¾Ðµ ÑÐ»Ð¾Ð²Ð¾, ÐºÐ»ÑŽÑ‡ÐµÐ²Ð°Ñ Ñ„Ñ€Ð°Ð·Ð°, Ð¸Ð´ÐµÐ½Ñ‚Ð¸Ñ„Ð¸ÐºÐ°Ñ‚Ð¾Ñ€, Ñ‚ÐµÑ€Ð¼Ð¸Ð½ Ð¿Ð¾Ð¸ÑÐºÐ°, Ñ‚ÐµÑ€Ð¼Ð¸Ð½ Ð·Ð°Ð¿Ñ€Ð¾ÑÐ°, Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ð¹ Ð·Ð°Ð¿Ñ€Ð¾Ñ, Ð¿Ð¾Ð¸ÑÐº, ÑÐ¿Ð¸ÑÐ¾Ðº',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(110,'tr','Anahtar kelime, anahtar deyimi, tanÄ±mlayÄ±cÄ±, arama terimi, sorgu sÃ¼resi, arama sorgusu, arama, liste',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(111,'zh','å…³é”®å­—ï¼Œå…³é”®çŸ­è¯­ï¼Œæ ‡è¯†ç¬¦ï¼Œæœç´¢é¡¹ï¼ŒæŸ¥è¯¢é¡¹ï¼Œæœç´¢æŸ¥è¯¢ï¼Œæœç´¢ï¼Œåˆ—è¡¨',0,10,'2017-01-10 15:08:37','2017-01-10 15:08:37'),(112,'de','Keyword-Anwendung, Webanwendung, Word-Anwendung',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(113,'es','AplicaciÃ³n de palabras clave, AplicaciÃ³n web, AplicaciÃ³n de Word',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(114,'fr','Application de mots clÃ©s, application Web, application Word',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(115,'ja','ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Wordã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(116,'it','Parole chiave di Application, applicazioni Web, Word Application',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(117,'nl','Keyword Application, Web Application, Word Application',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(118,'pl','Zastosowanie sÅ‚owo, Web Application Word Application',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(119,'pt','Aplicativo de palavra-chave, aplicativo da Web, aplicativo do Word',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(120,'ru','ÐšÐ»ÑŽÑ‡ÐµÐ²Ð¾Ðµ ÑÐ»Ð¾Ð²Ð¾ Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Word Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(121,'tr','Anahtar Kelime UygulamasÄ±, Web UygulamasÄ±, Kelime UygulamasÄ±',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(122,'zh','å…³é”®è¯åº”ç”¨ï¼ŒWebåº”ç”¨ï¼ŒWordåº”ç”¨',0,11,'2017-01-10 15:11:53','2017-01-10 15:13:06'),(125,'de','Internetanwendung',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(126,'es','AplicaciÃ³n web',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(127,'fr','Application Web',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(128,'ja','ã‚¦ã‚§ãƒ–ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(129,'it','Applicazione web',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(130,'nl','Web applicatie',0,12,'2017-01-10 15:13:43','2017-01-10 15:13:43'),(131,'pl','Aplikacja internetowa',0,12,'2017-01-10 15:13:44','2017-01-10 15:13:44'),(132,'pt','AplicaÃ§Ã£o web',0,12,'2017-01-10 15:13:44','2017-01-10 15:13:44'),(133,'ru','Ð’ÐµÐ± Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ',0,12,'2017-01-10 15:13:44','2017-01-10 15:13:44'),(134,'tr','Web UygulamasÄ±',0,12,'2017-01-10 15:13:44','2017-01-10 15:13:44'),(135,'zh','Webåº”ç”¨ç¨‹åº',0,12,'2017-01-10 15:13:44','2017-01-10 15:13:44'),(136,'de','Kontakt-Liste SchlÃ¼sselwÃ¶rter (www.listkeywords.com): Finden und Auflisten Ihrer SchlÃ¼sselwÃ¶rter fÃ¼r Sie',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(137,'es','Palabras clave de la lista de contactos (www.listkeywords.com): BÃºsqueda y listado de sus palabras clave para usted',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(138,'fr','Mots-clÃ©s de la liste de contacts (www.listkeywords.com): Trouver et rÃ©pertorier vos mots-clÃ©s pour vous',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(139,'ja','é€£çµ¡å…ˆãƒªã‚¹ãƒˆã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ï¼ˆwww.listkeywords.comï¼‰ï¼šã‚ãªãŸã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’æ¤œç´¢ã—ã¦ä¸€è¦§è¡¨ç¤ºã™ã‚‹',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(140,'it','Lista dei contatti parole chiave (www.listkeywords.com): Trovare e Listing le parole chiave per voi',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(141,'nl','Contact List Trefwoorden (www.listkeywords.com): Het vinden en Listing uw zoekwoorden For You',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(142,'pl','Lista kontaktÃ³w SÅ‚owa kluczowe (www.listkeywords.com): Znalezienie wystawianie swoich sÅ‚Ã³w kluczowych dla Ciebie',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(143,'pt','Palavras-chave da lista de contatos (www.listkeywords.com): Encontrando e listando suas palavras-chave para vocÃª',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(144,'ru','ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚ Ð¡Ð¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² (www.listkeywords.com): ÐŸÐ¾Ð¸ÑÐº Ð¸ Ð›Ð¸ÑÑ‚Ð¸Ð½Ð³ Ð²Ð°ÑˆÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð´Ð»Ñ Ð²Ð°Ñ',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(145,'tr','Ä°letiÅŸim Listesi Anahtar Kelimeleri (www.listkeywords.com): Sizin Ä°Ã§in Anahtar Kelimeleri Bulma ve Listeleme',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(146,'zh','è”ç³»äººåˆ—è¡¨å…³é”®å­—ï¼ˆwww.listkeywords.comï¼‰ï¼šæŸ¥æ‰¾å’Œåˆ—å‡ºæ‚¨çš„å…³é”®å­—',0,13,'2017-01-10 15:17:56','2017-01-10 15:17:56'),(147,'de','Sprache wÃ¤hlen FÃ¼r Sortieren WÃ¶rter: Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(148,'es','Para seleccionar Idioma Ordenar Palabras: ClasificaciÃ³n de listas de palabras para usted',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(149,'fr','SÃ©lectionnez la langue de tri mots: tri de vos listes de mots pour vous',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(150,'ja','ä¸¦ã¹æ›¿ãˆå˜èªžã®è¨€èªžã‚’é¸æŠžã—ã¦ãã ã•ã„ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(151,'it','Selezionare la lingua per Ordina parole: Ordinamento degli elenchi di parole per voi',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(152,'nl','Selecteer Taal Voor Sort woorden: het sorteren van je lijsten of Words For You',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(153,'pl','Wybierz jÄ™zyk Sortuj Words: Sortowanie listy sÅ‚Ã³w dla Ciebie',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(154,'pt','Selecione o idioma Para Classificar Palavras: Classificando suas listas de palavras para vocÃª',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(155,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº Ð´Ð»Ñ ÑÑ‚Ð°ÐºÐ¾Ð¹ Ð¡Ð»Ð¾Ð²Ð°: ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÑƒ ÑÐ¿Ð¸ÑÐºÐ¾Ð² ÑÐ»Ð¾Ð² For You',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(156,'tr','SÄ±ralama For Words Dil SeÃ§iniz: For You Kelimelerin Listeler SÄ±ralama',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(157,'zh','é€‰æ‹©è¯­è¨€æŽ’åºè¯ï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,14,'2017-01-10 15:18:21','2017-01-10 15:18:21'),(158,'de','Robots Datei fÃ¼r Liste Schlagworte (www.listkeywords.com): Suchen und Auflisten Ihrer Keywords fÃ¼r Sie',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(159,'es','Robots File For List Keywords (www.listkeywords.com): Encontrando y Listando Sus Palabras Claves Para Usted',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(160,'fr','Fichier de robots pour les mots-clÃ©s de liste (www.listkeywords.com): Trouver et Ã©numÃ©rer vos mots-clÃ©s pour vous',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(161,'ja','ãƒªã‚¹ãƒˆã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã®ãƒ­ãƒœãƒƒãƒˆãƒ•ã‚¡ã‚¤ãƒ«ï¼ˆwww.listkeywords.comï¼‰ï¼šã‚ãªãŸã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’è¦‹ã¤ã‘ã¦ä¸€è¦§è¡¨ç¤ºã™ã‚‹',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(162,'it','Robot file per elenco di parole chiave (www.listkeywords.com): Trovare e Listing le parole chiave per voi',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(163,'nl','Robots-bestand Voor Lijst Trefwoorden (www.listkeywords.com): Het vinden en Listing uw zoekwoorden For You',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(164,'pl','Roboty File list SÅ‚owa kluczowe (www.listkeywords.com): Znalezienie wystawianie swoich sÅ‚Ã³w kluczowych dla Ciebie',0,15,'2017-01-10 15:21:06','2017-01-10 15:21:06'),(165,'pt','Arquivo de robÃ´s para palavras-chave de lista (www.listkeywords.com): Encontrando e listando suas palavras-chave para vocÃª',0,15,'2017-01-10 15:21:07','2017-01-10 15:21:07'),(166,'ru','Ð Ð¾Ð±Ð¾Ñ‚Ñ‹ Ñ„Ð°Ð¹Ð» Ð´Ð»Ñ Ð¡Ð¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² (www.listkeywords.com): ÐŸÐ¾Ð¸ÑÐº Ð¸ Ð›Ð¸ÑÑ‚Ð¸Ð½Ð³ Ð²Ð°ÑˆÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð´Ð»Ñ Ð²Ð°Ñ',0,15,'2017-01-10 15:21:07','2017-01-10 15:21:07'),(167,'tr','Robotlar Liste Anahtar Kelimeleri Ä°Ã§in Dosya (www.listkeywords.com): Anahtar Kelimeleri Bulmak ve Listelemek',0,15,'2017-01-10 15:21:07','2017-01-10 15:21:07'),(168,'zh','æœºå™¨äººæ–‡ä»¶åˆ—è¡¨å…³é”®å­—ï¼ˆwww.listkeywords.comï¼‰ï¼šæŸ¥æ‰¾å’Œåˆ—å‡ºæ‚¨çš„å…³é”®å­—ä¸ºæ‚¨',0,15,'2017-01-10 15:21:07','2017-01-10 15:21:07'),(169,'de','Sitemap fÃ¼r Liste StichwÃ¶rter (www.listkeywords.com): Finden und Auflisten Ihrer Keywords fÃ¼r Sie',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(170,'es','Mapa del sitio para palabras clave de la lista (www.listkeywords.com): BÃºsqueda y listado de sus palabras clave para usted',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(171,'fr','Plan du site Pour les mots-clÃ©s de la liste (www.listkeywords.com): Trouver et rÃ©pertorier vos mots-clÃ©s pour vous',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(172,'ja','ãƒªã‚¹ãƒˆã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã®ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ï¼ˆwww.listkeywords.comï¼‰ï¼šã‚ãªãŸã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’è¦‹ã¤ã‘ã¦ä¸€è¦§è¡¨ç¤ºã™ã‚‹',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(173,'it','Mappa del sito per la lista di parole chiave (www.listkeywords.com): Ricerca e Listing le parole chiave per voi',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(174,'nl','Sitemap Voor Lijst Trefwoorden (www.listkeywords.com): Het vinden en Listing uw zoekwoorden For You',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(175,'pl','Mapa list SÅ‚owa kluczowe (www.listkeywords.com): Znajdowanie i Wystawianie sÅ‚owa kluczowe dla Ciebie',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(176,'pt','Sitemap para palavras-chaves da lista (www.listkeywords.com): Encontrando e alistando suas palavras-chaves para vocÃª',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(177,'ru','ÐšÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð° Ð”Ð»Ñ Ð¡Ð¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² (www.listkeywords.com): ÐŸÐ¾Ð¸ÑÐº Ð¸ Ð›Ð¸ÑÑ‚Ð¸Ð½Ð³ Ð²Ð°ÑˆÐ¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð´Ð»Ñ Ð²Ð°Ñ',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(178,'tr','92/5000 Liste Anahtar Kelimeleri Ä°Ã§in Site HaritasÄ± (www.listkeywords.com): Sizin Ä°Ã§in Anahtar Kelimeleri Bulma ve Listeleme',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(179,'zh','ç½‘ç«™åœ°å›¾åˆ—è¡¨å…³é”®å­—ï¼ˆwww.listkeywords.comï¼‰ï¼šæŸ¥æ‰¾å’Œåˆ—å‡ºæ‚¨çš„å…³é”®å­—',0,16,'2017-01-10 15:23:40','2017-01-10 15:23:40'),(180,'de','Kontaktiere uns',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(181,'es','ContÃ¡ctenos',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(182,'fr','Contactez nous',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(183,'ja','ãŠå•ã„åˆã‚ã›',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(184,'it','Contattaci',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(185,'nl','Neem contact met ons op',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(186,'pl','Skontaktuj siÄ™ z nami',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(187,'pt','Entre Em Contato Conosco',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(188,'ru','Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(189,'tr','Bizimle iletiÅŸime geÃ§in',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(190,'zh','è”ç³»æˆ‘ä»¬',0,17,'2017-01-10 15:25:05','2017-01-10 15:25:05'),(191,'de','Site Creator',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(192,'es','Creador del sitio',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(193,'fr','site Creator',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(194,'ja','ã‚µã‚¤ãƒˆä½œæˆè€…',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(195,'it','Creatore del sito',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(196,'nl','Site Creator',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(197,'pl','TwÃ³rca strony',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(198,'pt','Criador do site',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(199,'ru','Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÐµÐ»ÑŒ ÑÐ°Ð¹Ñ‚Ð°',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(200,'tr','Site Creator',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(201,'zh','ç½‘ç«™çš„åˆ›å»ºè€…',0,18,'2017-01-10 15:25:13','2017-01-10 15:25:13'),(202,'de','Webseite Erstellt am',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(203,'es','Sitio desarrollado en',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(204,'fr','Site CrÃ©Ã© le',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(205,'ja','ã‚µã‚¤ãƒˆã«ã¯ã€ä¸Šã§ä½œæˆã—ã¾ã™',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(206,'it','Sito Creato il',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(207,'nl','Site Gemaakt op',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(208,'pl','Strona stworzona dniu',0,19,'2017-01-10 15:25:19','2017-01-10 15:25:19'),(209,'pt','Site criado em',0,19,'2017-01-10 15:25:20','2017-01-10 15:25:20'),(210,'ru','Ð¡Ð°Ð¹Ñ‚ ÑÐ¾Ð·Ð´Ð°Ð½ Ð½Ð°',0,19,'2017-01-10 15:25:20','2017-01-10 15:25:20'),(211,'tr','Site Ã¼zerinde dÃ¼zenlendi',0,19,'2017-01-10 15:25:20','2017-01-10 15:25:20'),(212,'zh','ç½‘ç«™åˆ›å»ºæ—¶é—´',0,19,'2017-01-10 15:25:20','2017-01-10 15:25:20'),(213,'de','Kontakt Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(214,'es','Contacto Creador',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(215,'fr','Contactez Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(216,'ja','é€£çµ¡ã‚¯ãƒªã‚¨ãƒ¼ã‚¿ãƒ¼',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(217,'it','Contatto Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(218,'nl','Contact Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(219,'pl','Kontakt Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(220,'pt','Contact Creator',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(221,'ru','ÐšÐ°Ðº ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð¢Ð²Ð¾Ñ€Ñ†Ð¾Ð¼',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(222,'tr','Ä°letiÅŸim OluÅŸturan',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(223,'zh','è”ç³»é€ ç‰©ä¸»',0,20,'2017-01-10 15:25:27','2017-01-10 15:25:27'),(224,'de','Und',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(225,'es','Y',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(226,'fr','Et',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(227,'ja','ãã—ã¦',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(228,'it','E',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(229,'nl','En',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(230,'pl','I',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(231,'pt','E',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(232,'ru','Ð Ñ‚Ð°ÐºÐ¶Ðµ',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(233,'tr','Ve',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(234,'zh','å’Œ',0,21,'2017-01-10 15:27:54','2017-01-10 15:27:54'),(235,'de','anderes Land',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(236,'es','otro paÃ­s',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(237,'fr','autre pays',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(238,'ja','ä»–ã®å›½',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(239,'it','altro paese',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(240,'nl','ander land',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(241,'pl','inne paÅ„stwo',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(242,'pt','outro paÃ­s',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(243,'ru','Ð´Ñ€ÑƒÐ³Ð°Ñ ÑÑ‚Ñ€Ð°Ð½Ð°',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(244,'tr','diÄŸer Ã¼lke',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(245,'zh','å…¶ä»–å›½å®¶',0,22,'2017-01-10 15:28:02','2017-01-10 15:28:02'),(246,'de','andere LÃ¤nder',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(247,'es','otros paÃ­ses',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(248,'fr','autres pays',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(249,'ja','ä»–ã®å›½ã€…',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(250,'it','altri paesi',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(251,'nl','andere landen',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(252,'pl','inne kraje',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(253,'pt','outros paÃ­ses',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(254,'ru','Ð´Ñ€ÑƒÐ³Ð¸Ðµ ÑÑ‚Ñ€Ð°Ð½Ñ‹',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(255,'tr','diÄŸer Ã¼lkeler',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(256,'zh','å…¶ä»–å›½å®¶',0,23,'2017-01-10 15:28:08','2017-01-10 15:28:08'),(257,'de','Sprache auswÃ¤hlen',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(258,'es','Seleccione el idioma',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(259,'fr','Choisir la langue',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(260,'ja','è¨€èªžã‚’é¸æŠžã™ã‚‹',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(261,'it','Seleziona la lingua',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(262,'nl','Selecteer Taal',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(263,'pl','Wybierz jÄ™zyk',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(264,'pt','Selecione o idioma',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(265,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(266,'tr','Dil SeÃ§in',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(267,'zh','é€‰æ‹©è¯­è¨€',0,24,'2017-01-10 15:31:40','2017-01-10 15:31:40'),(268,'de','Dies ist die von Menschen lesbare Version unserer robots.txt-Datei. Die <a href=\"http://www.listkeywords.com/robots.txt\"> Robots.txt-Datei </a> ist, was die tatsÃ¤chlichen Suchmaschinen crawlen werden. Eine alternative <a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xml-Datei </a> wurde ebenfalls bereitgestellt, wenn Sie etwas maschinenlesbarer benÃ¶tigen. Die XML-Version enthÃ¤lt auÃŸerdem eine <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xml Human-lesbare Datei </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(269,'es','Esta es la versiÃ³n legible por humanos de nuestro archivo robots.txt. El <a href=\"http://www.listkeywords.com/robots.txt\"> Archivo Robots.txt </a> es lo que los motores de bÃºsqueda actuales se arrastrarÃ¡n. TambiÃ©n se ha proporcionado un archivo <a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xml </a> alternativo si necesita algo mÃ¡s legible por mÃ¡quina. La versiÃ³n XML tambiÃ©n tiene un <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> archivo Robots.xml legible </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(270,'fr','Il s\'agit de la version lisible par l\'utilisateur de notre fichier robots.txt. Le <a href=\"http://www.listkeywords.com/robots.txt\"> fichier Robots.txt </a> est ce que les moteurs de recherche rÃ©els ramper. Un autre <a href=\"http://www.listkeywords.com/robots.xml\"> Fichier Robots.xml </a> a Ã©galement Ã©tÃ© fourni si vous avez besoin de quelque chose de plus lisible par machine. La version XML dispose Ã©galement d\'un <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Fichier Human-Readable de Robots.xml </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(271,'ja','ã“ã‚Œã¯ã€äººé–“ãŒèª­ã‚ã‚‹robots.txtãƒ•ã‚¡ã‚¤ãƒ«ã®ãƒãƒ¼ã‚¸ãƒ§ãƒ³ã§ã™ã€‚ <a href=\"http://www.listkeywords.com/robots.txt\"> Robots.txtãƒ•ã‚¡ã‚¤ãƒ«</a>ã¯ã€å®Ÿéš›ã®æ¤œç´¢ã‚¨ãƒ³ã‚¸ãƒ³ãŒã‚¯ãƒ­ãƒ¼ãƒ«ã™ã‚‹ã‚‚ã®ã§ã™ã€‚ ä»–ã®<a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xmlãƒ•ã‚¡ã‚¤ãƒ«</a>ã‚‚ç”¨æ„ã•ã‚Œã¦ã„ã¾ã™ã€‚ XMLãƒãƒ¼ã‚¸ãƒ§ãƒ³ã«ã¯ã€<a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xmläººé–“ãŒèª­ã‚ã‚‹ãƒ•ã‚¡ã‚¤ãƒ«</a>ã‚‚ã‚ã‚Šã¾ã™ã€‚',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(272,'it','Questa Ã¨ la versione leggibile del nostro file robots.txt. La <a href=\"http://www.listkeywords.com/robots.txt\"> robots.txt File </a> Ã¨ ciÃ² che effettivamente i motori di ricerca esegue la scansione. Un <a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xml file alternativo </a> Ã¨ stato fornito anche se avete bisogno di qualcosa di piÃ¹ leggibile dalla macchina. La versione XML ha anche un <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xml leggibile File </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(273,'nl','Dit is de leesbare versie van onze robots.txt bestand. De <a href=\"http://www.listkeywords.com/robots.txt\"> Robots.txt bestand </a> is wat de werkelijke zoekmachines zullen kruipen. Een alternatieve <a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xml File </a> ook heeft verstrekt als je iets meer machine leesbare nodig. De XML-versie heeft ook een <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xml leesbare File </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(274,'pl','Ta wersja jest czytelny dla czÅ‚owieka naszego pliku robots.txt. <a Href=\"http://www.listkeywords.com/robots.txt\"> pliku robots.txt </a> co rzeczywiste wyszukiwarek bÄ™dzie indeksowaÄ‡. Alternatywny href=\"http://www.listkeywords.com/robots.xml\"> <a Robots.xml pliku </a> zostaÅ‚y przekazane, jeÅ›li potrzebujesz czegoÅ› wiÄ™cej do odczytu maszynowego. Wersja XML ma rÃ³wnieÅ¼ href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> <a Robots.xml czytelny dla czÅ‚owieka </a> plikÃ³w.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(275,'pt','Esta Ã© a versÃ£o legÃ­vel do nosso arquivo robots.txt. O <a href=\"http://www.listkeywords.com/robots.txt\"> Arquivo Robots.txt </a> Ã© o que os mecanismos de pesquisa reais irÃ£o rastrear. Um <a href=\"http://www.listkeywords.com/robots.xml\"> arquivo Robots.xml alternativo </a> tambÃ©m foi fornecido se vocÃª precisar de algo mais legÃ­vel por mÃ¡quina. A versÃ£o XML tambÃ©m tem um <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Arquivo de Human-Readable Robots.xml </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(276,'ru','Ð­Ñ‚Ð¾ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº-ÑÑ‡Ð¸Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð²ÐµÑ€ÑÐ¸Ñ Ð½Ð°ÑˆÐµÐ³Ð¾ Ñ„Ð°Ð¹Ð»Ð° robots.txt. <a Href=\"http://www.listkeywords.com/robots.txt\"> Ð¤Ð°Ð¹Ð» robots.txt </a> ÑÐ²Ð»ÑÐµÑ‚ÑÑ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ñ„Ð°ÐºÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ðµ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ ÑÐºÐ°Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ. ÐÐ»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¹ Robots.xml Ñ„Ð°Ð¹Ð»Ð° <a href=\"http://www.listkeywords.com/robots.xml\"> </a> Ñ‚Ð°ÐºÐ¶Ðµ Ð¿Ñ€Ð¸ ÑƒÑÐ»Ð¾Ð²Ð¸Ð¸, ÐµÑÐ»Ð¸ Ð²Ð°Ð¼ Ð½ÑƒÐ¶Ð½Ð¾ Ñ‡Ñ‚Ð¾-Ñ‚Ð¾ Ð±Ð¾Ð»ÐµÐµ Ð¼Ð°ÑˆÐ¸Ð½Ð¾Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼ÑƒÑŽ. Ð’ÐµÑ€ÑÐ¸Ñ XML Ñ‚Ð°ÐºÐ¶Ðµ Ð¸Ð¼ÐµÐµÑ‚ <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xml Ñ‡ÐµÐ»Ð¾Ð²ÐµÐºÐ¾-Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼Ð¾Ð¼ Ñ„Ð°Ð¹Ð»Ð° </a>.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(277,'tr','Bu, robots.txt dosyamÄ±zÄ±n okunabilir bir versiyonudur. GerÃ§ek arama motorlarÄ±nÄ±n tarayacaÄŸÄ± <a href=\"http://www.listkeywords.com/robots.txt\"> Robots.txt DosyasÄ± </a>. Makineden okunabilir bir ÅŸey lazÄ±m iseniz, alternatif bir <a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xml DosyasÄ± </a> da saÄŸlanmÄ±ÅŸtÄ±r. XML sÃ¼rÃ¼mÃ¼ ayrÄ±ca bir <a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xml Ä°nsan Okunabilir DosyasÄ± </a> iÃ§eriyor.',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(278,'ch','è¿™æ˜¯æˆ‘ä»¬çš„robots.txtæ–‡ä»¶çš„äººå·¥å¯è¯»ç‰ˆæœ¬ã€‚ <a href=\"http://www.listkeywords.com/robots.txt\"> Robots.txtæ–‡ä»¶</a>æ˜¯å®žé™…æœç´¢å¼•æ“ŽæŠ“å–çš„å†…å®¹ã€‚ å¦‚æžœæ‚¨éœ€è¦æ›´ä¸ºæœºå™¨å¯è¯»çš„å†…å®¹ï¼Œè¿˜å¯ä»¥æä¾›å¤‡ç”¨çš„<a href=\"http://www.listkeywords.com/robots.xml\"> Robots.xmlæ–‡ä»¶</a>ã€‚ XMLç‰ˆæœ¬è¿˜æœ‰ä¸€ä¸ª<a href=\"http://www.listkeywords.com/robots.xml?humanreadable=1\"> Robots.xmlå¯è¯»æ–‡ä»¶</a>ã€‚',0,25,'2017-01-10 15:40:28','2017-01-10 15:40:28'),(279,'de','Robots.txt Datei',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(280,'es','Archivo Robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(281,'fr','Fichier Robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(282,'ja','Robots.txtãƒ•ã‚¡ã‚¤ãƒ«',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(283,'it','file robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(284,'nl','robots.txt bestand',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(285,'pl','Plik robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(286,'pt','Arquivo Robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(287,'ru','Ð¤Ð°Ð¹Ð» robots.txt',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(288,'tr','Robots.txt DosyasÄ±',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(289,'zh','Robots.txtæ–‡ä»¶',0,26,'2017-01-10 15:45:23','2017-01-10 15:45:23'),(290,'de','Dies ist die Sitemap. Eine Liste aller Seiten auf dieser Seite finden Sie hier. Die <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML Sitemap </a> und ein <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Mensch-lesbare XML-Sitemap </a> sowie eine <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT-Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(291,'es','Este es el mapa del sitio. EncontrarÃ¡ una lista de todas las pÃ¡ginas de este sitio aquÃ­. El <a href=\"http://www.listkeywords.com/sitemap.xml\"> Sitemap XML </a> y un <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Sitemap XML legible para humanos </a>, asÃ­ como un <a href=\"http://www.listkeywords.com/sitemap.txt\"> Sitemap TXT </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(292,'fr','C\'est la carte du site. Vous trouverez une liste de toutes les pages sur ce site ici. Le <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML Sitemap </a> et un <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Sitemap XML lisible par l\'homme </a> sont Ã©galement disponibles, ainsi qu\'un <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(293,'ja','ã“ã‚Œã¯ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã§ã™ã€‚ ã‚ãªãŸã¯ã“ã®ã‚µã‚¤ãƒˆã®ã™ã¹ã¦ã®ãƒšãƒ¼ã‚¸ã®ãƒªã‚¹ãƒˆã‚’ã“ã“ã«è¦‹ã¤ã‘ã‚‹ã§ã—ã‚‡ã†ã€‚ <a href=\"http://www.listkeywords.com/sitemap.xml\"> XMLã‚µã‚¤ãƒˆãƒžãƒƒãƒ—</a>ã¨<a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Human-Readable XML Sitemap </a>ã€<a href=\"http://www.listkeywords.com/sitemap.txt\"> TXTã‚µã‚¤ãƒˆãƒžãƒƒãƒ—</a>ã‚‚åˆ©ç”¨ã§ãã¾ã™ã€‚',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(294,'it','Questa Ã¨ la mappa del sito. Troverete un elenco di ogni pagina di questo sito qui. La <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML Sitemap </a> e un <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Sitemap XML leggibile </a> sono disponibili anche, cosÃ¬ come un <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(295,'nl','Dit is de site map. U ziet een lijst van alle pagina\'s op deze site hier. De <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML sitemap </a> en een <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> mensen leesbare XML sitemap </a> beschikbaar zijn ook, evenals een <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(296,'pl','Jest to mapa serwisu. Znajdziesz tu listÄ™ wszystkich stron na tej stronie tutaj. Href=\"http://www.listkeywords.com/sitemap.xml\"> <a XML Sitemap </a> a <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> czytelny dla czÅ‚owieka XML Sitemap </a> sÄ… rÃ³wnieÅ¼ dostÄ™pne, a takÅ¼e <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(297,'pt','Este Ã© o mapa do site. VocÃª encontrarÃ¡ uma lista de todas as pÃ¡ginas deste site aqui. O <a href=\"http://www.listkeywords.com/sitemap.xml\"> Sitemap XML </a> e um <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Sitemap XML Human-Readable </a> estÃ£o tambÃ©m disponÃ­veis, assim como um <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(298,'ru','Ð­Ñ‚Ð¾ ÐºÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð°. Ð’Ñ‹ Ð½Ð°Ð¹Ð´ÐµÑ‚Ðµ ÑÐ¿Ð¸ÑÐ¾Ðº Ð²ÑÐµÑ… ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ† Ð½Ð° ÑÑ‚Ð¾Ð¼ ÑÐ°Ð¹Ñ‚Ðµ Ð·Ð´ÐµÑÑŒ. <a Href=\"http://www.listkeywords.com/sitemap.xml\"> XML Sitemap </a> Ð¸ <A HREF = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"> Ñ‡ÐµÐ»Ð¾Ð²ÐµÐºÐ¾-Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼Ð¾Ð¼ Sitemap XML </a> Ñ‚Ð°ÐºÐ¶Ðµ Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹, Ð° Ñ‚Ð°ÐºÐ¶Ðµ <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(299,'tr','BurasÄ± site haritasÄ±. Bu sitedeki her sayfanÄ±n bir listesini buradan bulacaksÄ±nÄ±z. <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML Site HaritasÄ± </a> ve bir <a href = \"http://www.listkeywords.com/sitemap.xml?humanreadable= 1 \"Ä°nsana Okunabilir XML Site HaritasÄ± </a> yanÄ± sÄ±ra bir <a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Site HaritasÄ± </a> da bulunmaktadÄ±r.',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(300,'zh','è¿™æ˜¯ç«™ç‚¹åœ°å›¾ã€‚ æ‚¨å°†åœ¨æ­¤å¤„æ‰¾åˆ°æ­¤ç½‘ç«™ä¸Šæ¯ä¸ªç½‘é¡µçš„åˆ—è¡¨ã€‚ <a href=\"http://www.listkeywords.com/sitemap.xml\"> XML Sitemap </a>å’Œ<a href =â€œhttp://www.listkeywords.com/sitemap.xml?humanreadable= 1â€œ> Human-Readable XML Sitemap </a>ï¼Œä»¥åŠ<a href=\"http://www.listkeywords.com/sitemap.txt\"> TXT Sitemap </a>ã€‚',0,27,'2017-01-10 15:53:46','2017-01-10 15:53:46'),(301,'de','Status',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(302,'es','Estado',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(303,'fr','statut',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(304,'ja','çŠ¶æ…‹',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(305,'it','Stato',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(306,'nl','toestand',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(307,'pl','Status',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(308,'pt','Status',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(309,'ru','ÐŸÐ¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð´ÐµÐ»',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(310,'tr','Durum',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(311,'zh','çŠ¶æ€',0,28,'2017-01-10 15:57:18','2017-01-10 15:57:18'),(312,'de','Warten auf Benutzer',0,29,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(313,'es','Esperando usuario',0,29,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(314,'fr','Attente de l\'utilisateur',0,29,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(315,'ja','ãƒ¦ãƒ¼ã‚¶ãƒ¼å¾…ã¡',0,29,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(316,'it','In attesa di utente',0,29,'2017-01-10 16:00:58','2017-01-10 16:00:58'),(317,'nl','Wachten op gebruiker',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(318,'pl','Oczekiwanie na uÅ¼ytkownika',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(319,'pt','Aguardando UsuÃ¡rio',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(320,'ru','ÐžÐ¶Ð¸Ð´Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(321,'tr','KullanÄ±cÄ±yÄ± Bekliyor',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(322,'zh','æ­£åœ¨ç­‰å¾…ç”¨æˆ·',0,29,'2017-01-10 16:00:59','2017-01-10 16:00:59'),(323,'de','Text, um SchlÃ¼sselwÃ¶rter zu finden',0,30,'2017-01-10 16:03:37','2017-01-10 16:03:37'),(324,'es','Texto para encontrar palabras clave desde',0,30,'2017-01-10 16:03:37','2017-01-10 16:03:37'),(325,'fr','Texte pour trouver des mots-clÃ©s Ã  partir de',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(326,'ja','ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’æ¤œç´¢ã™ã‚‹ãƒ†ã‚­ã‚¹ãƒˆ',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(327,'it','Testo da trovare le parole chiave Da',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(328,'nl','Text te vinden Trefwoorden Van',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(329,'pl','Tekst znaleÅºÄ‡ sÅ‚owa kluczowe z',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(330,'pt','Texto para localizar palavras-chave a partir de',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(331,'ru','Ð¢ÐµÐºÑÑ‚ ÐÐ°Ð¹Ñ‚Ð¸ ÑÐ»Ð¾Ð²Ð°',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(332,'tr','Kimden Anahtar Kelimeleri Bulacak Metin',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(333,'zh','ç”¨äºŽæŸ¥æ‰¾å…³é”®å­—çš„æ–‡æœ¬',0,30,'2017-01-10 16:03:38','2017-01-10 16:03:38'),(334,'de','SchlÃ¼sselwÃ¶rter aus bereitgestelltem Text',0,31,'2017-01-10 16:06:28','2017-01-10 16:06:28'),(335,'es','Palabras clave del texto proporcionado',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(336,'fr','Mots-clÃ©s issus du texte fourni',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(337,'ja','æä¾›ã•ã‚ŒãŸãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰ã®ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(338,'it','Parole da testo fornito',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(339,'nl','Trefwoorden uit Mits Text',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(340,'pl','SÅ‚owa z dostarczonego tekstu',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(341,'pt','Palavras-chave do texto fornecido',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(342,'ru','ÐšÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð¸Ð· Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð½Ð¾Ð³Ð¾ Ñ‚ÐµÐºÑÑ‚Ð°',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(343,'tr','SaÄŸlanan Metin\'den Anahtar Kelimeler',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(344,'zh','æä¾›çš„æ–‡æœ¬çš„å…³é”®å­—',0,31,'2017-01-10 16:06:29','2017-01-10 16:06:29'),(345,'de','Geben Sie den Text ein oder kopieren Sie ihn und fÃ¼gen Sie ihn in dieses Textfeld ein.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(346,'es','Escriba o copie y pegue el texto en este cuadro de texto.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(347,'fr','Saisissez ou copiez-collez votre texte dans cette zone de texte.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(348,'ja','ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ãƒ†ã‚­ã‚¹ãƒˆã‚’å…¥åŠ›ã™ã‚‹ã‹ã‚³ãƒ”ãƒ¼ï¼†ãƒšãƒ¼ã‚¹ãƒˆã—ã¾ã™ã€‚',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(349,'it','Digitare o copiare e incollare il testo in questa casella di testo.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(350,'nl','Typ of kopieer-en-plak uw tekst in dit tekstvak.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(351,'pl','Wpisz lub skopiuj i wklej tekst w polu tekstowym.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(352,'pt','Escreva ou copie e cole o texto nesta caixa de texto.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(353,'ru','Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð»Ð¸ ÑÐºÐ¾Ð¿Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¸ Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ Ñ‚ÐµÐºÑÑ‚ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(354,'tr','Metninizi bu metin kutusuna yazÄ±n veya kopyalayÄ±n ve yapÄ±ÅŸtÄ±rÄ±n.',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(355,'zh','åœ¨æ­¤æ–‡æœ¬æ¡†ä¸­è¾“å…¥æˆ–å¤åˆ¶å¹¶ç²˜è´´æ‚¨çš„æ–‡æœ¬ã€‚',0,32,'2017-01-10 16:09:12','2017-01-10 16:09:12'),(356,'de','Dann wird Ihre Keywords-Liste in diesem Textfeld angezeigt.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(357,'es','A continuaciÃ³n, la lista de palabras clave aparecerÃ¡ en este cuadro de texto.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(358,'fr','Ensuite, votre liste de mots clÃ©s apparaÃ®tra dans cette zone de texte.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(359,'ja','æ¬¡ã«ã€ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ãƒªã‚¹ãƒˆãŒè¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(360,'it','Allora la vostra lista di parole chiave verrÃ  visualizzato in questa casella di testo.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(361,'nl','Dan zal je lijst met sleutelwoorden op dit tekstvak.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(362,'pl','NastÄ™pnie pojawi siÄ™ lista sÅ‚Ã³w kluczowych w polu tekstowym.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(363,'pt','Em seguida, sua lista de palavras-chave aparecerÃ¡ nesta caixa de texto.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(364,'ru','Ð¢Ð¾Ð³Ð´Ð° Ð²Ð°Ñˆ ÑÐ¿Ð¸ÑÐ¾Ðº ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² Ð¿Ð¾ÑÐ²Ð¸Ñ‚ÑÑ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(365,'tr','ArdÄ±ndan, bu metin kutusuna anahtar kelimeler listeniz gÃ¶rÃ¼necektir.',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(366,'zh','ç„¶åŽï¼Œæ‚¨çš„å…³é”®å­—åˆ—è¡¨å°†æ˜¾ç¤ºåœ¨æ­¤æ–‡æœ¬æ¡†ä¸­ã€‚',0,33,'2017-01-10 16:11:36','2017-01-10 16:11:36'),(367,'de','SchlÃ¼sselwÃ¶rter finden',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(368,'es','Buscar palabras clave',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(369,'fr','Trouver des mots-clÃ©s',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(370,'ja','ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’æŽ¢ã™',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(371,'it','trovare le parole chiave',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(372,'nl','Zoek Trefwoorden',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(373,'pl','ZnajdÅº sÅ‚owa kluczowe',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(374,'pt','Procurar palavras-chave',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(375,'ru','ÐÐ°Ð¹Ñ‚Ð¸ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð°',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(376,'tr','Anahtar Kelimeleri Bul',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(377,'zh','æŸ¥æ‰¾å…³é”®å­—',0,34,'2017-01-10 16:14:15','2017-01-10 16:14:15'),(378,'de','Am hÃ¤ufigsten am wenigsten verbreitet',0,35,'2017-01-10 16:17:00','2017-01-10 16:17:00'),(379,'es','Lo mÃ¡s comÃºn a lo menos comÃºn',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(380,'fr','Le plus commun au moins commun',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(381,'ja','æœ€ã‚‚ä¸€èˆ¬çš„ãªã‚‚ã®ã‹ã‚‰æœ€ã‚‚ä¸€èˆ¬çš„ãªã‚‚ã®ã¾ã§',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(382,'it','PiÃ¹ comuni al minor Comune',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(383,'nl','Meest voorkomende naar minst Common',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(384,'pl','NajczÄ™stsze z najmniejszÄ… wspÃ³lnÄ…',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(385,'pt','Mais comum a menos comum',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(386,'ru','ÐÐ°Ð¸Ð±Ð¾Ð»ÐµÐµ Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ñ‹Ðµ Ð² Ð½Ð°Ð¸Ð¼ÐµÐ½ÐµÐµ Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ñ‹Ð¹',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(387,'tr','En Az Ortak Ortak',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(388,'zh','æœ€å¸¸è§çš„æœ€å°‘',0,35,'2017-01-10 16:17:01','2017-01-10 16:17:01'),(389,'de','Liste der hÃ¤ufigsten Keywords an der Spitze und am wenigsten hÃ¤ufigsten Keywords an der Unterseite.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(390,'es','Enumere las palabras clave mÃ¡s comunes en la parte superior y las palabras clave menos comunes.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(391,'fr','Liste des mots-clÃ©s les plus courants au premier et au moins des mots-clÃ©s communs en bas.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(392,'ja','ä¸Šä½ã®å…±é€šã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã¨æœ€ã‚‚ä¸€èˆ¬çš„ã§ãªã„ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’ä¸€ç•ªä¸‹ã«è¡¨ç¤ºã—ã¾ã™ã€‚',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(393,'it','Elenco parole chiave piÃ¹ comuni presso le parole chiave migliori e meno comuni nella parte inferiore.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(394,'nl','Lijst meest voorkomende trefwoorden aan de bovenkant en minst voorkomende sleutelwoorden in de bodem.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(395,'pl','Lista najczÄ™Å›ciej wyszukiwane na gÃ³rze i najmniej popularnych sÅ‚Ã³w kluczowych na dole.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(396,'pt','Liste as palavras-chave mais comuns na parte superior e nas palavras-chave menos comuns na parte inferior.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(397,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð½Ð°Ð¸Ð±Ð¾Ð»ÐµÐµ Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ñ‹Ðµ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð² Ð²ÐµÑ€Ñ…Ð½ÐµÐ¹ Ð¸ Ð½Ð°Ð¸Ð¼ÐµÐ½ÐµÐµ Ð¾Ð±Ñ‰Ð¸Ñ… ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² Ð² Ð½Ð¸Ð¶Ð½ÐµÐ¹ Ñ‡Ð°ÑÑ‚Ð¸.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(398,'tr','En sÄ±k kullanÄ±lan anahtar kelimeleri en alttaki en Ã¼stteki ve en az kullanÄ±lan genel anahtar kelimeler listeleyin.',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(399,'zh','åœ¨é¡¶éƒ¨åˆ—å‡ºæœ€å¸¸è§çš„å…³é”®å­—ï¼Œåœ¨åº•éƒ¨åˆ—å‡ºæœ€ä¸å¸¸è§çš„å…³é”®å­—ã€‚',0,36,'2017-01-10 16:19:32','2017-01-10 16:19:32'),(400,'de','Am wenigsten am hÃ¤ufigsten vorkommen',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(401,'es','Menos comunes a los mÃ¡s comunes',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(402,'fr','Le moins commun au plus commun',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(403,'ja','æœ€ã‚‚ä¸€èˆ¬çš„ãªã‚‚ã®ã‚ˆã‚Šå°‘ãªãå…±é€š',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(404,'it','Almeno comune alla maggior parte Comune',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(405,'nl','Least Common naar Meest voorkomende',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(406,'pl','Najrzadziej do najczÄ™stszych',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(407,'pt','Menos comum a mais comum',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(408,'ru','ÐÐ°Ð¸Ð¼ÐµÐ½ÐµÐµ ÐžÐ±Ñ‰Ð¸Ð¼ Ð´Ð»Ñ Ð±Ð¾Ð»ÑŒÑˆÐ¸Ð½ÑÑ‚Ð²Ð° Common',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(409,'tr','En YaygÄ±n Ortak',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(410,'zh','æœ€å¸¸è§çš„æœ€å¸¸è§',0,37,'2017-01-10 16:21:56','2017-01-10 16:21:56'),(411,'de','Liste der am hÃ¤ufigsten verwendeten Keywords am Anfang und am hÃ¤ufigsten SchlÃ¼sselwÃ¶rter am unteren Rand.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(412,'es','Enumere las palabras clave menos comunes en la parte superior y las palabras clave mÃ¡s comunes.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(413,'fr','Liste des mots-clÃ©s les moins courants au dÃ©but et les mots-clÃ©s les plus courants au bas.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(414,'ja','ä¸€ç•ªä¸Šã®å…±é€šã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã¨æœ€ã‚‚ä¸€èˆ¬çš„ãªã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã‚’ä¸€ç•ªä¸‹ã«è¡¨ç¤ºã—ã¾ã™ã€‚',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(415,'it','Elencare le parole chiave almeno comuni a le parole chiave migliori e piÃ¹ comuni nella parte inferiore.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(416,'nl','Lijst minst voorkomende sleutelwoorden in de top en de meest gebruikte zoekwoorden op de bodem.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(417,'pl','WymieÅ„ przynajmniej wspÃ³lnych sÅ‚Ã³w kluczowych w najlepszych i najbardziej popularnych sÅ‚Ã³w kluczowych na dole.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(418,'pt','Lista de palavras-chave menos comuns na parte superior e palavras-chave mais comuns na parte inferior.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(419,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð½Ðµ Ð¼ÐµÐ½ÐµÐµ Ð¾Ð±Ñ‰Ð¸Ðµ ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð° Ð² Ð²ÐµÑ€Ñ…Ð½ÐµÐ¹ Ð¸ Ð½Ð°Ð¸Ð±Ð¾Ð»ÐµÐµ Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ñ‹Ñ… ÐºÐ»ÑŽÑ‡ÐµÐ²Ñ‹Ñ… ÑÐ»Ð¾Ð² Ð² Ð½Ð¸Ð¶Ð½ÐµÐ¹ Ñ‡Ð°ÑÑ‚Ð¸.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(420,'tr','En az kullanÄ±lan anahtar kelimeleri en alttaki ve en yaygÄ±n anahtar kelimeler listeleyin.',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(421,'zh','åœ¨é¡¶éƒ¨åˆ—å‡ºæœ€å°‘å¸¸è§çš„å…³é”®å­—ï¼Œåœ¨åº•éƒ¨åˆ—å‡ºæœ€å¸¸è§çš„å…³é”®å­—ã€‚',0,38,'2017-01-10 16:24:31','2017-01-10 16:24:31'),(422,'de','Strippen Sie HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(423,'es','Franja de HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(424,'fr','Strip HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(425,'ja','ã‚¹ãƒˆãƒªãƒƒãƒ—HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(426,'it','Striscia HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(427,'nl','strip HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(428,'pl','Strip HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(429,'pt','Tira o HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(430,'ru','Ð“Ð°Ð·Ð° HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(431,'tr','HTML\'yi ÅŸeritle',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(432,'zh','å‰¥ç¦»HTML',0,39,'2017-01-10 16:27:27','2017-01-10 16:27:27'),(433,'de','Diese Option entfernt html von jedem Element in der Eingangsliste.',0,40,'2017-01-10 16:32:44','2017-01-10 16:32:44'),(434,'es','Esta opciÃ³n eliminarÃ¡ html de cada elemento de la lista de entrada.',0,40,'2017-01-10 16:32:44','2017-01-10 16:32:44'),(435,'fr','Cette option supprimera html de chaque Ã©lÃ©ment de la liste entrante.',0,40,'2017-01-10 16:32:44','2017-01-10 16:32:44'),(436,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã‚¤ãƒ³ãƒã‚¦ãƒ³ãƒ‰ãƒªã‚¹ãƒˆã®å„é …ç›®ã‹ã‚‰htmlã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(437,'it','Questa opzione rimuoverÃ  html da ogni elemento della lista in entrata.',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(438,'nl','Deze optie zal html van elk item te verwijderen in de inkomende lijst.',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(439,'pl','Ta opcja usunie html z kaÅ¼dej pozycji na liÅ›cie przychodzÄ…cych.',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(440,'pt','Esta opÃ§Ã£o removerÃ¡ html de cada item na lista de entrada.',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(441,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ HTML Ð¸Ð· ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð² ÑÐ¿Ð¸ÑÐºÐµ Ð²Ñ…Ð¾Ð´ÑÑ‰Ð¸Ñ….',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(442,'tr','Bu seÃ§enek, gelen listesindeki her bir Ã¶ÄŸeden html\'yi kaldÄ±rÄ±r.',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(443,'zh','æ­¤é€‰é¡¹å°†ä»Žå…¥ç«™åˆ—è¡¨ä¸­çš„æ¯ä¸ªé¡¹ç›®ä¸­åˆ é™¤htmlã€‚',0,40,'2017-01-10 16:32:45','2017-01-10 16:32:45'),(444,'de','Ignorieren Sie gemeinsame WÃ¶rter',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(445,'es','Ignorar las palabras comunes',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(446,'fr','Ignorer les mots courants',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(447,'ja','å…±é€šã®å˜èªžã‚’ç„¡è¦–ã™ã‚‹',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(448,'it','Ignorare le parole comuni',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(449,'nl','Negeer gewone woorden',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(450,'pl','Ignoruj czÄ™sto uÅ¼ywanych sÅ‚Ã³w',0,41,'2017-01-10 16:35:27','2017-01-10 16:35:27'),(451,'pt','Ignorar palavras comuns',0,41,'2017-01-10 16:35:28','2017-01-10 16:35:28'),(452,'ru','Ð˜Ð³Ð½Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½Ð°Ð¸Ð±Ð¾Ð»ÐµÐµ Ñ‡Ð°ÑÑ‚Ð¾ Ð²ÑÑ‚Ñ€ÐµÑ‡Ð°ÑŽÑ‰Ð¸ÐµÑÑ ÑÐ»Ð¾Ð²Ð°',0,41,'2017-01-10 16:35:28','2017-01-10 16:35:28'),(453,'tr','Ortak Kelimeleri Yoksay',0,41,'2017-01-10 16:35:28','2017-01-10 16:35:28'),(454,'zh','å¿½ç•¥å¸¸ç”¨è¯',0,41,'2017-01-10 16:35:28','2017-01-10 16:35:28'),(455,'de','Diese Option ignoriert die Ã¼blichen WÃ¶rter aus der Eingabeliste.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(456,'es','Esta opciÃ³n ignorarÃ¡ las palabras comunes de la lista de entrada.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(457,'fr','Cette option ignorera les mots courants de la liste des entrÃ©es.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(458,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã€å…¥åŠ›ãƒªã‚¹ãƒˆã®ä¸€èˆ¬çš„ãªå˜èªžã‚’ç„¡è¦–ã—ã¾ã™ã€‚',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(459,'it','Questa opzione ignorare le parole comuni dalla lista di input.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(460,'nl','Deze optie zal veelvoorkomende woorden uit de input lijst negeren.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(461,'pl','Ta opcja ignoruje wspÃ³lnych sÅ‚Ã³w z listy wejÅ›ciowej.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(462,'pt','Esta opÃ§Ã£o irÃ¡ ignorar palavras comuns da lista de entrada.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(463,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ Ð±ÑƒÐ´ÐµÑ‚ Ð¸Ð³Ð½Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¾Ð±Ñ‰Ð¸Ðµ ÑÐ»Ð¾Ð²Ð° Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ° Ð²Ð²Ð¾Ð´Ð°.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(464,'tr','Bu seÃ§enek giriÅŸ listesindeki sÄ±k kullanÄ±lan kelimeleri yok sayÄ±lacaktÄ±r.',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(465,'zh','æ­¤é€‰é¡¹å°†å¿½ç•¥è¾“å…¥åˆ—è¡¨ä¸­çš„å¸¸ç”¨å­—ã€‚',0,42,'2017-01-10 16:38:00','2017-01-10 16:38:00'),(466,'de','Phrasen einschlieÃŸen',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(467,'es','Incluir frases',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(468,'fr','Inclure des phrases',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(469,'ja','ãƒ•ãƒ¬ãƒ¼ã‚ºã‚’å«ã‚€',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(470,'it','includere frasi',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(471,'nl','omvatten zinnen',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(472,'pl','DoÅ‚Ä…cz fraz',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(473,'pt','Incluir frases',0,43,'2017-01-10 16:40:36','2017-01-10 16:40:36'),(474,'ru','Ð’ÐºÐ»ÑŽÑ‡Ð¸Ñ‚ÑŒ Ñ„Ñ€Ð°Ð·Ñ‹',0,43,'2017-01-10 16:40:37','2017-01-10 16:40:37'),(475,'tr','Ä°flatlarÄ± Dahil Et',0,43,'2017-01-10 16:40:37','2017-01-10 16:40:37'),(476,'zh','åŒ…æ‹¬çŸ­è¯­',0,43,'2017-01-10 16:40:37','2017-01-10 16:40:37'),(477,'de','Diese Option enthÃ¤lt Phrasen aus der Eingabeliste.',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(478,'es','Esta opciÃ³n incluirÃ¡ frases de la lista de entrada.',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(479,'fr','Cette option comprend des phrases de la liste des entrÃ©es.',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(480,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã«ã¯å…¥åŠ›ãƒªã‚¹ãƒˆã®ãƒ•ãƒ¬ãƒ¼ã‚ºãŒå«ã¾ã‚Œã¾ã™ã€‚',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(481,'it','Questa opzione include frasi dalla lista di input.',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(482,'nl','Deze optie zal bevatten zinnen uit de input lijst.',0,44,'2017-01-10 16:43:02','2017-01-10 16:43:02'),(483,'pl','Opcja ta bÄ™dzie zawieraÄ‡ wyraÅ¼eÅ„ z listy wejÅ›ciowej.',0,44,'2017-01-10 16:43:03','2017-01-10 16:43:03'),(484,'pt','Esta opÃ§Ã£o incluirÃ¡ frases da lista de entrada.',0,44,'2017-01-10 16:43:03','2017-01-10 16:43:03'),(485,'ru','Ð­Ñ‚Ð¾Ñ‚ Ð²Ð°Ñ€Ð¸Ð°Ð½Ñ‚ Ð±ÑƒÐ´ÐµÑ‚ Ð²ÐºÐ»ÑŽÑ‡Ð°Ñ‚ÑŒ Ð² ÑÐµÐ±Ñ Ñ„Ñ€Ð°Ð·Ñ‹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ° Ð²Ñ…Ð¾Ð´Ð¾Ð².',0,44,'2017-01-10 16:43:03','2017-01-10 16:43:03'),(486,'tr','Bu seÃ§enek girdi listesinden cÃ¼mleleri iÃ§erecektir.',0,44,'2017-01-10 16:43:03','2017-01-10 16:43:03'),(487,'zh','æ­¤é€‰é¡¹å°†åŒ…æ‹¬æ¥è‡ªè¾“å…¥åˆ—è¡¨çš„çŸ­è¯­ã€‚',0,44,'2017-01-10 16:43:03','2017-01-10 16:43:03'),(488,'de','ZÃ¤hlungen anzeigen',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(489,'es','Mostrar cuentas',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(490,'fr','Afficher les comptes',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(491,'ja','ã‚«ã‚¦ãƒ³ãƒˆã‚’è¡¨ç¤º',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(492,'it','Mostra Conti',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(493,'nl','Show Counts',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(494,'pl','PokaÅ¼ Counts',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(495,'pt','Mostrar contagens',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(496,'ru','ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð“Ñ€Ð°Ñ„Ñ‹',0,45,'2017-01-11 10:09:11','2017-01-11 10:09:30'),(497,'tr','GÃ¶sterilen SayÄ±lar',0,45,'2017-01-11 10:09:12','2017-01-11 10:09:31'),(498,'zh','æ˜¾ç¤ºè®¡æ•°',0,45,'2017-01-11 10:09:12','2017-01-11 10:09:31'),(502,'de','Diese Option zeigt die Anzahl der Keywords fÃ¼r jedes Keyword an.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(503,'es','Esta opciÃ³n mostrarÃ¡ los recuentos de cada palabra clave.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(504,'fr','Cette option affiche les comptes pour chaque mot clÃ©.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(505,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã€å„ã‚­ãƒ¼ãƒ¯ãƒ¼ãƒ‰ã®ã‚«ã‚¦ãƒ³ãƒˆã‚’è¡¨ç¤ºã—ã¾ã™ã€‚',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(506,'it','Questa opzione mostrerÃ  i conteggi per ogni parola chiave.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(507,'nl','Deze optie zal de tellingen voor elk zoekwoord te tonen.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(508,'pl','Ta opcja pokaÅ¼e liczniki dla kaÅ¼dego sÅ‚owa kluczowego.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(509,'pt','Esta opÃ§Ã£o mostrarÃ¡ as contagens para cada palavra-chave.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(510,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ Ð¿Ð¾ÐºÐ°Ð¶ÐµÑ‚ ÑÑ‡ÐµÑ‚Ñ‡Ð¸ÐºÐ¸ Ð´Ð»Ñ ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÐºÐ»ÑŽÑ‡ÐµÐ²Ð¾Ð³Ð¾ ÑÐ»Ð¾Ð²Ð°.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(511,'tr','Bu seÃ§enek her bir anahtar kelimenin sayÄ±larÄ±nÄ± gÃ¶sterir.',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59'),(512,'zh','æ­¤é€‰é¡¹å°†æ˜¾ç¤ºæ¯ä¸ªå…³é”®å­—çš„è®¡æ•°ã€‚',0,46,'2017-01-11 10:11:59','2017-01-11 10:11:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PrimaryHostRecord`
--

LOCK TABLES `PrimaryHostRecord` WRITE;
/*!40000 ALTER TABLE `PrimaryHostRecord` DISABLE KEYS */;
INSERT INTO `PrimaryHostRecord` VALUES (2,'Classification','Web Application','2017-01-09 16:17:22','2017-02-08 16:23:59'),(3,'Contact','uprisingengineer@gmail.com','2017-01-09 16:17:22','2017-02-08 16:23:59'),(4,'Contributor','No Other Contributors','2017-01-09 16:17:22','2017-02-08 16:23:59'),(5,'Copyright','All Material Created by the Owners of this Site is Owned by the Site\'s Owners','2017-01-09 16:17:22','2017-02-08 16:23:59'),(6,'Creator','UprisingEngineer','2017-01-09 16:17:22','2017-02-08 16:23:59'),(7,'NewsKeywords','Keyword Application, Web Application, Word Application','2017-01-09 16:17:22','2017-02-08 16:23:59'),(8,'PublicReleaseDate','2017-01-09','2017-01-09 16:17:22','2017-02-08 16:24:00'),(9,'Subject','Sorting, Organizing, Classifying','2017-01-09 16:17:23','2017-02-08 16:24:00'),(10,'PrimaryImageRight','list-keywords-right-icon.jpg','2017-01-09 16:17:23','2017-02-08 16:24:00'),(11,'Author','UprisingEngineer','2017-01-09 16:17:23','2017-02-08 16:23:59'),(12,'Publisher','Self-Published (listkeywords.com)','2017-01-09 16:17:23','2017-02-08 16:24:00'),(13,'Rights','All Material Copyrighted by its Owners, Public Use as made available is allowed.','2017-01-09 16:17:23','2017-02-08 16:24:00'),(14,'BaseTemplate','file.html','2017-01-09 16:17:23','2017-02-08 16:23:59'),(15,'ApplicationName','List Keywords','2017-01-09 16:17:23','2017-02-08 16:23:59'),(16,'PrimaryImageLeft','list-keywords-left-icon.jpg','2017-01-09 16:17:23','2017-02-08 16:24:00'),(17,'NotReadyForSearch','1','2017-01-27 16:50:52','2017-02-08 16:23:59'),(18,'FullImage','list-keywords-left.jpg','2017-02-08 16:24:00','2017-02-08 16:24:00');
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
INSERT INTO `Quote` VALUES (1,'I generated some keywords today!','','en',1,'2017-01-09 13:49:50','2017-01-10 14:08:13');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (1,'keyword','en',1,'2017-01-09 13:49:50','2017-01-10 14:08:13'),(2,'keyphrase','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(3,'identifier','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(4,'search term','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(5,'query term','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(6,'search query','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(7,'search','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13'),(8,'list','en',1,'2017-01-09 13:49:51','2017-01-10 14:08:13');
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
INSERT INTO `TextBody` VALUES (1,'\n<p>So, you wanted to generate some keywords and keyphrases, right?  That\'s what brought to you to this page, isn\'t it?</p>\r\n<br><p>Good, I hope it helped.</p>\n','','en',25,160,1,'2017-01-09 13:49:50','2017-01-10 14:08:13');
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
INSERT INTO `UserAdmin` VALUES (1,1,'2017-01-09 13:19:38','2017-01-09 13:19:38');
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
INSERT INTO `UserSession` VALUES (21,1,'VFkPdmxnPsPL57B7ruUqImFvbOHZPeW7DhOGBVow0H','2017-02-08 16:22:25','2017-01-09 13:26:11','2017-02-08 16:22:25');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'listkeywords'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:35:16
