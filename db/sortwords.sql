-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.173.170    Database: sortwords
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
INSERT INTO `Assignment` VALUES (1,1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `AvailabilityDateRange` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ChildRecordStats`
--

LOCK TABLES `ChildRecordStats` WRITE;
/*!40000 ALTER TABLE `ChildRecordStats` DISABLE KEYS */;
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
INSERT INTO `Description` VALUES (1,'Use this web app to sort lists of words and phrases.  You may sort alphabetically, reverse alphabetically, numerically, or reverse numerically.','','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `Entry` VALUES (1,'Sort Words','Sorting Your Lists of Words For You','','SortWords.com','0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `EntryPermission` VALUES (1,1,21,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupList`
--

LOCK TABLES `LookupList` WRITE;
/*!40000 ALTER TABLE `LookupList` DISABLE KEYS */;
INSERT INTO `LookupList` VALUES (8,'HomePageInfo',0,'2016-07-26 17:32:38','0000-00-00 00:00:00'),(11,'ContactPageInfo',0,'2016-07-29 17:49:08','0000-00-00 00:00:00'),(12,'AboutPageInfo',0,'2016-07-29 17:50:26','0000-00-00 00:00:00'),(13,'LanguagesMainHeader',0,'2016-08-19 16:43:00','0000-00-00 00:00:00'),(14,'LanguagesMainInstructionsHeader',0,'2016-08-19 16:43:00','0000-00-00 00:00:00'),(15,'LanguagesMainInstructionsContent',0,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(16,'LanguagesMainList1Header',0,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(17,'LanguagesMainList2Header',0,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(18,'LanguagesMainList1Content',0,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(19,'LanguagesMainList2Content',0,'2016-08-19 16:43:02','0000-00-00 00:00:00'),(20,'LanguagesMainButtonText',0,'2016-08-19 16:43:02','0000-00-00 00:00:00'),(25,'LanguagesMainTrimOption',0,'2016-08-19 16:43:02','0000-00-00 00:00:00'),(26,'LanguagesMainTrimDescription',0,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(27,'LanguagesBottomNavigationHome',0,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(28,'LanguagesBottomNavigationAbout',0,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(29,'LanguagesBottomNavigationContact',0,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(30,'LanguagesAboutUsHeader',0,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(31,'LanguagesAboutUsContent',0,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(32,'LanguagesMainImageQuote',0,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(33,'LanguagesAboutHeader',0,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(34,'LanguagesContactHeader',0,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(35,'LanguagesContactUs',0,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(36,'LanguagesSiteCreator',0,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(37,'LanguagesSiteCreatedOn',0,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(38,'LanguagesContactCreator',0,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(39,'LanguagesRobotsHeader',0,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(40,'LanguagesRobotsInstructions',0,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(41,'LanguagesSitemapHeader',0,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(42,'LanguagesSitemapInstructions',0,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(43,'LanguagesMainKeywords',0,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(44,'LanguagesMainNewsKeywords',0,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(45,'LanguagesMainClassification',0,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(46,'LanguagesMainFirstFeatureOptionOneTitle',0,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(47,'LanguagesMainFirstFeatureOptionOneMouseover',0,'2016-08-19 18:11:05','0000-00-00 00:00:00'),(48,'LanguagesMainFirstFeatureOptionTwoTitle',0,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(49,'LanguagesMainFirstFeatureOptionTwoMouseover',0,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(50,'LanguagesMainFirstFeatureOptionThreeTitle',0,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(51,'LanguagesMainFirstFeatureOptionThreeMouseover',0,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(52,'LanguagesMainFirstFeatureOptionFourTitle',0,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(53,'LanguagesMainFirstFeatureOptionFourMouseover',0,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(54,'LanguagesAnd',0,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(55,'LanguagesOtherCountry',0,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(56,'LanguagesOtherCountries',0,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(57,'LanguagesHeader',0,'2016-08-27 15:05:43','0000-00-00 00:00:00'),(58,'LanguagesPageInfo',0,'2016-08-27 15:23:40','0000-00-00 00:00:00'),(59,'LanguagesBottomNavigationLanguages',0,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(60,'LanguagesShare',0,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(61,'LanguagesShareWith',0,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(62,'LanguagesSelectLanguageTitle',0,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(63,'LanguagesRobotsFilename',0,'2017-01-10 15:47:11','2017-01-10 15:47:11'),(64,'LanguagesMainStatusHeader',0,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(65,'LanguagesMainActivityHeader',0,'2017-01-12 11:11:25','2017-01-12 11:11:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=628 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupListItem`
--

LOCK TABLES `LookupListItem` WRITE;
/*!40000 ALTER TABLE `LookupListItem` DISABLE KEYS */;
INSERT INTO `LookupListItem` VALUES (25,'HomeChangeFreq','weekly',0,8,'2016-07-27 18:21:16','2016-09-05 14:08:43'),(45,'HomeLastMod','2016-09-05',0,8,'2016-07-29 17:40:06','2016-09-05 14:08:43'),(46,'HomePriority','1.0',0,8,'2016-07-29 17:40:06','2016-09-05 14:08:43'),(47,'ContactChangeFreq','yearly',0,11,'2016-07-29 17:49:08','0000-00-00 00:00:00'),(48,'ContactLastMod','2016-06-05',0,11,'2016-07-29 17:49:08','0000-00-00 00:00:00'),(49,'ContactPriority','0.2',0,11,'2016-07-29 17:49:08','0000-00-00 00:00:00'),(50,'AboutChangeFreq','yearly',0,12,'2016-07-29 17:50:26','0000-00-00 00:00:00'),(51,'AboutLastMod','2016-06-04',0,12,'2016-07-29 17:50:26','0000-00-00 00:00:00'),(52,'AboutPriority','0.5',0,12,'2016-07-29 17:50:26','0000-00-00 00:00:00'),(53,'de','Sortieren Words (www.sortwords.com): Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(54,'es','Ordenar las palabras (www.sortwords.com): ClasificaciÃ³n de listas de palabras para usted',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(55,'fr','Trier les mots (www.sortwords.com): tri de vos listes de mots pour vous',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(56,'ja','ã‚½ãƒ¼ãƒˆè¨€è‘‰ï¼ˆwww.sortwords.comï¼‰ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(57,'it','Ordina parole (www.sortwords.com): Ordinamento degli elenchi di parole per voi',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(58,'nl','Sorteer Woorden (www.sortwords.com): het sorteren van je woordenlijsten For You',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(59,'pl','UporzÄ…dkuj sÅ‚owa (www.sortwords.com): Sortowanie listy sÅ‚Ã³w dla Ciebie',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(60,'pt','Classificar Words (www.sortwords.com): Classificando suas listas de palavras para vocÃª',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(61,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¡Ð»Ð¾Ð²Ð° (www.sortwords.com): Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð’Ð°ÑˆÐ¸ ÑÐ¿Ð¸ÑÐºÐ¸ ÑÐ»Ð¾Ð² For You',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(62,'tr','SÄ±ralama Kelimeler (www.sortwords.com): For You Kelimelerin Listeler SÄ±ralama',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(63,'zh','æŽ’åºå­—ï¼ˆwww.sortwords.comï¼‰ï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,13,'2016-08-19 16:43:00','2016-08-19 17:07:29'),(64,'de','Anleitung',0,14,'2016-08-19 16:43:00','0000-00-00 00:00:00'),(65,'es','Instrucciones',0,14,'2016-08-19 16:43:00','0000-00-00 00:00:00'),(66,'fr','Instructions',0,14,'2016-08-19 16:43:00','0000-00-00 00:00:00'),(67,'ja','æŒ‡ç¤º',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(68,'it','Istruzioni',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(69,'nl','Instructies',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(70,'pl','Instrukcje',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(71,'pt','InstruÃ§Ãµes',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(72,'ru','InstrucÈ›iunitr',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(73,'tr','Talimatlar',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(74,'zh','è¯´æ˜Ž',0,14,'2016-08-19 16:43:01','0000-00-00 00:00:00'),(75,'de','Verwenden Sie diese Web-App-Listen von WÃ¶rtern und Phrasen zu sortieren. Sie kÃ¶nnen alphabetisch sortiert werden, umgekehrt alphabetisch, numerisch oder numerisch umkehren.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(76,'es','Utilice esta aplicaciÃ³n web para ordenar las listas de palabras y frases. Usted puede ordenar por orden alfabÃ©tico, revertir orden alfabÃ©tico, numÃ©rico, o invertir numÃ©ricamente.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(77,'fr','Utilisez cette application Web pour trier les listes de mots et de phrases. Vous pouvez trier par ordre alphabÃ©tique, inverse alphabÃ©tique, numÃ©rique, ou inverser numÃ©riquement.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(78,'ja','å˜èªžã‚„ãƒ•ãƒ¬ãƒ¼ã‚ºã®ãƒªã‚¹ãƒˆã‚’ã‚½ãƒ¼ãƒˆã™ã‚‹ãŸã‚ã«ã€ã“ã®Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã‚’ä½¿ç”¨ã—ã¦ãã ã•ã„ã€‚ã‚ãªãŸã¯ã€ã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †ã«ä¸¦ã¹æ›¿ãˆã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †ã€é€†ã€æ•°å€¤ã€ã¾ãŸã¯æ•°å€¤çš„ã«åè»¢ã™ã‚‹ã“ã¨ãŒã‚ã‚Šã¾ã™ã€‚',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(79,'it','Utilizzare questa applicazione web per ordinare elenchi di parole e frasi. Puoi ordinare in ordine alfabetico, in ordine alfabetico inverso, numerico, o invertire numericamente.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(80,'nl','Gebruik deze web-app om lijsten met woorden en zinnen te sorteren. U kunt alfabetisch te sorteren, omgekeerde alfabetisch, numeriek, of omgekeerd numeriek.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(81,'pl','Za pomocÄ… tej aplikacji internetowej, aby posortowaÄ‡ listÄ™ sÅ‚Ã³w i fraz. sortowaÄ‡ alfabetycznie reverse alfabetycznie, numerycznie lub odwrÃ³ciÄ‡ numerycznie.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(82,'pt','Use este aplicativo web para classificar as listas de palavras e frases. Pode ordenar alfabeticamente, reverter alfabeticamente, numericamente ou reverter numericamente.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(83,'ru','Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐ¹Ñ‚Ðµ ÑÑ‚Ð¾ Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ, Ñ‡Ñ‚Ð¾Ð±Ñ‹ ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ ÑÐ¿Ð¸ÑÐºÐ¸ ÑÐ»Ð¾Ð² Ð¸ Ñ„Ñ€Ð°Ð·. Ð’Ñ‹ Ð¼Ð¾Ð¶ÐµÑ‚Ðµ ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¿Ð¾ Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ñƒ Ð² Ð¾Ð±Ñ€Ð°Ñ‚Ð½Ð¾Ð¼ Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ð½Ð¾Ð¼ Ð¿Ð¾Ñ€ÑÐ´ÐºÐµ, Ñ‡Ð¸ÑÐ»ÐµÐ½Ð½Ð¾, Ð¸Ð»Ð¸ Ð¾Ð±Ñ€Ð°Ñ‚Ð½Ð¾Ðµ Ñ‡Ð¸ÑÐ»ÐµÐ½Ð½Ð¾.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(84,'tr','sÃ¶zcÃ¼k ve deyimlerin listeler sÄ±ralamak iÃ§in bu web uygulamasÄ±nÄ± kullanÄ±n. Sen, alfabetik olarak sÄ±ralamak alfabetik ters sayÄ±sal veya sayÄ±sal tersine dÃ¶nebilir.',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(85,'zh','ä½¿ç”¨æ­¤Webåº”ç”¨çš„å•è¯å’ŒçŸ­è¯­çš„åˆ—è¡¨è¿›è¡ŒæŽ’åºã€‚æ‚¨å¯ä»¥æŒ‰å­—æ¯é¡ºåºæŽ’åºï¼ŒæŒ‰å­—æ¯é¡ºåºé¢ å€’ï¼Œæ•°å­—ï¼Œæˆ–æ•°å­—åè½¬ã€‚',0,15,'2016-08-19 16:43:01','2016-08-19 17:20:19'),(86,'de','Liste sortieren',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:24'),(87,'es','Lista para ordenar',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:24'),(88,'fr','Liste pour trier',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:24'),(89,'ja','ã‚½ãƒ¼ãƒˆã™ã‚‹ã«ã¯ã€ãƒªã‚¹ãƒˆ',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:24'),(90,'it','Elencare per ordinare',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:24'),(91,'nl','Lijst naar Sort',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(92,'pl','Lista Sort',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(93,'pt','Lista para classificar',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(94,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(95,'tr','SÄ±ralama iÃ§in Liste',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(96,'zh','åˆ—è¡¨æŽ’åº',0,16,'2016-08-19 16:43:01','2016-08-19 17:29:25'),(97,'de','sortierte Liste',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(98,'es','Lista Ordenado',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(99,'fr','Liste de classement',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(100,'ja','ã‚½ãƒ¼ãƒˆã•ã‚ŒãŸãƒªã‚¹ãƒˆ',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(101,'it','elenco ordinato',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(102,'nl','gesorteerde lijst',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(103,'pl','Lista posortowana',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(104,'pt','Lista Ordenado',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(105,'ru','Ð¾Ñ‚ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ð¹ ÑÐ¿Ð¸ÑÐ¾Ðº',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(106,'tr','sÄ±ralama listesi',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(107,'zh','æŽ’åºåˆ—è¡¨',0,17,'2016-08-19 16:43:01','2016-08-19 17:34:42'),(108,'de','Geben Sie oder kopieren und fÃ¼gen Sie Ihre Liste in diesem Textfeld .',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(109,'es','Escribir o copiar y pegar su lista en este cuadro de texto.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(110,'fr','Tapez ou copier-coller votre liste dans cette zone de texte.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(111,'ja','ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ã‚ãªãŸã®ãƒªã‚¹ãƒˆã‚’ã‚³ãƒ”ãƒ¼ã‚¢ãƒ³ãƒ‰ãƒšãƒ¼ã‚¹ãƒˆå…¥åŠ›ã—ã¾ã™ã‹ã€‚',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(112,'it','Digitare o copiare e incollare l\'elenco in questa casella di testo.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(113,'nl','Typ of kopieer-en-plak uw lijst in dit tekstvak.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(114,'pl','Wpisz lub skopiuj i wklej swojÄ… listÄ™ w tym polu tekstowym.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(115,'pt','Digite ou copie e cole a sua lista para este caixa de texto.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(116,'ru','Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð»Ð¸ ÑÐºÐ¾Ð¿Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¸ Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ ÑÐ¿Ð¸ÑÐ¾Ðº Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(117,'tr','Bu metin kutusuna listenizi kopyalayÄ±p yapÄ±ÅŸtÄ±rÄ±n ve-veya yazÄ±n.',0,18,'2016-08-19 16:43:01','2016-08-19 17:26:43'),(118,'zh','é”®å…¥æˆ–å¤åˆ¶å’Œç²˜è´´æ‚¨çš„æ¸…å•åˆ°è¿™ä¸ªæ–‡æœ¬æ¡†ã€‚',0,18,'2016-08-19 16:43:02','2016-08-19 17:26:43'),(119,'de','Dann sind Sie sortierte Liste wird in diesem Textfeld angezeigt.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(120,'es','Entonces estÃ¡s lista clasificadas aparecerÃ¡ en este cuadro de texto.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(121,'fr','Liste Ensuite, vous Ãªtes triÃ©es apparaÃ®tra dans cette zone de texte.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(122,'ja','ãã—ã¦ã€ã‚ãªãŸãŒä¸¦ã¹æ›¿ãˆã‚‰ã‚Œã¦ã„ã‚‹ãƒªã‚¹ãƒˆã«ã¯ã€ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«è¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(123,'it','Lista Allora stai ordine impostato apparirÃ  in questa casella di testo.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(124,'nl','Dan bent u gesorteerde lijst wordt weergegeven in dit tekstvak.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(125,'pl','Wtedy jesteÅ› posortowana lista pojawi siÄ™ w tym polu.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(126,'pt','lista, entÃ£o vocÃª estÃ¡ classificada aparece nesta caixa de texto.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(127,'ru','Ð¢Ð¾Ð³Ð´Ð° Ð²Ñ‹ Ð¾Ñ‚ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ð¹ ÑÐ¿Ð¸ÑÐ¾Ðº Ð¿Ð¾ÑÐ²Ð¸Ñ‚ÑÑ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(128,'tr','Sonra sÄ±ralanmÄ±ÅŸ olduÄŸunuz liste bu metin kutusunda belirecektir.',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(129,'zh','é‚£ä¹ˆä½ æŽ’åºåˆ—è¡¨ä¼šå‡ºçŽ°åœ¨è¯¥æ–‡æœ¬æ¡†ä¸­ã€‚',0,19,'2016-08-19 16:43:02','2016-08-19 17:32:15'),(130,'de','Sortieren',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(131,'es','Ordenar',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(132,'fr','Trier',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(133,'ja','ã‚½ãƒ¼ãƒˆ',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(134,'it','Ordinare',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(135,'nl','Soort',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(136,'pl','SortowaÄ‡',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(137,'pt','Ordenar',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:37'),(138,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:38'),(139,'tr','Ã§eÅŸit',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:38'),(140,'zh','åˆ†ç±»',0,20,'2016-08-19 16:43:02','2016-08-19 17:01:38'),(185,'de','Trim Leerzeichen aus Objekte in der Liste',0,25,'2016-08-19 16:43:02','0000-00-00 00:00:00'),(186,'es','Recortar los espacios en blanco de los elementos en la lista',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(187,'fr','Coupez Whitespace Ã  partir des Ã©lÃ©ments dans la liste',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(188,'ja','ãƒªã‚¹ãƒˆã®é …ç›®ã‹ã‚‰ç©ºç™½ã‚’ãƒˆãƒªãƒ ',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(189,'it','Trim Gli spazi bianchi da voci di elenco',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(190,'nl','Trim Whitespace van Items in List',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(191,'pl','PrzyciÄ…Ä‡ biaÅ‚e znaki od pozycji na liÅ›cie',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(192,'pt','Aparar espaÃ§o em branco do itens na lista',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(193,'ru','ÐžÐ±Ñ€ÐµÐ¶ÑŒÑ‚Ðµ Whitespace Ð¸Ð· ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð¾Ð² ÑÐ¿Ð¸ÑÐºÐ°',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(194,'tr','Listesinde Ã–ÄŸeler Whitespace Trim',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(195,'zh','ä»Žåˆ—è¡¨é¡¹ä¿®å‰ªç©ºç™½',0,25,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(196,'de','Diese Option wird entfernen Starten und Leerzeichen in der sich aus jedem Element Hinter, sortierte Liste.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(197,'es','Esta opciÃ³n eliminarÃ¡ el arranque y arrastrar caracteres de espacio en blanco entre cada elemento de la resultante, lista ordenada.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(198,'fr','Cette option va supprimer le dÃ©marrage et l\'arriÃ¨re des caractÃ¨res blancs de chaque Ã©lÃ©ment de la rÃ©sultante, liste triÃ©e.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(199,'ja','ã“ã®ã‚ªãƒ—ã‚·ãƒ§ãƒ³ã¯ã€é–‹å§‹ã—ã€å¾—ã‚‰ã‚ŒãŸå„é …ç›®ã‹ã‚‰ç©ºç™½æ–‡å­—ã‚’æœ«å°¾ã«å‰Šé™¤ã•ã‚Œã€ãƒªã‚¹ãƒˆã‚’ä¸¦ã¹æ›¿ãˆã€‚',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(200,'it','Questa opzione rimuoverÃ  di partenza e finali caratteri di spazio vuoto da ogni elemento della risultante, lista ordinata.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(201,'nl','Deze optie zal verwijderen starten en witruimte karakters van elk item in de resulterende, gesorteerd lijst.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(202,'pl','Ta opcja usunie rozpoczÄ™ciem i koÅ„cowe biaÅ‚e znaki z kaÅ¼dego elementu w wynikowym, lista posortowana.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(203,'pt','Esta opÃ§Ã£o irÃ¡ remover comeÃ§ando e Ã  direita espaÃ§os em branco de cada item na resultante, lista classificada.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(204,'ru','Ð­Ñ‚Ð° Ð¾Ð¿Ñ†Ð¸Ñ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð·Ð°Ð¿ÑƒÑÐº Ð¸ ÐºÐ¾Ð½ÐµÑ‡Ð½Ñ‹Ðµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ ÑÐ¸Ð¼Ð²Ð¾Ð»Ð¾Ð² Ð¸Ð· ÐºÐ°Ð¶Ð´Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð² Ñ€ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð¸Ñ€ÑƒÑŽÑ‰ÐµÐ¼, ÑÐ¾Ñ€Ñ‚Ð¸Ñ€ÑƒÐµÑ‚ÑÑ ÑÐ¿Ð¸ÑÐ¾Ðº.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(205,'tr','Bu seÃ§enek, baÅŸlangÄ±Ã§ ve sonuÃ§ olarak her Ã¶ÄŸenin beyaz boÅŸluk karakterleri sondaki kaldÄ±rÄ±r, liste sÄ±ralanÄ±r.',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(206,'zh','æ­¤é€‰é¡¹å°†åˆ é™¤ï¼Œå¹¶å¼€å§‹åœ¨ç”±æ­¤äº§ç”Ÿçš„æ¯ä¸ªé¡¹ç›®ç»“å°¾çš„ç©ºç™½å­—ç¬¦ï¼ŒæŽ’åºåˆ—è¡¨ã€‚',0,26,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(207,'de','Zuhause',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(208,'es','Casa',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(209,'fr','Accueil',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(210,'ja','ãƒ›ãƒ¼ãƒ ',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(211,'it','Casa',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(212,'nl','Huis',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(213,'pl','Dom',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(214,'pt','Casa',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(215,'ru','Ð“Ð»Ð°Ð²Ð½Ð°Ñ',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(216,'tr','Ev',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(217,'zh','å®¶',0,27,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(218,'de','Etwa',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(219,'es','Acerca de',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(220,'fr','Sur',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(221,'ja','ç´„',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(222,'it','Di',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(223,'nl','Over',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(224,'pl','O',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(225,'pt','Sobre',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(226,'ru','ÐžÐºÐ¾Ð»Ð¾',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(227,'tr','hakkÄ±nda',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(228,'zh','å…³äºŽ',0,28,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(229,'de','Kontakt',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(230,'es','Contacto',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(231,'fr','Contact',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(232,'ja','æŽ¥è§¦',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(233,'it','contatto',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(234,'nl','Contact',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(235,'pl','Kontakt',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(236,'pt','Contato',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(237,'ru','ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚',0,29,'2016-08-19 16:43:03','0000-00-00 00:00:00'),(238,'tr','Temas',0,29,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(239,'zh','è”ç³»',0,29,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(240,'de','Weitere Informationen Ã¼ber uns',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(241,'es','MÃ¡s informaciÃ³n sobre nosotros',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(242,'fr','Plus d\'informations sur nous',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(243,'ja','ä¼šç¤¾ã®è©³ç´°æƒ…å ±',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(244,'it','Altre informazioni Chi siamo',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(245,'nl','Meer informatie over ons',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(246,'pl','WiÄ™cej informacji o nas',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(247,'pt','Mais informaÃ§Ãµes Sobre nÃ³s',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(248,'ru','Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ð¾ Ð½Ð°Ñ',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(249,'tr','HakkÄ±mÄ±zda Daha Fazla Bilgi',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(250,'zh','æ›´å¤šä¿¡æ¯å…³äºŽæˆ‘ä»¬',0,30,'2016-08-19 16:43:04','0000-00-00 00:00:00'),(251,'de','<p class=\"margin-0px\">Also, Sie wollten ein paar Worte zu sortieren, nicht wahr? Das ist, was Sie auf dieser Seite gebracht, ist es nicht?</p><br><p class=\"margin-0px\">Gut, ich hoffe, es half.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(252,'es','<p class=\"margin-0px\">Por lo tanto, usted quiere ordenar algunas palabras, Â¿verdad? Eso es lo que llevÃ³ a que a esta pÃ¡gina, Â¿verdad?</p><br><p class=\"margin-0px\">Bueno, espero que ayudÃ³.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(253,'fr','<p class=\"margin-0px\">Donc, vous vouliez trier quelques mots, non? VoilÃ  ce qui vous Ã  cette page, est-ce pas?</p><br><p class=\"margin-0px\">Bon, je l\'espÃ¨re, il a aidÃ©.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(254,'ja','<p class=\"margin-0px\">ã ã‹ã‚‰ã€ã‚ãªãŸã¯å³ã€ã„ãã¤ã‹ã®å˜èªžã‚’ä¸¦ã¹æ›¿ãˆã—ãŸã„ã§ã™ã‹ï¼Ÿãã‚Œã¯ãã‚Œã¯ã€ã“ã®ãƒšãƒ¼ã‚¸ã«ã‚ãªãŸã«ã‚‚ãŸã‚‰ã—ãŸã‚‚ã®ã¯ãªã„ã§ã™ã­ã€‚è‰¯ã„ã€ç§ã¯ãã‚ŒãŒåŠ©ã‘ã‚’é¡˜ã£ã¦ã„ã¾ã™ã€‚</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(255,'it','<p class=\"margin-0px\">Quindi, si voleva ordinare alcune parole, giusto? Questo Ã¨ quello che ha portato a voi a questa pagina, non Ã¨ vero?</p><br><p class=\"margin-0px\">Bene, spero che lo ha aiutato.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(256,'nl','<p class=\"margin-0px\">Dus, je wilde een paar woorden te sorteren, toch? Dat is wat u aangeboden op deze pagina, is het niet?</p><br><p class=\"margin-0px\">Goed, ik hoop dat het hielp.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(257,'pl','<p class=\"margin-0px\">WiÄ™c chciaÅ‚ uporzÄ…dkowaÄ‡ pewne sÅ‚owa, prawda? To, co przedstawia PaÅ„stwu do tej strony, prawda?</p><br><p class=\"margin-0px\">Dobra, mam nadziejÄ™, Å¼e pomogÅ‚o.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(258,'pt','<p class=\"margin-0px\">Assim, vocÃª quis classificar algumas palavras, certo? Isso Ã© o que trouxe vocÃª para esta pÃ¡gina, nÃ£o Ã©?</p><br><p class=\"margin-0px\">Bom, espero que ajudou.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(259,'ru','<p class=\"margin-0px\">Ð˜Ñ‚Ð°Ðº, Ð²Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ Ð¾Ñ‚ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ ÑÐ»Ð¾Ð²Ð°, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸? Ð­Ñ‚Ð¾ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ð¿Ñ€Ð¸Ñ…Ð¾Ð´Ð¸Ñ‚ Ðº Ð²Ð°Ð¼ Ð½Ð° ÑÑ‚Ð¾Ð¹ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸?</p><br><p class=\"margin-0px\">Ð¥Ð¾Ñ€Ð¾ÑˆÐ¾, Ñ Ð½Ð°Ð´ÐµÑŽÑÑŒ, Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ð³Ð»Ð¾.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(260,'tr','<p class=\"margin-0px\">Yani, doÄŸru, bazÄ± kelimeler sÄ±ralamak istedim? Yani, bu sayfaya getirdi deÄŸil mi?</p><br><p class=\"margin-0px\">Ä°yi, ben yardÄ±mcÄ± umuyoruz.</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(261,'zh','<p class=\"margin-0px\">æ‰€ä»¥ï¼Œä½ æƒ³ä¸€äº›æŽ’åºçš„è¯ï¼Œå¯¹ä¸å¯¹ï¼Ÿè¿™å°±æ˜¯å¸¦ç»™ä½ è¿™ä¸ªé¡µé¢ï¼Œä¸æ˜¯å—ï¼Ÿ</p><br><p class=\"margin-0px\">å¥½ï¼Œæˆ‘å¸Œæœ›å®ƒå¸®åŠ©ã€‚</p>',0,31,'2016-08-19 16:43:04','2016-08-19 16:52:50'),(262,'de','Ich sortierte heute ein paar Worte!',0,32,'2016-08-19 16:43:04','2016-08-19 17:10:40'),(263,'es','Me lo solucionaron algunas palabras de hoy!',0,32,'2016-08-19 16:43:04','2016-08-19 17:10:40'),(264,'fr','J\'ai triÃ© quelques mots aujourd\'hui!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:40'),(265,'ja','ä»Šæ—¥ã¯ã„ãã¤ã‹ã®å˜èªžã‚’ä¸¦ã¹æ›¿ãˆï¼',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(266,'it','Ho risolto alcuni parole oggi!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(267,'nl','Ik gesorteerd sommige woorden vandaag!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(268,'pl','I sortowane dziÅ› kilka sÅ‚Ã³w!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(269,'pt','Separei algumas palavras hoje!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(270,'ru','Ð¯ ÑÐ¾Ñ€Ñ‚Ð¸Ñ€ÑƒÐµÑ‚ÑÑ Ð½ÐµÑÐºÐ¾Ð»ÑŒÐºÐ¾ ÑÐ»Ð¾Ð² ÑÐµÐ³Ð¾Ð´Ð½Ñ!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(271,'tr','BugÃ¼n bazÄ± kelimeler dizildi!',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(272,'zh','æˆ‘ä»Šå¤©æ•´ç†äº†ä¸€äº›è¯ï¼',0,32,'2016-08-19 16:43:05','2016-08-19 17:10:41'),(273,'de','Ãœber Sortieren WÃ¶rter: Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(274,'es','Sobre Ordenar Palabras: ClasificaciÃ³n de listas de palabras para usted',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(275,'fr','A propos Trier mots: Tri de vos listes de mots pour vous',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(276,'ja','ã‚½ãƒ¼ãƒˆè¨€è‘‰ã«ã¤ã„ã¦ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(277,'it','Su Sort parole: Ordinamento degli elenchi di parole per voi',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(278,'nl','Over Sort woorden: het sorteren van je lijsten of Words For You',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(279,'pl','O Sortuj Words: Sortowanie listy sÅ‚Ã³w dla Ciebie',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(280,'pt','Sobre Classificar Palavras: Classificando suas listas de palavras para vocÃª',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(281,'ru','Ðž Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° ÑÐ»Ð¾Ð²: Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð²Ð°ÑˆÐ¸Ñ… ÑÐ¿Ð¸ÑÐºÐ¾Ð² ÑÐ»Ð¾Ð² For You',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(282,'tr','SÄ±ralama Kelimeler HakkÄ±nda: For You Kelimelerin Listeler SÄ±ralama',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(283,'zh','å…³äºŽæŽ’åºè¯ï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,33,'2016-08-19 16:43:05','2016-08-19 16:47:22'),(284,'de','Kontakt Sortieren WÃ¶rter: Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(285,'es','Contacto Ordenar Palabras: ClasificaciÃ³n de listas de palabras para usted',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(286,'fr','Contact Trier mots: tri de vos listes de mots pour vous',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(287,'ja','é€£çµ¡å…ˆã®ä¸¦ã¹æ›¿ãˆè¨€è‘‰ã¯ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(288,'it','Contatto Ordina parole: Ordinamento degli elenchi di parole per voi',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(289,'nl','Contact Sort woorden: het sorteren van je woordenlijsten For You',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(290,'pl','Kontakt Sortowanie SÅ‚owa: Sortowanie listy sÅ‚Ã³w dla Ciebie',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(291,'pt','Contactar Classificar Palavras: Classificando suas listas de palavras para vocÃª',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(292,'ru','ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð½Ð°Ñ Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¡Ð»Ð¾Ð²Ð°: ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÑƒ ÑÐ¿Ð¸ÑÐºÐ¾Ð² ÑÐ»Ð¾Ð² For You',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(293,'tr','Ä°letiÅŸim sÄ±rala Kelimeler: For You Kelimelerin Listeler SÄ±ralama',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(294,'zh','è”ç³»äººæŽ’åºè¯ï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,34,'2016-08-19 16:43:05','2016-08-19 16:56:40'),(295,'de','Kontaktiere uns',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(296,'es','ContÃ¡ctenos',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(297,'fr','Contactez nous',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(298,'ja','ãŠå•ã„åˆã‚ã›',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(299,'it','Contattaci',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(300,'nl','Neem contact met ons op',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(301,'pl','Skontaktuj siÄ™ z nami',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(302,'pt','Entre Em Contato Conosco',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(303,'ru','Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(304,'tr','Bizimle iletiÅŸime geÃ§in',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(305,'zh','è”ç³»æˆ‘ä»¬',0,35,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(306,'de','Site Creator',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(307,'es','Creador del sitio',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(308,'fr','site Creator',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(309,'ja','ã‚µã‚¤ãƒˆä½œæˆè€…',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(310,'it','Creatore del sito',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(311,'nl','Site Creator',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(312,'pl','TwÃ³rca strony',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(313,'pt','Criador do site',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(314,'ru','Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÐµÐ»ÑŒ ÑÐ°Ð¹Ñ‚Ð°',0,36,'2016-08-19 16:43:05','0000-00-00 00:00:00'),(315,'tr','Site Creator',0,36,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(316,'zh','ç½‘ç«™çš„åˆ›å»ºè€…',0,36,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(317,'de','Webseite Erstellt am',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(318,'es','Sitio desarrollado en',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(319,'fr','Site CrÃ©Ã© le',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(320,'ja','ã‚µã‚¤ãƒˆã«ã¯ã€ä¸Šã§ä½œæˆã—ã¾ã™',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(321,'it','Sito Creato il',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(322,'nl','Site Gemaakt op',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(323,'pl','Strona stworzona dniu',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(324,'pt','Site criado em',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(325,'ru','Ð¡Ð°Ð¹Ñ‚ ÑÐ¾Ð·Ð´Ð°Ð½ Ð½Ð°',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(326,'tr','Site Ã¼zerinde dÃ¼zenlendi',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(327,'zh','ç½‘ç«™åˆ›å»ºæ—¶é—´',0,37,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(328,'de','Kontakt Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(329,'es','Contacto Creador',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(330,'fr','Contactez Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(331,'ja','é€£çµ¡ã‚¯ãƒªã‚¨ãƒ¼ã‚¿ãƒ¼',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(332,'it','Contatto Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(333,'nl','Contact Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(334,'pl','Kontakt Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(335,'pt','Contact Creator',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(336,'ru','ÐšÐ°Ðº ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð¢Ð²Ð¾Ñ€Ñ†Ð¾Ð¼',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(337,'tr','Ä°letiÅŸim OluÅŸturan',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(338,'zh','è”ç³»é€ ç‰©ä¸»',0,38,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(339,'de','Datei Roboter fÃ¼r Remove Duplicate Linien: Entfernen von doppelten EintrÃ¤ge aus Listen',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(340,'es','Los robots de archivo para las lÃ­neas duplicadas eliminar los siguientes: EliminaciÃ³n de entradas duplicadas de las Listas',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(341,'fr','Robots de fichiers Pour supprimer les doublons Lignes: Retrait entrÃ©es en double Ã  partir de listes',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(342,'ja','ãƒ­ãƒœãƒƒãƒˆã¯å‰Šé™¤é‡è¤‡è¡Œã®ãƒ•ã‚¡ã‚¤ãƒ«ï¼šãƒªã‚¹ãƒˆã‹ã‚‰é‡è¤‡ã—ãŸã‚¨ãƒ³ãƒˆãƒªã‚’å‰Šé™¤ã—ã¾ã™',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(343,'it','I robot dei file per rimuovere le linee duplicate: Rimuovere voci duplicate da liste',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(344,'nl','Robots-bestand Voor Remove Duplicate Lines: Het verwijderen van dubbele vermeldingen uit lijsten',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(345,'pl','Roboty plikÃ³w dla usuwanie linii Duplikat: Usuwanie zduplikowane wpisy z list',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(346,'pt','Robots arquivo Para linhas duplicadas Remover: Remover entradas duplicadas a partir de listas',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(347,'ru','Ð Ð¾Ð±Ð¾Ñ‚Ñ‹ Ñ„Ð°Ð¹Ð» Ð´Ð»Ñ ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð´ÑƒÐ±Ð»Ð¸ÐºÐ°Ñ‚Ð¾Ð² ÑÑ‚Ñ€Ð¾Ðº: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‚Ð¾Ñ€ÑÑŽÑ‰Ð¸Ñ…ÑÑ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹ Ð¸Ð· ÑÐ¿Ð¸ÑÐºÐ¾Ð²',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(348,'tr','Robotlar KaldÄ±r Duplicate HatlarÄ± Ä°Ã§in Dosya: Listesinden yinelenen girdileri kaldÄ±rÄ±lÄ±yor',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(349,'zh','æœºå™¨äººæ–‡ä»¶åˆ é™¤é‡å¤çš„çº¿è·¯ï¼šä»Žåˆ—è¡¨åˆ é™¤é‡å¤é¡¹',0,39,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(350,'de','Dies ist die fÃ¼r Menschen lesbare Version unserer robots.txt-Datei. Die <a href=\"/robots.txt\">Robots.txt File</a> ist, was tatsÃ¤chlich Suchmaschinen kriechen. Eine alternative <a href=\"/robots.xml\">Robots.xml File</a> hat auch zur VerfÃ¼gung gestellt, wenn Sie etwas mehr maschinenlesbar mÃ¼ssen. Die XML-Version hat auch eine <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(351,'es','Esta es la versiÃ³n legible por humanos de nuestro archivo robots.txt. El <a href=\"/robots.txt\">Robots.txt File</a> es lo que los motores de bÃºsqueda reales se arrastran. Una alternativa <a href=\"/robots.xml\">Robots.xml File</a> Se ha previsto tambiÃ©n que si necesitas algo mÃ¡s legible por mÃ¡quina. La versiÃ³n XML tambiÃ©n tiene una <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(352,'fr','Ceci est la version lisible par l\'homme de notre fichier robots.txt. Le <a href=\"/robots.txt\">Robots.txt File</a> est ce que les moteurs de recherche rÃ©els vont parcourir. Un supplÃ©ant <a href=\"/robots.xml\">Robots.xml File</a> a Ã©galement Ã©tÃ© fourni si vous avez besoin quelque chose de plus lisible par machine. La version XML a Ã©galement un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(353,'ja','ã“ã‚ŒãŒç§ãŸã¡ã®robots.txtãƒ•ã‚¡ã‚¤ãƒ«ã®äººé–“ãŒèª­ã‚ã‚‹ãƒãƒ¼ã‚¸ãƒ§ãƒ³ã§ã™ã€‚ <a href=\"/robots.txt\">Robots.txt File</a>ã¯ã€å®Ÿéš›ã®æ¤œç´¢ã‚¨ãƒ³ã‚¸ãƒ³ãŒã‚¯ãƒ­ãƒ¼ãƒ«ã•ã‚Œã¾ã™ã‚‚ã®ã§ã™ã€‚ã‚ãªãŸãŒä½•ã‹ã‚’è¤‡æ•°ã®æ©Ÿæ¢°å¯èª­ãŒå¿…è¦ãªå ´åˆã®ä»£æ›¿ã¯<a href=\"/robots.xml\">Robots.xml File</a>ã‚‚æä¾›ã•ã‚Œã¦ã„ã¾ã™ã€‚ XMLãƒãƒ¼ã‚¸ãƒ§ãƒ³ã‚‚<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã‚’æŒã£ã¦ã„ã¾ã™ã€‚',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(354,'it','Questa Ã¨ la versione leggibile del nostro file robots.txt. Il <a href=\"/robots.txt\">Robots.txt File</a> Ã¨ quello che effettivamente i motori di ricerca esegue la scansione. Un supplente <a href=\"/robots.xml\">Robots.xml File</a> Ã¨ stato anche fornito se avete bisogno di qualcosa di piÃ¹ leggibile dalla macchina. La versione XML ha anche un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(355,'nl','Dit is de leesbare versie van onze robots.txt bestand. De <a href=\"/robots.txt\">Robots.txt File</a> is wat de werkelijke zoekmachines zullen kruipen. Een alternatieve <a href=\"/robots.xml\">Robots.xml File</a> is ook voorzien als je iets meer machine leesbare nodig. De XML-versie heeft ook een <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(356,'pl','Ta wersja jest czytelny dla czÅ‚owieka naszego pliku robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Jest to, co rzeczywiste wyszukiwarek bÄ™dzie indeksowaÄ‡. Alternatywny <a href=\"/robots.xml\">Robots.xml File</a> zostaÅ‚y przekazane, jeÅ›li potrzebujesz czegoÅ› wiÄ™cej do odczytu maszynowego. Wersja XML ma rÃ³wnieÅ¼ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(357,'pt','Esta Ã© a versÃ£o legÃ­vel do nosso arquivo robots.txt. O <a href=\"/robots.txt\">Robots.txt File</a> Ã© o que os motores de busca reais irÃ¡ rastrear. Uma alternativa <a href=\"/robots.xml\">Robots.xml File</a> tambÃ©m foi fornecido se vocÃª precisa de algo mais legÃ­vel por mÃ¡quina. A versÃ£o XML tambÃ©m tem um <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(358,'ru','Ð­Ñ‚Ð¾ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº-ÑÑ‡Ð¸Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð²ÐµÑ€ÑÐ¸Ñ Ð½Ð°ÑˆÐµÐ³Ð¾ Ñ„Ð°Ð¹Ð»Ð° robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Ð¯Ð²Ð»ÑÐµÑ‚ÑÑ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ñ„Ð°ÐºÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ðµ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ ÑÐºÐ°Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ. ÐÐ»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¼ <a href=\"/robots.xml\">Robots.xml File</a> Ñ‚Ð°ÐºÐ¶Ðµ Ð¿Ñ€Ð¸ ÑƒÑÐ»Ð¾Ð²Ð¸Ð¸, ÐµÑÐ»Ð¸ Ð²Ð°Ð¼ Ð½ÑƒÐ¶Ð½Ð¾ Ñ‡Ñ‚Ð¾-Ñ‚Ð¾ Ð±Ð¾Ð»ÐµÐµ Ð¼Ð°ÑˆÐ¸Ð½Ð¾Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼ÑƒÑŽ. Ð’ÐµÑ€ÑÐ¸Ñ XML Ñ‚Ð°ÐºÐ¶Ðµ Ð¸Ð¼ÐµÐµÑ‚ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(359,'tr','Bu bizim robots.txt dosyanÄ±zÄ±n insan tarafÄ±ndan okunabilir sÃ¼rÃ¼mÃ¼dÃ¼r. <a href=\"/robots.txt\">Robots.txt File</a> GerÃ§ek arama motorlarÄ± tarama budur. Bir ÅŸey daha makine tarafÄ±ndan okunabilir gerekirse alternatif <a href=\"/robots.xml\">Robots.xml File</a> da saÄŸlanmÄ±ÅŸtÄ±r. XML versiyonu da bir <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a> vardÄ±r.',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(360,'zh','è¿™æ˜¯æˆ‘ä»¬çš„robots.txtæ–‡ä»¶çš„äººç±»å¯è¯»çš„ç‰ˆæœ¬ã€‚åœ¨<a href=\"/robots.txt\">Robots.txt File</a>æ˜¯å®žé™…çš„æœç´¢å¼•æ“Žå°†æŠ“å–ã€‚å¦ä¸€ç§<a href=\"/robots.xml\">Robots.xml File</a>ï¼Œå¦‚æžœä½ éœ€è¦æ›´å¤šçš„ä¸œè¥¿æœºå™¨å¯è¯»ä¹Ÿæœ‰è§„å®šã€‚ XMLç‰ˆæœ¬ä¹Ÿæœ‰<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã€‚',0,40,'2016-08-19 16:43:06','0000-00-00 00:00:00'),(361,'de','Sitemap fÃ¼r SortWords.com: Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,41,'2016-08-19 16:43:06','2016-08-19 17:40:47'),(362,'es','Mapa del sitio de SortWords.com: ClasificaciÃ³n de listas de palabras para usted',0,41,'2016-08-19 16:43:06','2016-08-19 17:40:47'),(363,'fr','Plan du site pour SortWords.com: Tri de vos listes de mots pour vous',0,41,'2016-08-19 16:43:06','2016-08-19 17:40:47'),(364,'ja','SortWords.comã®ãŸã‚ã®ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã¯ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,41,'2016-08-19 16:43:06','2016-08-19 17:40:47'),(365,'it','Mappa del sito per SortWords.com: ordinamento degli elenchi di parole per voi',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(366,'nl','Sitemap voor SortWords.com: het sorteren van je woordenlijsten For You',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(367,'pl','Mapa dla SortWords.com: Sortowanie listy sÅ‚Ã³w dla Ciebie',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(368,'pt','Sitemap para SortWords.com: Classificando suas listas de palavras para vocÃª',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(369,'ru','ÐšÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð° Ð´Ð»Ñ SortWords.com: Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð²Ð°ÑˆÐ¸Ñ… ÑÐ¿Ð¸ÑÐºÐ¾Ð² ÑÐ»Ð¾Ð² For You',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(370,'tr','SortWords.com iÃ§in Site: For You Kelimelerin Listeler SÄ±ralama',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(371,'zh','ç½‘ç«™åœ°å›¾ä¸ºSortWords.comï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,41,'2016-08-19 16:43:07','2016-08-19 17:40:47'),(372,'de','Dies ist die Site-Map. Sie finden hier eine Liste von jeder Seite auf dieser Website zu finden. Die <a href=\"/sitemap.xml\">XML Sitemap</a> und ein <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sind ebenfalls verfÃ¼gbar, sowie ein <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(373,'es','Este es el mapa del sitio. Usted encontrarÃ¡ una lista de todas las pÃ¡ginas de este sitio aquÃ­. El <a href=\"/sitemap.xml\">XML Sitemap</a> y un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> tambiÃ©n estÃ¡n disponibles, asÃ­ como un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(374,'fr','Ceci est le plan du site. Vous trouverez une liste de chaque page sur ce site ici. Le <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> et sont Ã©galement disponibles, ainsi qu\'un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(375,'ja','ã“ã‚Œã¯ã€ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã§ã™ã€‚ã‚ãªãŸã¯ã“ã“ã«ã“ã®ã‚µã‚¤ãƒˆä¸Šã®ã™ã¹ã¦ã®ãƒšãƒ¼ã‚¸ã®ä¸€è¦§ãŒã‚ã‚Šã¾ã™ã€‚ <a href=\"/sitemap.xml\">XML Sitemap</a>ã¨<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ã‚‚åˆ©ç”¨ã§ãã‚‹ã ã‘ã§ãªãã€<a href=\"/sitemap.txt\">TXT Sitemap</a>ã§ã™ã€‚',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(376,'it','Questa Ã¨ la mappa del sito. Troverete un elenco di ogni pagina di questo sito qui. Il <a href=\"/sitemap.xml\">XML Sitemap</a> e un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sono disponibili, cosÃ¬ come un <a href=\"/sitemap.txt\">TXT Sitemap</a> anche.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(377,'nl','Dit is de site map. U ziet een lijst van alle pagina\'s op deze site hier. De <a href=\"/sitemap.xml\">XML Sitemap</a> en een <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> zijn ook beschikbaar, evenals een <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(378,'pl','Jest to mapa serwisu. Znajdziesz tu listÄ™ wszystkich stron na tej stronie tutaj. <a href=\"/sitemap.xml\">XML Sitemap</a> I <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> dostÄ™pne, jak rÃ³wnieÅ¼ <a href=\"/sitemap.txt\">TXT Sitemap</a> rÃ³wnieÅ¼.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(379,'pt','Este Ã© o mapa do site. VocÃª vai encontrar uma lista de todas as pÃ¡ginas neste site aqui. O <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> e tambÃ©m estÃ£o disponÃ­veis, assim como um <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(380,'ru','Ð­Ñ‚Ð¾ ÐºÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð°. Ð’Ñ‹ Ð½Ð°Ð¹Ð´ÐµÑ‚Ðµ ÑÐ¿Ð¸ÑÐ¾Ðº Ð²ÑÐµÑ… ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ† Ð½Ð° ÑÑ‚Ð¾Ð¼ ÑÐ°Ð¹Ñ‚Ðµ Ð·Ð´ÐµÑÑŒ. <a href=\"/sitemap.xml\">XML Sitemap</a> Ð˜ <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>, Ñ‚Ð°ÐºÐ¶Ðµ Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹, Ð° Ñ‚Ð°ÐºÐ¶Ðµ <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(381,'tr','Bu site haritasÄ±dÄ±r. Burada bu sitede her sayfanÄ±n bir listesini bulacaksÄ±nÄ±z. <a href=\"/sitemap.xml\">XML Sitemap</a> Ve <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> da mevcuttur, hem de bir <a href=\"/sitemap.txt\">TXT Sitemap</a> vardÄ±r.',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(382,'zh','è¿™æ˜¯åœ¨ç«™ç‚¹åœ°å›¾ã€‚ä½ ä¼šå‘çŽ°æ¯ä¸€é¡µçš„åˆ—è¡¨ï¼Œåœ¨è¿™ä¸ªç½‘ç«™åœ¨è¿™é‡Œã€‚åœ¨<a href=\"/sitemap.xml\">XML Sitemap</a>å’Œ<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ä¹Ÿéƒ½å…·å¤‡ï¼Œè¿˜æœ‰ä¸€ä¸ª<a href=\"/sitemap.txt\">TXT Sitemap</a>ã€‚',0,42,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(383,'de','Art, Ordnung, zu organisieren, Liste, alphabetisch, alphabetize',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(384,'es','clase, orden, organizar, lista, por orden alfabÃ©tico, en orden alfabÃ©tico',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(385,'fr','tri, ordre, organisation, liste, alphabÃ©tique, alphabÃ©tiser',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(386,'ja','ã‚½ãƒ¼ãƒˆã€é †åºã€ãƒªã‚¹ãƒˆã‚’æ•´ç†ã—ã€ã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †ã€ã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †ã«',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(387,'it','Ordina, ordine, organizzare, elenco, in ordine alfabetico, alfabetizzare',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(388,'nl','sorteren, orde, organiseer, lijst, alfabetisch, alfabetisch',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(389,'pl','porzÄ…dek, Å‚ad, porzÄ…dkowanie listy alfabetycznej, alphabetize',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(390,'pt','tipo, ordem, organizar a lista, alfabÃ©tico, alfabetizar',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(391,'ru','ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ°, Ð¿Ð¾Ñ€ÑÐ´Ð¾Ðº, Ð¾Ñ€Ð³Ð°Ð½Ð¸Ð·Ð¾Ð²Ñ‹Ð²Ð°Ñ‚ÑŒ, ÑÐ¿Ð¸ÑÐ¾Ðº, Ð² Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ð½Ð¾Ð¼ Ð¿Ð¾Ñ€ÑÐ´ÐºÐµ, Ð² Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ð½Ð¾Ð¼ Ð¿Ð¾Ñ€ÑÐ´ÐºÐµ',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(392,'tr','sÄ±ralama, sipariÅŸ, listeyi dÃ¼zenlemek, alfabetik, alfabetik',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(393,'zh','æŽ’åºï¼Œé¡ºåºï¼Œæ•´ç†ï¼Œåˆ—è¡¨ï¼ŒæŒ‰å­—æ¯é¡ºåºæŽ’åˆ—ï¼ŒæŒ‰å­—æ¯é¡ºåºæŽ’åˆ—',0,43,'2016-08-19 16:43:07','2016-08-19 17:23:38'),(394,'de','Sortierung Anwendung, Web Application, Word-Anwendung',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(395,'es','AplicaciÃ³n de clasificaciÃ³n, aplicaciÃ³n Web, Word AplicaciÃ³n',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(396,'fr','Demande de tri, application Web, Word application',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(397,'ja','ã‚½ãƒ¼ãƒˆã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Wordã®ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(398,'it','Ordinamento Application, applicazioni Web, Word Application',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(399,'nl','Sortering Application, Web Application, Word Application',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(400,'pl','Sortowanie aplikacji, aplikacji internetowych, aplikacji SÅ‚owo',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(401,'pt','Classificando Aplicativo, Web, aplicativo Palavra',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(402,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Word Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(403,'tr','SÄ±ralama Uygulama, Web Uygulama, Word uygulama',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(404,'zh','æŽ’åºåº”ç”¨ç¨‹åºï¼ŒWebåº”ç”¨ç¨‹åºï¼ŒWordåº”ç”¨ç¨‹åº',0,44,'2016-08-19 16:43:07','2016-08-19 17:37:30'),(405,'de','Internetanwendung',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(406,'es','AplicaciÃ³n web',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(407,'fr','Application Web',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(408,'ja','ã‚¦ã‚§ãƒ–ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(409,'it','Applicazione web',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(410,'nl','Web applicatie',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(411,'pl','Aplikacja internetowa',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(412,'pt','AplicaÃ§Ã£o web',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(413,'ru','Ð’ÐµÐ± Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(414,'tr','Web UygulamasÄ±',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(415,'zh','Webåº”ç”¨ç¨‹åº',0,45,'2016-08-19 16:43:07','0000-00-00 00:00:00'),(416,'de','Alphabetisch',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(417,'es','AlfabÃ©tico',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(418,'fr','AlphabÃ©tique',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(419,'ja','ã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(420,'it','Alfabetico',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(421,'nl','Alfabetisch',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(422,'pl','Alfabetyczny',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(423,'pt','alfabÃ©tica',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(424,'ru','ÐŸÐ¾ Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ñƒ',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(425,'tr','Alfabetik',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(426,'zh','æŒ‰å­—æ¯é¡ºåº',0,46,'2016-08-19 18:05:06','0000-00-00 00:00:00'),(427,'de','Alpha Order: von A bis Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(428,'es','Alfa orden: A a la Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(429,'fr','Alpha commande: A Ã  Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(430,'ja','ã‚¢ãƒ«ãƒ•ã‚¡æ³¨æ–‡ï¼šZã¨A',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(431,'it','Alpha Order: dalla A alla Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(432,'nl','Alpha Order: A tot Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(433,'pl','Alpha produktu: od A do Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(434,'pt','Alpha Order: A a Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(435,'ru','ÐÐ»ÑŒÑ„Ð° Ð·Ð°ÐºÐ°Ð·Ð°: Ð¾Ñ‚ Ð Ð´Ð¾ Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(436,'tr','Alfa SipariÅŸ: A\'dan Z\'ye',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(437,'zh','å­—æ¯é¡ºåºï¼šAåˆ°Z.',0,47,'2016-08-19 18:11:06','0000-00-00 00:00:00'),(438,'de','numerisch',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(439,'es','NumÃ©rico',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(440,'fr','numÃ©rique',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(441,'ja','æ•°å€¤ã®',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(442,'it','Numerico',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(443,'nl','numeriek',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(444,'pl','numeryczna',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(445,'pt','NumÃ©rico',0,48,'2016-08-19 18:14:14','0000-00-00 00:00:00'),(446,'ru','Ñ‡Ð¸ÑÐ»Ð¾Ð²Ð¾Ð¹',0,48,'2016-08-19 18:14:15','0000-00-00 00:00:00'),(447,'tr','sayÄ±sal',0,48,'2016-08-19 18:14:15','0000-00-00 00:00:00'),(448,'zh','æ•°å­—',0,48,'2016-08-19 18:14:15','0000-00-00 00:00:00'),(449,'de','Anzahl Order: 1 bis 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(450,'es','NÃºmero de pedido: 1 a 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(451,'fr','NumÃ©ro de commande: 1 Ã  99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(452,'ja','ç•ªå·é †ï¼š1ã€œ99ã€‚',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(453,'it','Numero d\'ordine: 1 a 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(454,'nl','Nummer Order: 1-99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(455,'pl','Numer zamÃ³wienia: od 1 do 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(456,'pt','NÃºmero de Ordem: 1 a 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(457,'ru','ÐÐ¾Ð¼ÐµÑ€ Ð·Ð°ÐºÐ°Ð·Ð°: Ð¾Ñ‚ 1 Ð´Ð¾ 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(458,'tr','Numara SipariÅŸ: 1 99.',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(459,'zh','å·é¡ºåºï¼š1åˆ°99ã€‚',0,49,'2016-08-19 18:17:44','0000-00-00 00:00:00'),(460,'de','umgekehrter alphabetischer',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(461,'es','revertir alfabÃ©tico',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(462,'fr','Inverser alphabÃ©tique',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(463,'ja','ã‚¢ãƒ«ãƒ•ã‚¡ãƒ™ãƒƒãƒˆé †ã‚’é€†ã«',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(464,'it','Reverse alfabetico',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(465,'nl','reverse Alfabetisch',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(466,'pl','Rewers Alfabetycznie',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(467,'pt','reverter alfabÃ©tica',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(468,'ru','ÐžÐ±Ñ€Ð°Ñ‚Ð½Ñ‹Ð¹ ÐŸÐ¾ Ð°Ð»Ñ„Ð°Ð²Ð¸Ñ‚Ñƒ',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(469,'tr','Alfabetik ters',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(470,'zh','ç›¸åçš„å­—æ¯',0,50,'2016-08-19 18:23:44','0000-00-00 00:00:00'),(471,'de','Reverse-Alpha Order: Z bis A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(472,'es','Invertir Alfa Orden: Z a la A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(473,'fr','Inverser Alpha Ordre: Z Ã  A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(474,'ja','ã‚¢ãƒ«ãƒ•ã‚¡é †åºã‚’é€†ï¼šAã«Zã‚’',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(475,'it','Reverse Alpha ordine: dalla Z alla A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(476,'nl','Omgekeerde Alpha Order: Z tot A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(477,'pl','Rewers Alpha kolejnoÅ›ci: od Z do A',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(478,'pt','Reverter Alpha Order: Z a A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(479,'ru','ÐžÐ±Ñ€Ð°Ñ‚Ð½Ñ‹Ð¹ ÐÐ»ÑŒÑ„Ð° ÐŸÐ¾Ñ€ÑÐ´Ð¾Ðº: Z Ð² Ð¿Ð¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(480,'tr','Alfa Tersinden: A. Z',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(481,'zh','åå‘å­—æ¯é¡ºåºï¼šZåˆ°A.',0,51,'2016-08-19 18:26:12','0000-00-00 00:00:00'),(482,'de','Reverse-Numeric',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(483,'es','revertir numÃ©rico',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(484,'fr','Inverser numÃ©rique',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(485,'ja','æ•°å€¤ã‚’é€†ã«',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(486,'it','Reverse numerico',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(487,'nl','reverse Numeriek',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(488,'pl','Rewers Numeryczne',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(489,'pt','reverter numÃ©rico',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(490,'ru','ÐžÐ±Ñ€Ð°Ñ‚Ð½Ñ‹Ð¹ Numeric',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(491,'tr','SayÄ±sal ters',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(492,'zh','åå‘æ•°å­—',0,52,'2016-08-19 18:28:36','0000-00-00 00:00:00'),(493,'de','Reverse-Nummer Order: 99 bis 1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(494,'es','Invertir NÃºmero de pedido: 99 a 1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(495,'fr','Inverser NumÃ©ro de commande: 99 Ã  1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(496,'ja','ç•ªå·é †åºã‚’é€†ï¼š991ã€‚',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(497,'it','Reverse Numero d\'ordine: 99-1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(498,'nl','Aantal Reverse Order: 99-1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(499,'pl','Rewers numer katalogowy: 99 do 1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(500,'pt','Reverso nÃºmero de Ordem: 99-1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(501,'ru','ÐžÐ±Ñ€Ð°Ñ‚Ð½Ñ‹Ð¹ ÐÐ¾Ð¼ÐµÑ€ Ð´Ð»Ñ Ð·Ð°ÐºÐ°Ð·Ð°: 99 Ð´Ð¾ 1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(502,'tr','Numara Tersinden: 99 ile 1.',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(503,'zh','åå‘å·ç é¡ºåºï¼š99ã€œ1ã€‚',0,53,'2016-08-19 18:30:56','0000-00-00 00:00:00'),(504,'de','Und',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(505,'es','Y',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(506,'fr','Et',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(507,'ja','ãã—ã¦',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(508,'it','E',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(509,'nl','En',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(510,'pl','I',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(511,'pt','E',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(512,'ru','Ð Ñ‚Ð°ÐºÐ¶Ðµ',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(513,'tr','Ve',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(514,'zh','å’Œ',0,54,'2016-08-26 16:46:50','0000-00-00 00:00:00'),(515,'de','anderes Land',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(516,'es','otro paÃ­s',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(517,'fr','autre pays',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(518,'ja','ä»–ã®å›½',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(519,'it','altro paese',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(520,'nl','ander land',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(521,'pl','inne paÅ„stwo',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(522,'pt','outro paÃ­s',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(523,'ru','Ð´Ñ€ÑƒÐ³Ð°Ñ ÑÑ‚Ñ€Ð°Ð½Ð°',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(524,'tr','diÄŸer Ã¼lke',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(525,'zh','å…¶ä»–å›½å®¶',0,55,'2016-08-26 16:49:11','0000-00-00 00:00:00'),(526,'de','andere LÃ¤nder',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(527,'es','otros paÃ­ses',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(528,'fr','autres pays',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(529,'ja','ä»–ã®å›½ã€…',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(530,'it','altri paesi',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(531,'nl','andere landen',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(532,'pl','inne kraje',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(533,'pt','outros paÃ­ses',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(534,'ru','Ð´Ñ€ÑƒÐ³Ð¸Ðµ ÑÑ‚Ñ€Ð°Ð½Ñ‹',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(535,'tr','diÄŸer Ã¼lkeler',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(536,'zh','å…¶ä»–å›½å®¶',0,56,'2016-08-26 16:53:02','0000-00-00 00:00:00'),(537,'de','Sprache wÃ¤hlen FÃ¼r Sortieren WÃ¶rter: Sortieren Sie Ihre Listen von WÃ¶rtern fÃ¼r Sie',0,57,'2016-08-27 15:05:43','0000-00-00 00:00:00'),(538,'es','Para seleccionar Idioma Ordenar Palabras: ClasificaciÃ³n de listas de palabras para usted',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(539,'fr','SÃ©lectionnez la langue de tri mots: tri de vos listes de mots pour vous',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(540,'ja','ä¸¦ã¹æ›¿ãˆå˜èªžã®è¨€èªžã‚’é¸æŠžã—ã¦ãã ã•ã„ï¼šã‚ãªãŸã®ãŸã‚ã®è¨€è‘‰ã®ã‚ãªãŸã®ãƒªã‚¹ãƒˆã®ã‚½ãƒ¼ãƒˆ',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(541,'it','Selezionare la lingua per Ordina parole: Ordinamento degli elenchi di parole per voi',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(542,'nl','Selecteer Taal Voor Sort woorden: het sorteren van je lijsten of Words For You',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(543,'pl','Wybierz jÄ™zyk Sortuj Words: Sortowanie listy sÅ‚Ã³w dla Ciebie',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(544,'pt','Selecione o idioma Para Classificar Palavras: Classificando suas listas de palavras para vocÃª',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(545,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº Ð´Ð»Ñ ÑÑ‚Ð°ÐºÐ¾Ð¹ Ð¡Ð»Ð¾Ð²Ð°: ÑÐ¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÑƒ ÑÐ¿Ð¸ÑÐºÐ¾Ð² ÑÐ»Ð¾Ð² For You',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(546,'tr','SÄ±ralama For Words Dil SeÃ§iniz: For You Kelimelerin Listeler SÄ±ralama',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(547,'zh','é€‰æ‹©è¯­è¨€æŽ’åºè¯ï¼šæŽ’åºä½ çš„è¯æ±‡åˆ—å‡ºäº†ä½ ',0,57,'2016-08-27 15:05:44','0000-00-00 00:00:00'),(548,'LanguagesFreq','yearly',0,58,'2016-08-27 15:23:40','2016-08-27 16:21:47'),(549,'LanguagesLastMod','2016-08-27',0,58,'2016-08-27 15:23:40','2016-08-27 16:21:47'),(550,'LanguagesPriority','0.1',0,58,'2016-08-27 15:23:40','2016-08-27 16:21:47'),(551,'de','Sprachen',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(552,'es','idiomas',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(553,'fr','Langues',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(554,'ja','è¨€èªž',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(555,'it','Le lingue',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(556,'nl','talen',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(557,'pl','JÄ™zyki',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(558,'pt','idiomas',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(559,'ru','Ð¯Ð·Ñ‹ÐºÐ¸',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(560,'tr','Diller',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(561,'zh','è¯­è¨€',0,59,'2016-08-27 16:14:08','0000-00-00 00:00:00'),(562,'de','Aktie',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(563,'es','Compartir',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(564,'fr','Partager',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(565,'ja','ã‚·ã‚§ã‚¢',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(566,'it','Condividere',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(567,'nl','Delen',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(568,'pl','DzieliÄ‡',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(569,'pt','Compartilhar',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(570,'ru','ÐŸÐ¾Ð´ÐµÐ»Ð¸Ñ‚ÑŒÑÑ',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(571,'tr','Pay',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(572,'zh','åˆ†äº«',0,60,'2016-09-05 14:03:07','0000-00-00 00:00:00'),(573,'de','Teilen mit',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(574,'es','Compartir con',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(575,'fr','Partager avec',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(576,'ja','ã¨å…±æœ‰ã™ã‚‹',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(577,'it','Condividi con',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(578,'nl','Delen met',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(579,'pl','UdostÄ™pniaÄ‡',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(580,'pt','Compartilhar com',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(581,'ru','Ð Ð°Ð·Ñ€ÐµÑˆÐ¸Ñ‚ÑŒ',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(582,'tr','Ä°le paylaÅŸ',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(583,'zh','ä¸ŽæŸäººåˆ†äº«',0,61,'2016-09-05 14:03:11','0000-00-00 00:00:00'),(584,'de','Sprache auswÃ¤hlen',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(585,'es','Seleccione el idioma',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(586,'fr','Choisir la langue',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(587,'ja','è¨€èªžã‚’é¸æŠžã™ã‚‹',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(588,'it','Seleziona la lingua',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(589,'nl','Selecteer Taal',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(590,'pl','Wybierz jÄ™zyk',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(591,'pt','Selecione o idioma',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(592,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(593,'tr','Dil SeÃ§in',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(594,'zh','é€‰æ‹©è¯­è¨€',0,62,'2017-01-10 15:32:07','2017-01-10 15:32:07'),(595,'de','Robots.txt Datei',0,63,'2017-01-10 15:47:11','2017-01-10 15:47:11'),(596,'es','Archivo Robots.txt',0,63,'2017-01-10 15:47:11','2017-01-10 15:47:11'),(597,'fr','Fichier Robots.txt',0,63,'2017-01-10 15:47:11','2017-01-10 15:47:11'),(598,'ja','Robots.txtãƒ•ã‚¡ã‚¤ãƒ«',0,63,'2017-01-10 15:47:11','2017-01-10 15:47:11'),(599,'it','file robots.txt',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(600,'nl','robots.txt bestand',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(601,'pl','Plik robots.txt',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(602,'pt','Arquivo Robots.txt',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(603,'ru','Ð¤Ð°Ð¹Ð» robots.txt',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(604,'tr','Robots.txt DosyasÄ±',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(605,'zh','Robots.txtæ–‡ä»¶',0,63,'2017-01-10 15:47:12','2017-01-10 15:47:12'),(606,'de','Status',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(607,'es','Estado',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(608,'fr','statut',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(609,'ja','çŠ¶æ…‹',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(610,'it','Stato',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(611,'nl','toestand',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(612,'pl','Status',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(613,'pt','Status',0,64,'2017-01-12 11:11:17','2017-01-12 11:11:17'),(614,'ru','ÐŸÐ¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð´ÐµÐ»',0,64,'2017-01-12 11:11:18','2017-01-12 11:11:18'),(615,'tr','Durum',0,64,'2017-01-12 11:11:18','2017-01-12 11:11:18'),(616,'zh','çŠ¶æ€',0,64,'2017-01-12 11:11:18','2017-01-12 11:11:18'),(617,'de','Warten auf Benutzer',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(618,'es','Esperando usuario',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(619,'fr','Attente de l\'utilisateur',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(620,'ja','ãƒ¦ãƒ¼ã‚¶ãƒ¼å¾…ã¡',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(621,'it','In attesa di utente',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(622,'nl','Wachten op gebruiker',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(623,'pl','Oczekiwanie na uÅ¼ytkownika',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(624,'pt','Aguardando UsuÃ¡rio',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(625,'ru','ÐžÐ¶Ð¸Ð´Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(626,'tr','KullanÄ±cÄ±yÄ± Bekliyor',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25'),(627,'zh','æ­£åœ¨ç­‰å¾…ç”¨æˆ·',0,65,'2017-01-12 11:11:25','2017-01-12 11:11:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PrimaryHostRecord`
--

LOCK TABLES `PrimaryHostRecord` WRITE;
/*!40000 ALTER TABLE `PrimaryHostRecord` DISABLE KEYS */;
INSERT INTO `PrimaryHostRecord` VALUES (1,'Contact','uprisingengineer@gmail.com','0000-00-00 00:00:00','2017-01-31 08:49:47'),(2,'Classification','Web Application','0000-00-00 00:00:00','2017-01-31 08:49:47'),(4,'Publisher','Self-Published (sortwords.com)','0000-00-00 00:00:00','2017-01-31 08:49:47'),(6,'PublicReleaseDate','2016-06-02','0000-00-00 00:00:00','2017-01-31 08:49:47'),(7,'Contributor','No Other Contributors','0000-00-00 00:00:00','2017-01-31 08:49:47'),(8,'ApplicationName','Sort Words','0000-00-00 00:00:00','2017-01-31 08:49:47'),(9,'Subject','Sorting, Organizing, Alphabetizing','0000-00-00 00:00:00','2017-01-31 08:49:47'),(15,'Rights','All Material Copyrighted by its Owners, Public Use as made available is allowed.','0000-00-00 00:00:00','2017-01-31 08:49:47'),(17,'NewsKeywords','Sorting Application, Web Application, Word Application','0000-00-00 00:00:00','2017-01-31 08:49:47'),(18,'BaseTemplate','file.html','0000-00-00 00:00:00','2017-01-31 08:49:47'),(19,'PrimaryImageRight','sort-words-reverse.jpg','0000-00-00 00:00:00','2017-01-31 08:49:47'),(20,'PrimaryImageLeft','sort-words.jpg','0000-00-00 00:00:00','2017-01-31 08:49:47'),(21,'Creator','UprisingEngineer','0000-00-00 00:00:00','2017-01-31 08:49:47'),(22,'Copyright','All Material Created by the Owners of this Site is Owned by the Site\'s Owners','0000-00-00 00:00:00','2017-01-31 08:49:47'),(23,'Author','UprisingEngineer','2017-01-09 14:20:37','2017-01-31 08:49:47'),(24,'NotReadyForSearch','1','2017-01-27 16:54:02','2017-01-31 08:49:47'),(25,'FullImage','sort-words-full.jpg','2017-01-31 08:49:47','2017-01-31 08:49:47');
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
INSERT INTO `Quote` VALUES (1,'I sorted some words today!','','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `Tag` VALUES (1,'sort','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'order','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'organize','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'list','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'alphabetical','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'alphabetize','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `TextBody` VALUES (1,'<p class=\"margin-0px\">So, you wanted to sort some words, right?  That\'s what brought to you to this page, isn\'t it?</p>\r\n<br>\r\n<p class=\"margin-0px\">Good, I hope it helped.</p>','','',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
  `Password` binary(64) NOT NULL DEFAULT '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
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
INSERT INTO `UserAdmin` VALUES (1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `UserSession` VALUES (21,1,'Qs3myKEMmAx55N3LuitUtt5lM6E9Oi+G1KnQ9nbji3','2017-04-07 16:10:34','0000-00-00 00:00:00','2017-04-07 16:10:34');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sortwords'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:38:00
