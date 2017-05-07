-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: 208.97.173.170    Database: removespacing
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
INSERT INTO `Assignment` VALUES (1,1,0,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `AvailabilityDateRange` VALUES (1,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `ChildRecordStats` VALUES (1,1,0,0,1,'2017-02-05 15:26:12','2017-05-06 04:45:38');
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
INSERT INTO `Description` VALUES (1,'Use this web app to remove spacing from text.  You may remove spaces, tabs, indents, newlines, and carriage returns.','','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `Entry` VALUES (1,'Remove Spacing','Removing Spaces and Spacing from Your Text','','RemoveSpacing.com','2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `EntryPermission` VALUES (1,1,21,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupList`
--

LOCK TABLES `LookupList` WRITE;
/*!40000 ALTER TABLE `LookupList` DISABLE KEYS */;
INSERT INTO `LookupList` VALUES (1,'LanguagesMainHeader',0,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(2,'LanguagesMainInstructionsHeader',0,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(3,'LanguagesMainInstructionsContent',0,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(4,'LanguagesMainList1Header',0,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(5,'LanguagesMainList2Header',0,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(6,'LanguagesMainList1Content',0,'2016-08-28 12:12:03','0000-00-00 00:00:00'),(7,'LanguagesMainList2Content',0,'2016-08-28 12:12:03','0000-00-00 00:00:00'),(8,'LanguagesMainButtonText',0,'2016-08-28 12:12:04','0000-00-00 00:00:00'),(15,'LanguagesBottomNavigationHome',0,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(16,'LanguagesBottomNavigationAbout',0,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(17,'LanguagesBottomNavigationContact',0,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(18,'LanguagesAboutUsHeader',0,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(19,'LanguagesAboutUsContent',0,'2016-08-28 12:12:09','0000-00-00 00:00:00'),(20,'LanguagesMainImageQuote',0,'2016-08-28 12:12:09','0000-00-00 00:00:00'),(21,'LanguagesAboutHeader',0,'2016-08-28 12:12:09','0000-00-00 00:00:00'),(22,'LanguagesContactHeader',0,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(23,'LanguagesContactUs',0,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(24,'LanguagesSiteCreator',0,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(25,'LanguagesSiteCreatedOn',0,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(26,'LanguagesContactCreator',0,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(27,'LanguagesRobotsHeader',0,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(28,'LanguagesRobotsInstructions',0,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(29,'LanguagesSitemapHeader',0,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(30,'LanguagesSitemapInstructions',0,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(31,'LanguagesMainKeywords',0,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(32,'LanguagesMainNewsKeywords',0,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(33,'LanguagesMainClassification',0,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(34,'AboutPageInfo',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(35,'ContactPageInfo',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(36,'HomePageInfo',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(37,'LanguagesPageInfo',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(38,'LanguagesAnd',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(39,'LanguagesOtherCountry',0,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(40,'LanguagesOtherCountries',0,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(41,'LanguagesHeader',0,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(42,'LanguagesBottomNavigationLanguages',0,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(43,'LanguagesMainFirstFeatureOptionOneTitle',0,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(44,'LanguagesMainFirstFeatureOptionOneMouseover',0,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(45,'LanguagesMainFirstFeatureOptionTwoTitle',0,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(46,'LanguagesMainFirstFeatureOptionTwoMouseover',0,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(47,'LanguagesMainFirstFeatureOptionThreeTitle',0,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(48,'LanguagesMainFirstFeatureOptionThreeMouseover',0,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(49,'LanguagesMainFirstFeatureOptionFourTitle',0,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(50,'LanguagesMainFirstFeatureOptionFourMouseover',0,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(51,'LanguagesMainFirstFeatureOptionFiveTitle',0,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(52,'LanguagesMainFirstFeatureOptionFiveMouseover',0,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(53,'LanguagesMainFirstFeatureOptionSixTitle',0,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(54,'LanguagesMainFirstFeatureOptionSixMouseover',0,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(55,'LanguagesMainFirstFeatureOptionSevenTitle',0,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(56,'LanguagesMainFirstFeatureOptionSevenMouseover',0,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(57,'LanguagesShare',0,'2016-09-05 13:50:47','0000-00-00 00:00:00'),(58,'LanguagesShareWith',0,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(59,'LanguagesSelectLanguageTitle',0,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(60,'LanguagesRobotsFilename',0,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(61,'LanguagesMainStatusHeader',0,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(62,'LanguagesMainActivityHeader',0,'2017-01-12 14:52:21','2017-01-12 14:52:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=651 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LookupListItem`
--

LOCK TABLES `LookupListItem` WRITE;
/*!40000 ALTER TABLE `LookupListItem` DISABLE KEYS */;
INSERT INTO `LookupListItem` VALUES (1,'de','Entfernen Sie Abstand (RemoveSpacing.com): Entfernen von Leerzeichen und AbstÃ¤nde aus dem Text',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(2,'es','Retire espaciado (RemoveSpacing.com): Eliminar espacios y el espaciamiento de su texto',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(3,'fr','Retirer Espacement (RemoveSpacing.com): Suppression des espaces et espacement de votre texte',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(4,'ja','å‰Šé™¤é–“éš”ï¼ˆRemoveSpacing.comï¼‰ï¼šã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰ã‚¹ãƒšãƒ¼ã‚¹ã¨é–“éš”ã‚’å‰Šé™¤ã—ã¾ã™',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(5,'it','Rimuovere spaziatura (RemoveSpacing.com): Rimozione di spazi e spaziatura dal testo',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(6,'nl','Verwijder Spacing (RemoveSpacing.com): Het verwijderen van Spaces en de afstand van uw tekst',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(7,'pl','UsuÅ„ odstÄ™py (RemoveSpacing.com): usuniÄ™cie spacji i rozstawienie z tekstu',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(8,'pt','Remover espaÃ§amento (RemoveSpacing.com): Remover espaÃ§os e espaÃ§amento do texto',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(9,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð Ð°Ð·Ð½Ð¾Ñ (RemoveSpacing.com): Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÑÑ‚Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(10,'tr','KaldÄ±r AralÄ±ÄŸÄ± (RemoveSpacing.com): Sizin Text Spaces ve AralÄ±ÄŸÄ± Ã‡Ä±karma',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(11,'zh','åˆ é™¤é—´è·ï¼ˆRemoveSpacing.comï¼‰ï¼šä»Žä½ çš„æ–‡å­—åŽ»æŽ‰ç©ºæ ¼å’Œé—´è·',0,1,'2016-08-28 12:12:01','2016-08-28 16:49:15'),(12,'de','Anleitung',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(13,'es','Instrucciones',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(14,'fr','Instructions',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(15,'ja','æŒ‡ç¤º',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(16,'it','Istruzioni',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(17,'nl','Instructies',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(18,'pl','Instrukcje',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(19,'pt','InstruÃ§Ãµes',0,2,'2016-08-28 12:12:01','0000-00-00 00:00:00'),(20,'ru','InstrucÈ›iunitr',0,2,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(21,'tr','Talimatlar',0,2,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(22,'zh','è¯´æ˜Ž',0,2,'2016-08-28 12:12:02','0000-00-00 00:00:00'),(23,'de','Verwenden Sie diese Web-App Abstand von Text zu entfernen. Sie kÃ¶nnen Leerzeichen, Tabulatoren , EinzÃ¼ge, ZeilenumbrÃ¼che und WagenrÃ¼cklauf zu entfernen.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(24,'es','Utilice esta aplicaciÃ³n web para eliminar el espaciado del texto. Usted puede quitar espacios, tabulaciones, sangrÃ­as, los saltos de lÃ­nea y retornos de carro.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(25,'fr','Utilisez cette application Web pour supprimer l\'espacement du texte. Vous pouvez supprimer les espaces, les onglets, les retraits, les nouvelles lignes et retours chariot.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(26,'ja','ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰é–“éš”ã‚’å‰Šé™¤ã™ã‚‹ã«ã¯ã€ã“ã®Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã‚’ä½¿ç”¨ã—ã¦ãã ã•ã„ã€‚ã‚ãªãŸã¯ã€ã‚¹ãƒšãƒ¼ã‚¹ã€ã‚¿ãƒ–ã€ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆã€æ”¹è¡Œã€ãŠã‚ˆã³ã‚­ãƒ£ãƒªãƒƒã‚¸ãƒªã‚¿ãƒ¼ãƒ³ã‚’é™¤åŽ»ã™ã‚‹ã“ã¨ãŒã§ãã¾ã™ã€‚',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(27,'it','Utilizzare questa applicazione web per rimuovere la spaziatura dal testo. Si puÃ² rimuovere gli spazi, tabulazioni, rientri, a capo, e ritorni a capo.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(28,'nl','Gebruik deze web-app om afstand uit tekst te verwijderen. U kunt spaties, tabs, streepjes, nieuwe regels en harde returns te verwijderen.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(29,'pl','Za pomocÄ… tej aplikacji internetowej, aby usunÄ…Ä‡ odstÄ™py od tekstu. MoÅ¼esz usunÄ…Ä‡ spacje, tabulatory, wciÄ™cia, znaki nowej linii i powrotu karetki.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(30,'pt','Use este aplicativo web para remover o espaÃ§amento de texto. VocÃª pode remover espaÃ§os, tabulaÃ§Ãµes, recuos, novas linhas e retornos de carro.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(31,'ru','Ð˜ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÐ¹Ñ‚Ðµ ÑÑ‚Ð¾ Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ, Ñ‡Ñ‚Ð¾Ð±Ñ‹ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¸Ð½Ñ‚ÐµÑ€Ð²Ð°Ð» Ð¾Ñ‚ Ñ‚ÐµÐºÑÑ‚Ð°. Ð’Ñ‹ Ð¼Ð¾Ð¶ÐµÑ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹, Ñ‚Ð°Ð±ÑƒÐ»ÑÑ†Ð¸ÑŽ, Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ñ‹, Ð¿ÐµÑ€ÐµÐ²Ð¾Ð´Ð° ÑÑ‚Ñ€Ð¾ÐºÐ¸, Ð° Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‚ ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(32,'tr','metinden boÅŸluÄŸu kaldÄ±rmak iÃ§in bu web uygulamasÄ±nÄ± kullanÄ±n. Sen boÅŸluklar, sekmeler, girintiler, satÄ±rsonu ve satÄ±rbaÅŸÄ± kaldÄ±rabilir.',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(33,'zh','ä½¿ç”¨è¯¥Webåº”ç”¨ç¨‹åºä»Žæ–‡æœ¬ä¸­åˆ é™¤é—´è·ã€‚æ‚¨å¯èƒ½ä¼šåˆ é™¤ç©ºæ ¼ï¼Œåˆ¶è¡¨ç¬¦ï¼Œç¼©è¿›ï¼Œæ¢è¡Œï¼Œå›žè½¦ã€‚',0,3,'2016-08-28 12:12:02','2016-08-29 17:16:45'),(34,'de','Liste zu entfernen Abstand',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(35,'es','Eliminar una lista de espaciado De',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(36,'fr','Liste pour supprimer Espacement De',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(37,'ja','ã‹ã‚‰é–“éš”ã‚’å‰Šé™¤ã™ã‚‹ã«ã¯ã€ãƒªã‚¹ãƒˆ',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(38,'it','Elencare rimuovere spaziando dalla',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(39,'nl','Lijst te verwijderen Tussenruimte Van',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(40,'pl','Lista usunÄ…Ä‡ odstÄ™pie od',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(41,'pt','Liste remover espaÃ§amento',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(42,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ðµ Ð¾Ñ‚',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:15'),(43,'tr','GÃ¶nderen AralÄ±ÄŸÄ± Ã§Ä±karmak Liste',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:16'),(44,'zh','åˆ—è¡¨ä¸­åˆ é™¤é—´è·ç”±',0,4,'2016-08-28 12:12:02','2016-08-28 16:30:16'),(45,'de','Liste mit Abstand behandelter',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(46,'es','Lista espacia Mango',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(47,'fr','Liste avec Espacement Handled',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(48,'ja','å–æ‰±é–“éš”ã§ä¸€è¦§',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(49,'it','Lista intervallato Handled',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(50,'nl','Lijst met afstanden tussen Behandeld',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(51,'pl','Lista o rozstawie Handled',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(52,'pt','Lista com espaÃ§amento Manipulados',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(53,'ru','Ð¡Ð¿Ð¸ÑÐ¾Ðº Ñ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸ÐµÐ¼ Ð¼ÐµÐ¶Ð´Ñƒ Handled',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:53'),(54,'tr','Kulplu aralÄ±ÄŸÄ± ile Listesi',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:54'),(55,'zh','ä¸Žå¤„ç†çš„é¢é—´éš”åå•',0,5,'2016-08-28 12:12:03','2016-08-29 17:28:54'),(56,'de','Geben Sie oder kopieren und einfÃ¼gen Sie Ihren Text in das Textfeld .',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(57,'es','Escribir o copiar y pegar el texto en este cuadro de texto.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(58,'fr','Tapez ou copier-coller votre texte dans cette zone de texte.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(59,'ja','ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ãƒ†ã‚­ã‚¹ãƒˆã‚’ã‚³ãƒ”ãƒ¼ã‚¢ãƒ³ãƒ‰ãƒšãƒ¼ã‚¹ãƒˆå…¥åŠ›ã—ã¾ã™ã‹ã€‚',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(60,'it','Digitare o copiare e incollare il testo in questa casella di testo.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(61,'nl','Typ of kopieer-en-plak uw tekst in dit tekstvak.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(62,'pl','Wpisz lub skopiuj i wklej tekst w polu tekstowym.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(63,'pt','Digitar ou copiar e colar o texto nesta caixa de texto.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(64,'ru','Ð’Ð²ÐµÐ´Ð¸Ñ‚Ðµ Ð¸Ð»Ð¸ ÑÐºÐ¾Ð¿Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¸ Ð²ÑÑ‚Ð°Ð²Ð¸Ñ‚ÑŒ Ñ‚ÐµÐºÑÑ‚ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(65,'tr','Bu metin kutusuna metni yapÄ±ÅŸtÄ±rmak kopyalayÄ±p yazÄ±n veya.',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(66,'zh','é”®å…¥æˆ–å¤åˆ¶å’Œç²˜è´´æ–‡æœ¬åˆ°è¿™ä¸ªæ–‡æœ¬æ¡†ã€‚',0,6,'2016-08-28 12:12:03','2016-08-29 17:23:16'),(67,'de','Dann ist Ihre Liste mit entfernt Abstand wird in diesem Textfeld angezeigt.',0,7,'2016-08-28 12:12:03','2016-08-29 17:26:13'),(68,'es','A continuaciÃ³n, la lista con un espaciado eliminado aparecerÃ¡ en este cuadro de texto.',0,7,'2016-08-28 12:12:03','2016-08-29 17:26:13'),(69,'fr','Ensuite, votre liste avec l\'espacement retirÃ© apparaÃ®tra dans cette zone de texte.',0,7,'2016-08-28 12:12:03','2016-08-29 17:26:13'),(70,'ja','ãã®å¾Œé™¤åŽ»é–“éš”ã§ã‚ãªãŸã®ãƒªã‚¹ãƒˆã«ã¯ã€ã“ã®ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã«è¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,7,'2016-08-28 12:12:03','2016-08-29 17:26:13'),(71,'it','Poi apparirÃ  l\'elenco intervallato rimosso in questa casella di testo.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(72,'nl','Dan is uw lijst met tussenruimte verwijderd zal verschijnen in dit tekstvak.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(73,'pl','NastÄ™pnie pojawi siÄ™ lista o rozstawie usuniÄ™te w tym polu tekstowym.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(74,'pt','Em seguida, a sua lista com espaÃ§amento removido aparecerÃ¡ nessa caixa de texto.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(75,'ru','Ð¢Ð¾Ð³Ð´Ð° Ð²Ð°Ñˆ ÑÐ¿Ð¸ÑÐ¾Ðº Ñ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸ÐµÐ¼ Ð¼ÐµÐ¶Ð´Ñƒ ÑƒÐ´Ð°Ð»ÐµÐ½Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð¶Ð°Ñ‚ÑŒÑÑ Ð² ÑÑ‚Ð¾Ð¼ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¼ Ð¿Ð¾Ð»Ðµ.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(76,'tr','Sonra kaldÄ±rÄ±lmÄ±ÅŸ aralÄ±ÄŸÄ± ile liste bu metin kutusunda belirecektir.',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(77,'zh','ç„¶åŽåŽ»æŽ‰é—´è·æ‚¨çš„åˆ—è¡¨ä¼šå‡ºçŽ°åœ¨è¯¥æ–‡æœ¬æ¡†ä¸­ã€‚',0,7,'2016-08-28 12:12:04','2016-08-29 17:26:13'),(78,'de','entfernen Sie Abstand',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(79,'es','Retire espaciado',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(80,'fr','Retirer Espacement',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(81,'ja','é–“éš”ã®å‰Šé™¤',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(82,'it','rimuovere spaziatura',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(83,'nl','verwijderen Tussenruimte',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(84,'pl','UsuÅ„ odstÄ™py',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(85,'pt','Remover espaÃ§amento',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(86,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Spacing',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(87,'tr','AralÄ±ÄŸÄ± kaldÄ±r',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:14'),(88,'zh','åˆ é™¤é—´è·',0,8,'2016-08-28 12:12:04','2016-08-28 16:38:15'),(155,'de','Zuhause',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(156,'es','Casa',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(157,'fr','Accueil',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(158,'ja','ãƒ›ãƒ¼ãƒ ',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(159,'it','Casa',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(160,'nl','Huis',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(161,'pl','Dom',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(162,'pt','Casa',0,15,'2016-08-28 12:12:07','0000-00-00 00:00:00'),(163,'ru','Ð“Ð»Ð°Ð²Ð½Ð°Ñ',0,15,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(164,'tr','Ev',0,15,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(165,'zh','å®¶',0,15,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(166,'de','Etwa',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(167,'es','Acerca de',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(168,'fr','Sur',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(169,'ja','ç´„',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(170,'it','Di',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(171,'nl','Over',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(172,'pl','O',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(173,'pt','Sobre',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(174,'ru','ÐžÐºÐ¾Ð»Ð¾',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(175,'tr','hakkÄ±nda',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(176,'zh','å…³äºŽ',0,16,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(177,'de','Kontakt',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(178,'es','Contacto',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(179,'fr','Contact',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(180,'ja','æŽ¥è§¦',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(181,'it','contatto',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(182,'nl','Contact',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(183,'pl','Kontakt',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(184,'pt','Contato',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(185,'ru','ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(186,'tr','Temas',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(187,'zh','è”ç³»',0,17,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(188,'de','Weitere Informationen Ã¼ber uns',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(189,'es','MÃ¡s informaciÃ³n sobre nosotros',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(190,'fr','Plus d\'informations sur nous',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(191,'ja','ä¼šç¤¾ã®è©³ç´°æƒ…å ±',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(192,'it','Altre informazioni Chi siamo',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(193,'nl','Meer informatie over ons',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(194,'pl','WiÄ™cej informacji o nas',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(195,'pt','Mais informaÃ§Ãµes Sobre nÃ³s',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(196,'ru','Ð‘Ð¾Ð»ÑŒÑˆÐµ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ð¾ Ð½Ð°Ñ',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(197,'tr','HakkÄ±mÄ±zda Daha Fazla Bilgi',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(198,'zh','æ›´å¤šä¿¡æ¯å…³äºŽæˆ‘ä»¬',0,18,'2016-08-28 12:12:08','0000-00-00 00:00:00'),(199,'de','<p class=\"margin-0px\">Also, Sie wollten etwas Abstand zu entfernen, nicht wahr? Das ist, was Sie auf dieser Seite gebracht, ist es nicht?</p><br><p class=\"margin-0px\">Gut, ich hoffe, es half.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(200,'es','<p class=\"margin-0px\">Por lo tanto, querÃ­a suprimir cierto espacio, Â¿verdad? Eso es lo que llevÃ³ a que a esta pÃ¡gina, Â¿verdad?</p><br><p class=\"margin-0px\">Bueno, espero que ayudÃ³.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(201,'fr','<p class=\"margin-0px\">Donc, vous vouliez supprimer certains espacement, non? VoilÃ  ce qui vous Ã  cette page, est-ce pas?</p><br><p class=\"margin-0px\">Bon, je l\'espÃ¨re, il a aidÃ©.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(202,'ja','<p class=\"margin-0px\">ã ã‹ã‚‰ã€ã‚ãªãŸã¯å³ã€ã„ãã¤ã‹ã®é–“éš”ã‚’å‰Šé™¤ã—ãŸã„ã§ã™ã‹ï¼Ÿãã‚Œã¯ãã‚Œã¯ã€ã“ã®ãƒšãƒ¼ã‚¸ã«ã‚ãªãŸã«ã‚‚ãŸã‚‰ã—ãŸã‚‚ã®ã¯ãªã„ã§ã™ã­ã€‚</p><br><p class=\"margin-0px\">è‰¯ã„ã€ç§ã¯ãã‚ŒãŒåŠ©ã‘ã‚’é¡˜ã£ã¦ã„ã¾ã™ã€‚</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(203,'it','<p class=\"margin-0px\">Quindi, si voleva rimuovere alcuni spaziatura, giusto? Questo Ã¨ quello che ha portato a voi a questa pagina, non Ã¨ vero?</p><br><p class=\"margin-0px\">Bene, spero che lo ha aiutato.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(204,'nl','<p class=\"margin-0px\">Dus, je wilde om wat afstand te verwijderen, toch? Dat is wat u aangeboden op deze pagina, is het niet?</p><br><p class=\"margin-0px\">Goed, ik hoop dat het hielp.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(205,'pl','<p class=\"margin-0px\">WiÄ™c chcesz usunÄ…Ä‡ jakieÅ› odstÄ™py, prawda? To, co przedstawia PaÅ„stwu do tej strony, prawda?</p><br><p class=\"margin-0px\">Dobra, mam nadziejÄ™, Å¼e pomogÅ‚o.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(206,'pt','<p class=\"margin-0px\">EntÃ£o, vocÃª queria remover alguns espaÃ§amento, certo? Isso Ã© o que trouxe vocÃª para esta pÃ¡gina, nÃ£o Ã©?</p><br><p class=\"margin-0px\">Bom, espero que ajudou.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(207,'ru','<p class=\"margin-0px\">Ð˜Ñ‚Ð°Ðº, Ð²Ñ‹ Ñ…Ð¾Ñ‚Ð¸Ñ‚Ðµ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¸Ð½Ñ‚ÐµÑ€Ð²Ð°Ð»Ñ‹, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸? Ð­Ñ‚Ð¾ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ð¿Ñ€Ð¸Ñ…Ð¾Ð´Ð¸Ñ‚ Ðº Ð²Ð°Ð¼ Ð½Ð° ÑÑ‚Ð¾Ð¹ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ, Ð½Ðµ Ñ‚Ð°Ðº Ð»Ð¸?</p><br><p class=\"margin-0px\">Ð¥Ð¾Ñ€Ð¾ÑˆÐ¾, Ñ Ð½Ð°Ð´ÐµÑŽÑÑŒ, Ñ‡Ñ‚Ð¾ ÑÑ‚Ð¾ Ð¿Ð¾Ð¼Ð¾Ð³Ð»Ð¾.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(208,'tr','<p class=\"margin-0px\">Yani, doÄŸru, bazÄ± boÅŸluÄŸu kaldÄ±rmak istedi? Yani, bu sayfaya getirdi deÄŸil mi?</p><br><p class=\"margin-0px\">Ä°yi, ben yardÄ±mcÄ± umuyoruz.</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(209,'zh','<p class=\"margin-0px\">æ‰€ä»¥ï¼Œä½ æƒ³åˆ é™¤ä¸€äº›é—´éš”ï¼Œå¯¹ä¸å¯¹ï¼Ÿè¿™å°±æ˜¯å¸¦ç»™ä½ è¿™ä¸ªé¡µé¢ï¼Œä¸æ˜¯å—ï¼Ÿ</p><br><p class=\"margin-0px\">å¥½ï¼Œæˆ‘å¸Œæœ›å®ƒå¸®åŠ©ã€‚</p>',0,19,'2016-08-28 12:12:09','2016-08-29 17:03:03'),(210,'de','Ich entfernte etwas Abstand heute!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(211,'es','He quitado cierto espacio hoy!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(212,'fr','J\'ai enlevÃ© une certaine distance aujourd\'hui!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(213,'ja','ä»Šæ—¥ã¯ã„ãã¤ã‹ã®ã‚¹ãƒšãƒ¼ã‚¹ã‚’å‰Šé™¤ã—ã¾ã—ãŸï¼',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(214,'it','Ho rimosso alcuni spaziatura oggi!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(215,'nl','Ik verwijderde sommige tussenruimte vandaag!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(216,'pl','UsunÄ…Å‚em dzisiaj pewne odstÄ™py!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(217,'pt','Tirei algumas espaÃ§amento hoje!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(218,'ru','Ð¯ ÑƒÐ´Ð°Ð»Ð¸Ð» Ð½ÐµÐºÐ¾Ñ‚Ð¾Ñ€Ð¾Ðµ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑÐµÐ³Ð¾Ð´Ð½Ñ!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(219,'tr','BugÃ¼n bazÄ± boÅŸluk kaldÄ±rÄ±ldÄ±!',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(220,'zh','æˆ‘ä»Šå¤©åˆ é™¤äº†ä¸€äº›é—´è·ï¼',0,20,'2016-08-28 12:12:09','2016-08-29 17:13:29'),(221,'de','Entfernen Ãœber Abstand: Entfernen Spaces und AbstÃ¤nde aus dem Text',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(222,'es','Sobre Retire Espaciado: Espacios ExtracciÃ³n e espaciado de su texto',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(223,'fr','A propos Retirer Espacement: Spaces Retrait et espacement de votre texte',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(224,'ja','ã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰ã®å‰Šé™¤ã‚¹ãƒšãƒ¼ã‚¹ã¨é–“éš”ï¼šç´„é–“éš”ã‚’å‰Šé™¤ã—ã¾ã™',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(225,'it','Circa Rimuovere spaziatura: la rimozione degli spazi e la spaziatura dal testo',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(226,'nl','Over Verwijder Afstand: Het verwijderen van Spaces en de afstand van uw tekst',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(227,'pl','O UsuÅ„ rozstaw usuniÄ™cie spacji i rozstawienie z tekstu',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(228,'pt','Sobre Remover EspaÃ§amento: EspaÃ§os RemoÃ§Ã£o e espaÃ§amento do texto',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(229,'ru','Ðž: Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð˜Ð½Ñ‚ÐµÑ€Ð²Ð°Ð» ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ð¾Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,21,'2016-08-28 12:12:09','2016-08-29 16:58:09'),(230,'tr','Sizin Metin kaldÄ±rÄ±lÄ±yor Spaces ve AralÄ±ÄŸÄ±: HakkÄ±nda AralÄ±ÄŸÄ± KaldÄ±r',0,21,'2016-08-28 12:12:10','2016-08-29 16:58:09'),(231,'zh','ä»Žä½ çš„æ–‡å­—åŽ»æŽ‰ç©ºæ ¼å’Œé—´è·ï¼šå…³äºŽé—´è·åˆ é™¤',0,21,'2016-08-28 12:12:10','2016-08-29 16:58:09'),(232,'de','Kontakt entfernen Abstand: Entfernen Spaces und AbstÃ¤nde aus dem Text',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(233,'es','PÃ³ngase en contacto Eliminar Espaciado: Espacios ExtracciÃ³n e espaciado de su texto',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(234,'fr','Contact, enlever Espacement: Spaces Retrait et espacement de votre texte',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(235,'ja','ã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰ã®å‰Šé™¤ã‚¹ãƒšãƒ¼ã‚¹ã¨é–“éš”ï¼šé–“éš”ã‚’å‰Šé™¤ã™ã‚‹é€£çµ¡å…ˆ',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(236,'it','Contatto rimuovere spaziatura: la rimozione degli spazi e la spaziatura dal testo',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(237,'nl','Neem Verwijder Afstand: Het verwijderen van Spaces en de afstand van uw tekst',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(238,'pl','Kontakt UsuÅ„ rozstaw usuniÄ™cie spacji i rozstawienie z tekstu',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(239,'pt','Contato Retirar EspaÃ§amento: EspaÃ§os RemoÃ§Ã£o e espaÃ§amento do texto',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(240,'ru','ÐšÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð½Ð°Ñ Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ: Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð˜Ð½Ñ‚ÐµÑ€Ð²Ð°Ð» ÑƒÐ´Ð°Ð»ÐµÐ½Ð¸Ñ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ð¾Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(241,'tr','Sizin Metin kaldÄ±rÄ±lÄ±yor Spaces ve AralÄ±ÄŸÄ±: AralÄ±ÄŸÄ± KaldÄ±r Ä°letiÅŸim',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(242,'zh','ä»Žä½ çš„æ–‡å­—åŽ»æŽ‰ç©ºæ ¼å’Œé—´è·ï¼šåˆ é™¤è”ç³»äººé—´è·',0,22,'2016-08-28 12:12:10','2016-08-29 17:05:59'),(243,'de','Kontaktiere uns',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(244,'es','ContÃ¡ctenos',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(245,'fr','Contactez nous',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(246,'ja','ãŠå•ã„åˆã‚ã›',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(247,'it','Contattaci',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(248,'nl','Neem contact met ons op',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(249,'pl','Skontaktuj siÄ™ z nami',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(250,'pt','Entre Em Contato Conosco',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(251,'ru','Ð¡Ð²ÑÐ¶Ð¸Ñ‚ÐµÑÑŒ Ñ Ð½Ð°Ð¼Ð¸',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(252,'tr','Bizimle iletiÅŸime geÃ§in',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(253,'zh','è”ç³»æˆ‘ä»¬',0,23,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(254,'de','Site Creator',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(255,'es','Creador del sitio',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(256,'fr','site Creator',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(257,'ja','ã‚µã‚¤ãƒˆä½œæˆè€…',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(258,'it','Creatore del sito',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(259,'nl','Site Creator',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(260,'pl','TwÃ³rca strony',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(261,'pt','Criador do site',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(262,'ru','Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÐµÐ»ÑŒ ÑÐ°Ð¹Ñ‚Ð°',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(263,'tr','Site Creator',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(264,'zh','ç½‘ç«™çš„åˆ›å»ºè€…',0,24,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(265,'de','Webseite Erstellt am',0,25,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(266,'es','Sitio desarrollado en',0,25,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(267,'fr','Site CrÃ©Ã© le',0,25,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(268,'ja','ã‚µã‚¤ãƒˆã«ã¯ã€ä¸Šã§ä½œæˆã—ã¾ã™',0,25,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(269,'it','Sito Creato il',0,25,'2016-08-28 12:12:10','0000-00-00 00:00:00'),(270,'nl','Site Gemaakt op',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(271,'pl','Strona stworzona dniu',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(272,'pt','Site criado em',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(273,'ru','Ð¡Ð°Ð¹Ñ‚ ÑÐ¾Ð·Ð´Ð°Ð½ Ð½Ð°',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(274,'tr','Site Ã¼zerinde dÃ¼zenlendi',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(275,'zh','ç½‘ç«™åˆ›å»ºæ—¶é—´',0,25,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(276,'de','Kontakt Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(277,'es','Contacto Creador',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(278,'fr','Contactez Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(279,'ja','é€£çµ¡ã‚¯ãƒªã‚¨ãƒ¼ã‚¿ãƒ¼',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(280,'it','Contatto Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(281,'nl','Contact Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(282,'pl','Kontakt Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(283,'pt','Contact Creator',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(284,'ru','ÐšÐ°Ðº ÑÐ²ÑÐ·Ð°Ñ‚ÑŒÑÑ Ñ Ð¢Ð²Ð¾Ñ€Ñ†Ð¾Ð¼',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(285,'tr','Ä°letiÅŸim OluÅŸturan',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(286,'zh','è”ç³»é€ ç‰©ä¸»',0,26,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(287,'de','Datei Roboter fÃ¼r Remove Abstand: Entfernen Spaces und AbstÃ¤nde aus dem Text',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(288,'es','Robots archivo para Quitar Espaciado: Eliminar espacios y el espaciamiento de su texto',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(289,'fr','Robots fichier Pour Remove Espacement: Spaces Retrait et espacement de votre texte',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(290,'ja','ãƒ­ãƒœãƒƒãƒˆã¯å‰Šé™¤é–“éš”ã®ãƒ•ã‚¡ã‚¤ãƒ«ï¼šå‰Šé™¤ã‚¹ãƒšãƒ¼ã‚¹ã¨é–“éš”ã‚’ã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(291,'it','Robot file per Rimuovi spaziatura: Rimozione di spazi e spaziatura dal testo',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(292,'nl','Robots-bestand Voor Verwijder Tussenruimte: Het verwijderen van Spaces en de afstand van uw tekst',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(293,'pl','Roboty plikÃ³w dla UsuÅ„ odstÄ™p: usuniÄ™cie spacji i rozstawienie z tekstu',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(294,'pt','Robots arquivo Para Remove EspaÃ§amento: removendo espaÃ§os e espaÃ§amento do texto',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(295,'ru','Ð Ð¾Ð±Ð¾Ñ‚Ñ‹ Ñ„Ð°Ð¹Ð» Ð´Ð»Ñ Remove Spacing: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÑÑ‚Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(296,'tr','Robotlar KaldÄ±r AralÄ±k iÃ§in Dosya: Ã‡Ä±karma Spaces ve AralÄ±ÄŸÄ± Sizin Text',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(297,'zh','æœºå™¨äººæ–‡ä»¶åˆ é™¤é—´è·ï¼šåŽ»æŽ‰ç©ºæ ¼å’Œé—´è·ä»Žä½ çš„æ–‡å­—',0,27,'2016-08-28 12:12:11','2016-08-29 17:34:01'),(298,'de','Dies ist die fÃ¼r Menschen lesbare Version unserer robots.txt-Datei. Die <a href=\"/robots.txt\">Robots.txt File</a> ist, was tatsÃ¤chlich Suchmaschinen kriechen. Eine alternative <a href=\"/robots.xml\">Robots.xml File</a> hat auch zur VerfÃ¼gung gestellt, wenn Sie etwas mehr maschinenlesbar mÃ¼ssen. Die XML-Version hat auch eine <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(299,'es','Esta es la versiÃ³n legible por humanos de nuestro archivo robots.txt. El <a href=\"/robots.txt\">Robots.txt File</a> es lo que los motores de bÃºsqueda reales se arrastran. Una alternativa <a href=\"/robots.xml\">Robots.xml File</a> Se ha previsto tambiÃ©n que si necesitas algo mÃ¡s legible por mÃ¡quina. La versiÃ³n XML tambiÃ©n tiene una <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(300,'fr','Ceci est la version lisible par l\'homme de notre fichier robots.txt. Le <a href=\"/robots.txt\">Robots.txt File</a> est ce que les moteurs de recherche rÃ©els vont parcourir. Un supplÃ©ant <a href=\"/robots.xml\">Robots.xml File</a> a Ã©galement Ã©tÃ© fourni si vous avez besoin quelque chose de plus lisible par machine. La version XML a Ã©galement un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(301,'ja','ã“ã‚ŒãŒç§ãŸã¡ã®robots.txtãƒ•ã‚¡ã‚¤ãƒ«ã®äººé–“ãŒèª­ã‚ã‚‹ãƒãƒ¼ã‚¸ãƒ§ãƒ³ã§ã™ã€‚ <a href=\"/robots.txt\">Robots.txt File</a>ã¯ã€å®Ÿéš›ã®æ¤œç´¢ã‚¨ãƒ³ã‚¸ãƒ³ãŒã‚¯ãƒ­ãƒ¼ãƒ«ã•ã‚Œã¾ã™ã‚‚ã®ã§ã™ã€‚ã‚ãªãŸãŒä½•ã‹ã‚’è¤‡æ•°ã®æ©Ÿæ¢°å¯èª­ãŒå¿…è¦ãªå ´åˆã®ä»£æ›¿ã¯<a href=\"/robots.xml\">Robots.xml File</a>ã‚‚æä¾›ã•ã‚Œã¦ã„ã¾ã™ã€‚ XMLãƒãƒ¼ã‚¸ãƒ§ãƒ³ã‚‚<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã‚’æŒã£ã¦ã„ã¾ã™ã€‚',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(302,'it','Questa Ã¨ la versione leggibile del nostro file robots.txt. Il <a href=\"/robots.txt\">Robots.txt File</a> Ã¨ quello che effettivamente i motori di ricerca esegue la scansione. Un supplente <a href=\"/robots.xml\">Robots.xml File</a> Ã¨ stato anche fornito se avete bisogno di qualcosa di piÃ¹ leggibile dalla macchina. La versione XML ha anche un <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(303,'nl','Dit is de leesbare versie van onze robots.txt bestand. De <a href=\"/robots.txt\">Robots.txt File</a> is wat de werkelijke zoekmachines zullen kruipen. Een alternatieve <a href=\"/robots.xml\">Robots.xml File</a> is ook voorzien als je iets meer machine leesbare nodig. De XML-versie heeft ook een <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(304,'pl','Ta wersja jest czytelny dla czÅ‚owieka naszego pliku robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Jest to, co rzeczywiste wyszukiwarek bÄ™dzie indeksowaÄ‡. Alternatywny <a href=\"/robots.xml\">Robots.xml File</a> zostaÅ‚y przekazane, jeÅ›li potrzebujesz czegoÅ› wiÄ™cej do odczytu maszynowego. Wersja XML ma rÃ³wnieÅ¼ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:11','0000-00-00 00:00:00'),(305,'pt','Esta Ã© a versÃ£o legÃ­vel do nosso arquivo robots.txt. O <a href=\"/robots.txt\">Robots.txt File</a> Ã© o que os motores de busca reais irÃ¡ rastrear. Uma alternativa <a href=\"/robots.xml\">Robots.xml File</a> tambÃ©m foi fornecido se vocÃª precisa de algo mais legÃ­vel por mÃ¡quina. A versÃ£o XML tambÃ©m tem um <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(306,'ru','Ð­Ñ‚Ð¾ Ñ‡ÐµÐ»Ð¾Ð²ÐµÐº-ÑÑ‡Ð¸Ñ‚Ñ‹Ð²Ð°ÐµÐ¼Ñ‹Ð¹ Ð²ÐµÑ€ÑÐ¸Ñ Ð½Ð°ÑˆÐµÐ³Ð¾ Ñ„Ð°Ð¹Ð»Ð° robots.txt. <a href=\"/robots.txt\">Robots.txt File</a> Ð¯Ð²Ð»ÑÐµÑ‚ÑÑ Ñ‚Ð¾, Ñ‡Ñ‚Ð¾ Ñ„Ð°ÐºÑ‚Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ðµ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð±ÑƒÐ´ÑƒÑ‚ ÑÐºÐ°Ð½Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ. ÐÐ»ÑŒÑ‚ÐµÑ€Ð½Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¼ <a href=\"/robots.xml\">Robots.xml File</a> Ñ‚Ð°ÐºÐ¶Ðµ Ð¿Ñ€Ð¸ ÑƒÑÐ»Ð¾Ð²Ð¸Ð¸, ÐµÑÐ»Ð¸ Ð²Ð°Ð¼ Ð½ÑƒÐ¶Ð½Ð¾ Ñ‡Ñ‚Ð¾-Ñ‚Ð¾ Ð±Ð¾Ð»ÐµÐµ Ð¼Ð°ÑˆÐ¸Ð½Ð¾Ñ‡Ð¸Ñ‚Ð°ÐµÐ¼ÑƒÑŽ. Ð’ÐµÑ€ÑÐ¸Ñ XML Ñ‚Ð°ÐºÐ¶Ðµ Ð¸Ð¼ÐµÐµÑ‚ <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>.',0,28,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(307,'tr','Bu bizim robots.txt dosyanÄ±zÄ±n insan tarafÄ±ndan okunabilir sÃ¼rÃ¼mÃ¼dÃ¼r. <a href=\"/robots.txt\">Robots.txt File</a> GerÃ§ek arama motorlarÄ± tarama budur. Bir ÅŸey daha makine tarafÄ±ndan okunabilir gerekirse alternatif <a href=\"/robots.xml\">Robots.xml File</a> da saÄŸlanmÄ±ÅŸtÄ±r. XML versiyonu da bir <a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a> vardÄ±r.',0,28,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(308,'zh','è¿™æ˜¯æˆ‘ä»¬çš„robots.txtæ–‡ä»¶çš„äººç±»å¯è¯»çš„ç‰ˆæœ¬ã€‚åœ¨<a href=\"/robots.txt\">Robots.txt File</a>æ˜¯å®žé™…çš„æœç´¢å¼•æ“Žå°†æŠ“å–ã€‚å¦ä¸€ç§<a href=\"/robots.xml\">Robots.xml File</a>ï¼Œå¦‚æžœä½ éœ€è¦æ›´å¤šçš„ä¸œè¥¿æœºå™¨å¯è¯»ä¹Ÿæœ‰è§„å®šã€‚ XMLç‰ˆæœ¬ä¹Ÿæœ‰<a href=\"/robots.xml?humanreadable=1\">Robots.xml Human-Readable File</a>ã€‚',0,28,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(309,'de','Sitemap fÃ¼r RemoveSpacing.com: RÃ¤ume und AbstÃ¤nde aus dem Text entfernen',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(310,'es','Mapa del sitio de RemoveSpacing.com: Eliminar espacios y el espaciamiento de su texto',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(311,'fr','Plan du site pour RemoveSpacing.com: Suppression des espaces et espacement de votre texte',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(312,'ja','RemoveSpacing.comã®ãŸã‚ã®ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ï¼šã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰ã‚¹ãƒšãƒ¼ã‚¹ã¨é–“éš”ã‚’å‰Šé™¤ã—ã¾ã™',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(313,'it','Mappa del sito per RemoveSpacing.com: Rimozione di spazi e spaziatura dal testo',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(314,'nl','Sitemap voor RemoveSpacing.com: Het verwijderen van Spaces en de afstand van uw tekst',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(315,'pl','Mapa dla RemoveSpacing.com: Usuwanie spacji i odstÄ™pÃ³w z tekstu',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(316,'pt','Sitemap para RemoveSpacing.com: Remover espaÃ§os e espaÃ§amento do texto',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(317,'ru','ÐšÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð° Ð´Ð»Ñ RemoveSpacing.com: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÑÑ‚Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(318,'tr','RemoveSpacing.com iÃ§in Site HaritasÄ±: Sizin Text Spaces ve AralÄ±ÄŸÄ± Ã‡Ä±karma',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(319,'zh','ç½‘ç«™åœ°å›¾ä¸ºRemoveSpacing.comï¼šå–ä¸‹æ‚¨çš„æ–‡å­—ç©ºé—´å’Œé—´è·',0,29,'2016-08-28 12:12:12','2016-08-29 17:39:42'),(320,'de','Dies ist die Site-Map. Sie finden hier eine Liste von jeder Seite auf dieser Website zu finden. Die <a href=\"/sitemap.xml\">XML Sitemap</a> und ein <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sind ebenfalls verfÃ¼gbar, sowie ein <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(321,'es','Este es el mapa del sitio. Usted encontrarÃ¡ una lista de todas las pÃ¡ginas de este sitio aquÃ­. El <a href=\"/sitemap.xml\">XML Sitemap</a> y un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> tambiÃ©n estÃ¡n disponibles, asÃ­ como un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(322,'fr','Ceci est le plan du site. Vous trouverez une liste de chaque page sur ce site ici. Le <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> et sont Ã©galement disponibles, ainsi qu\'un <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(323,'ja','ã“ã‚Œã¯ã€ã‚µã‚¤ãƒˆãƒžãƒƒãƒ—ã§ã™ã€‚ã‚ãªãŸã¯ã“ã“ã«ã“ã®ã‚µã‚¤ãƒˆä¸Šã®ã™ã¹ã¦ã®ãƒšãƒ¼ã‚¸ã®ä¸€è¦§ãŒã‚ã‚Šã¾ã™ã€‚ <a href=\"/sitemap.xml\">XML Sitemap</a>ã¨<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ã‚‚åˆ©ç”¨ã§ãã‚‹ã ã‘ã§ãªãã€<a href=\"/sitemap.txt\">TXT Sitemap</a>ã§ã™ã€‚',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(324,'it','Questa Ã¨ la mappa del sito. Troverete un elenco di ogni pagina di questo sito qui. Il <a href=\"/sitemap.xml\">XML Sitemap</a> e un <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> sono disponibili, cosÃ¬ come un <a href=\"/sitemap.txt\">TXT Sitemap</a> anche.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(325,'nl','Dit is de site map. U ziet een lijst van alle pagina\'s op deze site hier. De <a href=\"/sitemap.xml\">XML Sitemap</a> en een <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> zijn ook beschikbaar, evenals een <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(326,'pl','Jest to mapa serwisu. Znajdziesz tu listÄ™ wszystkich stron na tej stronie tutaj. <a href=\"/sitemap.xml\">XML Sitemap</a> I <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> dostÄ™pne, jak rÃ³wnieÅ¼ <a href=\"/sitemap.txt\">TXT Sitemap</a> rÃ³wnieÅ¼.',0,30,'2016-08-28 12:12:12','0000-00-00 00:00:00'),(327,'pt','Este Ã© o mapa do site. VocÃª vai encontrar uma lista de todas as pÃ¡ginas neste site aqui. O <a href=\"/sitemap.xml\">XML Sitemap</a> <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> e tambÃ©m estÃ£o disponÃ­veis, assim como um <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(328,'ru','Ð­Ñ‚Ð¾ ÐºÐ°Ñ€Ñ‚Ð° ÑÐ°Ð¹Ñ‚Ð°. Ð’Ñ‹ Ð½Ð°Ð¹Ð´ÐµÑ‚Ðµ ÑÐ¿Ð¸ÑÐ¾Ðº Ð²ÑÐµÑ… ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ† Ð½Ð° ÑÑ‚Ð¾Ð¼ ÑÐ°Ð¹Ñ‚Ðµ Ð·Ð´ÐµÑÑŒ. <a href=\"/sitemap.xml\">XML Sitemap</a> Ð˜ <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>, Ñ‚Ð°ÐºÐ¶Ðµ Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹, Ð° Ñ‚Ð°ÐºÐ¶Ðµ <a href=\"/sitemap.txt\">TXT Sitemap</a>.',0,30,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(329,'tr','Bu site haritasÄ±dÄ±r. Burada bu sitede her sayfanÄ±n bir listesini bulacaksÄ±nÄ±z. <a href=\"/sitemap.xml\">XML Sitemap</a> Ve <a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a> da mevcuttur, hem de bir <a href=\"/sitemap.txt\">TXT Sitemap</a> vardÄ±r.',0,30,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(330,'zh','è¿™æ˜¯åœ¨ç«™ç‚¹åœ°å›¾ã€‚ä½ ä¼šå‘çŽ°æ¯ä¸€é¡µçš„åˆ—è¡¨ï¼Œåœ¨è¿™ä¸ªç½‘ç«™åœ¨è¿™é‡Œã€‚åœ¨<a href=\"/sitemap.xml\">XML Sitemap</a>å’Œ<a href=\"/sitemap.xml?humanreadable=1\">Human-Readable XML Sitemap</a>ä¹Ÿéƒ½å…·å¤‡ï¼Œè¿˜æœ‰ä¸€ä¸ª<a href=\"/sitemap.txt\">TXT Sitemap</a>ã€‚',0,30,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(331,'de','entfernen Raum, Leerzeichen entfernen, entfernen, AbstÃ¤nde, Formatierungen, Textformatierung , Dokumentformatierung , Einbuchtungen, Tabulatoren , WagenrÃ¼cklauf , ZeilenumbrÃ¼che',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(332,'es','quitar espacio, quitar espacios, eliminar, el espaciamiento, el formato, el formato de texto, formato de documentos, sangrÃ­as, tabuladores, retornos de carro, saltos de lÃ­nea',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(333,'fr','supprimer l\'espace, supprimer les espaces, supprimer l\'espacement, le formatage, le formatage du texte, le formatage de documents, des indentations, des onglets, des retours chariot, sauts de ligne',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(334,'ja','ã€é–“éš”ã€æ›¸å¼è¨­å®šã€ãƒ†ã‚­ã‚¹ãƒˆã®æ›¸å¼è¨­å®šã€æ–‡æ›¸ã®æ›¸å¼è¨­å®šã€ãã¼ã¿ã€ã‚¿ãƒ–ã€æ”¹è¡Œã€æ”¹è¡Œã‚’ã€ã‚¹ãƒšãƒ¼ã‚¹ã‚’å‰Šé™¤ã—ã€ã‚¹ãƒšãƒ¼ã‚¹ã‚’å‰Šé™¤ã—ã€å‰Šé™¤',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(335,'it','rimuovere lo spazio, rimuovere gli spazi, rimuovere, la spaziatura, la formattazione, la formattazione del testo, la formattazione del documento, rientranze, tabulazioni, ritorni a capo, a capo',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(336,'nl','verwijderen ruimte, verwijder de spaties, te verwijderen, tussenruimte, opmaak, tekstopmaak, documentopmaak, inkepingen, tabs, carriage returns, newlines',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(337,'pl','usuÅ„ spacjÄ™, usuÅ„ spacje, usunÄ…Ä‡ odstÄ™p, formatowanie, formatowanie tekstu, formatowanie dokumentu, wgniecenia, wystÄ™py, powrotu karetki, nowe linie',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(338,'pt','remover o espaÃ§o, remover espaÃ§os, remover, espaÃ§amento, formataÃ§Ã£o, formataÃ§Ã£o de texto, formataÃ§Ã£o de documentos, recortes, guias, retornos de carro, novas linhas',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(339,'ru','ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÑÑ‚Ð²Ð¾, ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹, ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ, Ð¸Ð½Ñ‚ÐµÑ€Ð²Ð°Ð», Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ, Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ñ‚ÐµÐºÑÑ‚Ð°, Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð´Ð¾ÐºÑƒÐ¼ÐµÐ½Ñ‚Ð°, Ð²Ð¼ÑÑ‚Ð¸Ð½Ñ‹, Ð²ÐºÐ»Ð°Ð´ÐºÐ¸, Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‚ ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸, Ð¿ÐµÑ€ÐµÐ²Ð¾Ð´Ñ‹ ÑÑ‚Ñ€Ð¾Ðº',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(340,'tr',', BoÅŸluk, biÃ§imlendirme, metin biÃ§imlendirme, belge biÃ§imlendirme, girintileri, sekmeler, satÄ±r baÅŸlarÄ± satÄ±rsonu, boÅŸluÄŸu kaldÄ±rmak boÅŸluklarÄ± kaldÄ±rÄ±n, kaldÄ±rÄ±n',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(341,'zh','åˆ é™¤ç©ºé—´ï¼Œåˆ é™¤ç©ºæ ¼ï¼Œåˆ é™¤ï¼Œé—´è·ï¼Œæ ¼å¼ï¼Œæ–‡æœ¬æ ¼å¼ï¼Œæ–‡æ¡£æ ¼å¼ï¼Œç¼©è¿›ï¼Œåˆ¶è¡¨ç¬¦ï¼Œå›žè½¦ç¬¦ï¼Œæ¢è¡Œç¬¦',0,31,'2016-08-28 12:12:13','2016-08-29 17:19:36'),(342,'de','Sortierung Anwendung, Web Application, Word-Anwendung',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(343,'es','AplicaciÃ³n de clasificaciÃ³n, aplicaciÃ³n Web, Word AplicaciÃ³n',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(344,'fr','Demande de tri, application Web, Word application',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(345,'ja','ã‚½ãƒ¼ãƒˆã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Webã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³ã€Wordã®ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(346,'it','Ordinamento Application, applicazioni Web, Word Application',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(347,'nl','Sortering Application, Web Application, Word Application',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(348,'pl','Sortowanie aplikacji, aplikacji internetowych, aplikacji SÅ‚owo',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(349,'pt','Classificando Aplicativo, Web, aplicativo Palavra',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(350,'ru','Ð¡Ð¾Ñ€Ñ‚Ð¸Ñ€Ð¾Ð²ÐºÐ° Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Ð²ÐµÐ±-Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹, Word Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ð¹',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(351,'tr','SÄ±ralama Uygulama, Web Uygulama, Word uygulama',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(352,'zh','æŽ’åºåº”ç”¨ç¨‹åºï¼ŒWebåº”ç”¨ç¨‹åºï¼ŒWordåº”ç”¨ç¨‹åº',0,32,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(353,'de','Internetanwendung',0,33,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(354,'es','AplicaciÃ³n web',0,33,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(355,'fr','Application Web',0,33,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(356,'ja','ã‚¦ã‚§ãƒ–ã‚¢ãƒ—ãƒªã‚±ãƒ¼ã‚·ãƒ§ãƒ³',0,33,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(357,'it','Applicazione web',0,33,'2016-08-28 12:12:13','0000-00-00 00:00:00'),(358,'nl','Web applicatie',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(359,'pl','Aplikacja internetowa',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(360,'pt','AplicaÃ§Ã£o web',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(361,'ru','Ð’ÐµÐ± Ð¿Ñ€Ð¸Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(362,'tr','Web UygulamasÄ±',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(363,'zh','Webåº”ç”¨ç¨‹åº',0,33,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(364,'AboutChangeFreq','yearly',0,34,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(365,'AboutLastMod','2016-06-04',0,34,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(366,'AboutPriority','0.5',0,34,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(367,'ContactChangeFreq','yearly',0,35,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(368,'ContactLastMod','2016-08-20',0,35,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(369,'ContactPriority','0.2',0,35,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(370,'HomeChangeFreq','weekly',0,36,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(371,'HomeLastMod','2016-08-19',0,36,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(372,'HomePriority','1.0',0,36,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(373,'LanguagesFreq','yearly',0,37,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(374,'LanguagesLastMod','2016-08-27',0,37,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(375,'LanguagesPriority','0.1',0,37,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(376,'de','Und',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(377,'es','Y',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(378,'fr','Et',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(379,'ja','ãã—ã¦',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(380,'it','E',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(381,'nl','En',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(382,'pl','I',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(383,'pt','E',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(384,'ru','Ð Ñ‚Ð°ÐºÐ¶Ðµ',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(385,'tr','Ve',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(386,'zh','å’Œ',0,38,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(387,'de','anderes Land',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(388,'es','otro paÃ­s',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(389,'fr','autre pays',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(390,'ja','ä»–ã®å›½',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(391,'it','altro paese',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(392,'nl','ander land',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(393,'pl','inne paÅ„stwo',0,39,'2016-08-28 12:12:14','0000-00-00 00:00:00'),(394,'pt','outro paÃ­s',0,39,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(395,'ru','Ð´Ñ€ÑƒÐ³Ð°Ñ ÑÑ‚Ñ€Ð°Ð½Ð°',0,39,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(396,'tr','diÄŸer Ã¼lke',0,39,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(397,'zh','å…¶ä»–å›½å®¶',0,39,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(398,'de','andere LÃ¤nder',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(399,'es','otros paÃ­ses',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(400,'fr','autres pays',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(401,'ja','ä»–ã®å›½ã€…',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(402,'it','altri paesi',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(403,'nl','andere landen',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(404,'pl','inne kraje',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(405,'pt','outros paÃ­ses',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(406,'ru','Ð´Ñ€ÑƒÐ³Ð¸Ðµ ÑÑ‚Ñ€Ð°Ð½Ñ‹',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(407,'tr','diÄŸer Ã¼lkeler',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(408,'zh','å…¶ä»–å›½å®¶',0,40,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(409,'de','Sprache wÃ¤hlen FÃ¼r Remove Abstand: Entfernen Spaces und AbstÃ¤nde aus dem Text',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(410,'es','Selecciona Idioma de Remove Espaciado: Eliminar espacios y el espaciamiento de su texto',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(411,'fr','SÃ©lectionnez la langue Pour Remove Espacement: Spaces Retrait et espacement de votre texte',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(412,'ja','å‰Šé™¤é–“éš”ã®è¨€èªžã‚’é¸æŠžã—ã¦ãã ã•ã„ï¼šã‚ãªãŸã®ãƒ†ã‚­ã‚¹ãƒˆã‹ã‚‰å‰Šé™¤ã™ã‚‹ã‚¹ãƒšãƒ¼ã‚¹ã¨ã®é–“éš”ã‚’',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(413,'it','Selezionare la lingua per Rimuovi spaziatura: Rimozione di spazi e spaziatura dal testo',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(414,'nl','Selecteer Taal Voor verwijderen Tussenruimte: Het verwijderen van Spaces en de afstand van uw tekst',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(415,'pl','Wybierz jÄ™zyk UsuÅ„ odstÄ™p: usuniÄ™cie spacji i rozstawienie z tekstu',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(416,'pt','Selecione o idioma Para Remove EspaÃ§amento: removendo espaÃ§os e espaÃ§amento do texto',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(417,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº Ð”Ð»Ñ Remove Spacing: Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÑÑ‚Ð² Ð¸ Ñ€Ð°ÑÑÑ‚Ð¾ÑÐ½Ð¸Ñ Ð¼ÐµÐ¶Ð´Ñƒ Ð½Ð¸Ð¼Ð¸ Ð¸Ð· Ñ‚ÐµÐºÑÑ‚Ð°',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(418,'tr','KaldÄ±r AralÄ±k iÃ§in Dil SeÃ§iniz: Sizin Metin kaldÄ±rÄ±lÄ±yor Spaces ve AralÄ±ÄŸÄ±',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(419,'zh','é€‰æ‹©è¯­è¨€å¯¹äºŽåˆ é™¤é—´è·ï¼šä»Žä½ çš„æ–‡å­—åŽ»æŽ‰ç©ºæ ¼å’Œé—´è·',0,41,'2016-08-28 12:12:15','2016-08-29 17:09:13'),(420,'de','Sprachen',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(421,'es','idiomas',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(422,'fr','Langues',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(423,'ja','è¨€èªž',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(424,'it','Le lingue',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(425,'nl','talen',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(426,'pl','JÄ™zyki',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(427,'pt','idiomas',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(428,'ru','Ð¯Ð·Ñ‹ÐºÐ¸',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(429,'tr','Diller',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(430,'zh','è¯­è¨€',0,42,'2016-08-28 12:12:15','0000-00-00 00:00:00'),(431,'de','Leerzeichen entfernen',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(432,'es','quitar los espacios',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(433,'fr','Supprimer les espaces',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(434,'ja','ã‚¹ãƒšãƒ¼ã‚¹ã‚’å‰Šé™¤ã—ã¾ã™',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(435,'it','rimuovere gli spazi',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(436,'nl','Verwijder Spaces',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(437,'pl','usuÅ„ spacje',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(438,'pt','Remova os espaÃ§os',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(439,'ru','Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ð¾Ð²',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(440,'tr','Spaces KaldÄ±r',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(441,'zh','åˆ é™¤ç©ºæ ¼',0,43,'2016-08-28 17:25:15','0000-00-00 00:00:00'),(442,'de','Dadurch werden alle RÃ¤ume (\" \") zu entfernen, die in der ersten Textbereich erscheinen.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(443,'es','Esto eliminarÃ¡ todos los espacios (\" \") que aparecen en la primera Ã¡rea de texto.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(444,'fr','Cela permettra d\'Ã©liminer tous les espaces (\" \") qui apparaissent dans la premiÃ¨re zone de texte.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(445,'ja','ã“ã‚Œã¯ã€æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã™ã¹ã¦ã®ã‚¹ãƒšãƒ¼ã‚¹ï¼ˆ\" \"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(446,'it','Questo rimuoverÃ  tutti gli spazi (\" \") che appaiono nella prima area di testo.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(447,'nl','Hierdoor worden alle ruimten (\" \") dat in de eerste tekstgedeelte verschijnen te verwijderen.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(448,'pl','Spowoduje to usuniÄ™cie wszystkich spacji (\" \"), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(449,'pt','Isto irÃ¡ remover todos os espaÃ§os (\" \") que aparecem na primeira Ã¡rea de texto.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(450,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ (\" \"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(451,'tr','Bu ilk metin alanÄ±nda gÃ¶rÃ¼nen tÃ¼m alanlarda (\" \") kaldÄ±racaktÄ±r.',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(452,'zh','è¿™å°†åˆ é™¤å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸæ‰€æœ‰çš„ç©ºæ ¼ï¼ˆâ€œ â€ï¼‰ã€‚',0,44,'2016-08-28 17:28:00','0000-00-00 00:00:00'),(453,'de','Entfernen Sie Tabs / EinzÃ¼ge',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(454,'es','Retire aquÃ­ / sangrÃ­as',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(455,'fr','Retirer Tabs / Retraits',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(456,'ja','ã‚¿ãƒ–/ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆã‚’å‰Šé™¤ã—ã¾ã™',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(457,'it','Rimuovere Tabs / Rientri',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(458,'nl','Verwijder Tabs / Indents',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(459,'pl','UsuÅ„ Tabs / wciÄ™Ä‡',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(460,'pt','Remover Tabs / Recuos',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(461,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð’ÐºÐ»Ð°Ð´ÐºÐ¸ / Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ð¾Ð²',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(462,'tr','Sekmeler / Girintiler KaldÄ±r',0,45,'2016-08-28 17:30:17','0000-00-00 00:00:00'),(463,'zh','åˆ é™¤é€‰é¡¹å¡/ç¼©è¿›',0,45,'2016-08-28 17:30:18','0000-00-00 00:00:00'),(464,'de','Dadurch werden alle Tabs oder EinzÃ¼ge (\"\\ t\") zu entfernen, die in der ersten Textbereich erscheinen.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(465,'es','Esto eliminarÃ¡ todas las pestaÃ±as o guiones (\"\\ t\") que aparecen en la primera Ã¡rea de texto.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(466,'fr','Cela permettra d\'Ã©liminer tous les onglets ou tirets (\"\\ t\") qui apparaissent dans la premiÃ¨re zone de texte.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(467,'ja','ã“ã‚Œã¯ã€æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã™ã¹ã¦ã®ã‚¿ãƒ–ã¾ãŸã¯ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆï¼ˆ\"\\ tã‚’\"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(468,'it','Questo eliminerÃ  tutte le schede o trattini (\"\\ t\") che appaiono nella prima area di testo.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(469,'nl','Hierdoor worden alle tabs of streepjes (\"\\ t\") die in de eerste tekstgedeelte verschijnen te verwijderen.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(470,'pl','Spowoduje to usuniÄ™cie wszystkich kart lub wciÄ™cia ( \"\\ t\"), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(471,'pt','Isto irÃ¡ remover todas as guias ou travessÃµes (\"\\ t\") que aparecem na primeira Ã¡rea de texto.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(472,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð²ÐºÐ»Ð°Ð´ÐºÐ¸ Ð¸Ð»Ð¸ Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ñ‹ (\"\\ Ñ‚\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(473,'tr','Bu ilk metin alanÄ±nda gÃ¶rÃ¼nen tÃ¼m sekmeleri veya girintiler (\"\\ t\") kaldÄ±racaktÄ±r.',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(474,'zh','è¿™å°†åˆ é™¤å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸä¸­çš„æ‰€æœ‰é€‰é¡¹å¡æˆ–ç¼©è¿›ï¼ˆâ€œ\\ tâ€çš„ï¼‰ã€‚',0,46,'2016-08-28 17:32:51','0000-00-00 00:00:00'),(475,'de','Entfernen Newlines / Carriage-Returns',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(476,'es','Retire los saltos de lÃ­nea / retornos de carro',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(477,'fr','Supprimer les sauts de ligne / Carriage-retours',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(478,'ja','æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸-æˆ»ã‚Šå€¤ã‚’å‰Šé™¤ã—ã¾ã™',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(479,'it','Rimuovere a capo / carriage-Returns',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(480,'nl','Verwijder nieuwe regels / Carriage-Returns',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(481,'pl','UsuÅ„ nowych linii / Powroty karetki',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(482,'pt','Remover novas linhas / transporte de volta',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(483,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Newlines / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð’Ð¾Ð·Ð²Ñ€Ð°Ñ‚',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(484,'tr','YenisatÄ±rlar / TaÅŸÄ±ma-Ä°ade kaldÄ±r',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(485,'zh','åˆ é™¤æ¢è¡Œ/å›žè½¦ç¬¦å·',0,47,'2016-08-28 17:35:10','0000-00-00 00:00:00'),(486,'de','Dadurch werden alle ZeilenumbrÃ¼che und WagenrÃ¼cklauf (\"\\ n\" und \"\\ r\") zu entfernen, die in der ersten Textbereich erscheinen.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(487,'es','Esto eliminarÃ¡ todos los saltos de lÃ­nea y retornos de carro (\"\\ n\" y \"\\ r\") que aparecen en la primera Ã¡rea de texto.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(488,'fr','Cela permettra d\'Ã©liminer tous les sauts de ligne et de retour chariot (\"\\ n\" et \"\\ r\") qui apparaissent dans la premiÃ¨re zone de texte.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(489,'ja','ã“ã‚Œã¯ã€æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã™ã¹ã¦ã®æ”¹è¡Œã¨ã‚­ãƒ£ãƒªãƒƒã‚¸ãƒªã‚¿ãƒ¼ãƒ³ï¼ˆ\"\\ n\"ã‚„ \"\\ rã‚’\"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(490,'it','Questo eliminerÃ  tutte le nuove righe e ritorni a capo (\"\\ n\" e \"\\ r\") che appaiono nella prima area di testo.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(491,'nl','Hiermee worden alle nieuwe regels en harde returns (\"\\ n\" en \"\\ r\") die in de eerste tekstgedeelte verschijnen te verwijderen.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(492,'pl','Spowoduje to usuniÄ™cie wszystkich nowych linii i powrotu karetki (\"R \\\" \"\\ n\", a), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(493,'pt','Isto irÃ¡ remover todas as novas linhas e retornos de carro ( \"\\ n\" e \"\\ r\") que aparecem na primeira Ã¡rea de texto.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(494,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ ÑÑ‚Ñ€Ð¾ÐºÐ¸ Ð¸ Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‚Ð° ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ (\"\\ Ð¿\" Ð¸ \"\\ Ð³\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(495,'tr','Bu ilk metin alanÄ±nda gÃ¶rÃ¼nen tÃ¼m satÄ±rsonu ve satÄ±rbaÅŸÄ± (\"\\ n\" ve \"\\ r\") kaldÄ±racaktÄ±r.',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(496,'zh','è¿™å°†åˆ é™¤å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸä¸­çš„æ‰€æœ‰æ¢è¡Œç¬¦å’Œå›žè½¦ï¼ˆâ€œ\\ nâ€å’Œâ€œ\\ râ€ï¼‰ã€‚',0,48,'2016-08-28 17:37:29','0000-00-00 00:00:00'),(497,'de','Entfernen Sie Leerzeichen und Tabulatoren / EinzÃ¼ge',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(498,'es','Retire espacio y lengÃ¼eta / sangrÃ­as',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(499,'fr','Supprimer les espaces et tabulations / Retraits',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(500,'ja','ã‚¹ãƒšãƒ¼ã‚¹ã¨ã‚¿ãƒ–/ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆã‚’å‰Šé™¤ã—ã¾ã™',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(501,'it','Rimuovere spazi e tabulazioni / Rientri',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(502,'nl','Verwijder spaties en tabs / Indents',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(503,'pl','UsuÅ„ spacje i tabulatory / wciÄ™Ä‡',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(504,'pt','Remover espaÃ§os e tabulaÃ§Ãµes / Recuos',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(505,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ Ð¸ Ñ‚Ð°Ð±ÑƒÐ»ÑÑ†Ð¸ÑŽ / Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ð¾Ð²',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(506,'tr','Spaces ve Sekmeler / Girintiler kaldÄ±r',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(507,'zh','åˆ é™¤ç©ºæ ¼å’Œåˆ¶è¡¨ç¬¦/ç¼©è¿›',0,49,'2016-08-28 17:40:14','0000-00-00 00:00:00'),(508,'de','Dadurch werden alle Leerzeichen und Tabulatoren / EinzÃ¼ge (\"\\ t\") zu entfernen, die in der ersten Textbereich erscheinen.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(509,'es','Esto eliminarÃ¡ todos los espacios y tabs / guiones (\"\\ t\") que aparecen en la primera Ã¡rea de texto.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(510,'fr','Cela permettra d\'Ã©liminer tous les espaces et onglets / tirets (\"\\ t\") qui apparaissent dans la premiÃ¨re zone de texte.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(511,'ja','ã“ã‚Œã¯ã€ã™ã¹ã¦ã®ã‚¹ãƒšãƒ¼ã‚¹ã¨æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã‚¿ãƒ–/ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆï¼ˆ\"\\ tã‚’\"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(512,'it','Questo eliminerÃ  tutti gli spazi e le schede / trattini (\"\\ t\") che appaiono nella prima area di testo.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(513,'nl','Hiermee worden alle spaties en tabs / streepje (\"\\ t\") die in de eerste tekstgedeelte verschijnen te verwijderen.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(514,'pl','Spowoduje to usuniÄ™cie wszystkich spacji i TABS / wciÄ™cia ( \"\\ t\"), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(515,'pt','Isto irÃ¡ remover todos os espaÃ§os e guias / travessÃµes (\"\\ t\") que aparecem na primeira Ã¡rea de texto.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(516,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ Ð¸ Ð²ÐºÐ»Ð°Ð´ÐºÐ¸ / Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ñ‹ (\"\\ Ñ‚\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(517,'tr','Bu, tÃ¼m alanlarda ve ilk metin alanÄ±nda gÃ¶rÃ¼ntÃ¼lenir sekmeleri / girintiler (\"\\ t\") kaldÄ±racaktÄ±r.',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(518,'zh','è¿™å°†åˆ é™¤æ‰€æœ‰çš„ç©ºæ ¼ï¼Œå¹¶å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸçš„æ ‡ç­¾/ç¼©è¿›ï¼ˆâ€œ\\ tâ€çš„ï¼‰ã€‚',0,50,'2016-08-28 17:42:59','0000-00-00 00:00:00'),(519,'de','Entfernen Sie Leerzeichen und ZeilenumbrÃ¼che / Carriage-Returns',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(520,'es','Quitar los espacios y saltos de lÃ­nea / retornos de carro',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(521,'fr','Supprimer les espaces et les sauts de ligne / Carriage-retours',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(522,'ja','ã‚¹ãƒšãƒ¼ã‚¹ã¨æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸-æˆ»ã‚Šå€¤ã‚’å‰Šé™¤ã—ã¾ã™',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(523,'it','Rimuovere gli spazi e ritorni a capo / carriage-Returns',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(524,'nl','Verwijder Spaces en nieuwe regels / Vervoer-Returns',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(525,'pl','UsuÅ„ spacje i znaki nowej linii / Powroty karetki',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(526,'pt','Remover espaÃ§os e novas linhas / transporte de volta',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(527,'ru','Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ð¾Ð² Ð¸ Ð¿ÐµÑ€ÐµÐ²Ð¾Ð´Ð¾Ð² ÑÑ‚Ñ€Ð¾Ðº / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð’Ð¾Ð·Ð²Ñ€Ð°Ñ‚',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(528,'tr','Spaces ve yenisatÄ±rlar / TaÅŸÄ±ma-Ä°ade kaldÄ±r',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(529,'zh','åˆ é™¤ç©ºæ ¼å’Œæ¢è¡Œ/å›žè½¦ç¬¦å·',0,51,'2016-08-28 17:48:29','0000-00-00 00:00:00'),(530,'de','Dadurch werden alle RÃ¤ume ( \"\") und neue Zeilen / Carriage-Returns (\"\\ n\" und \"\\ r\") zu entfernen, die in der ersten Textbereich erscheinen.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(531,'es','Esto eliminarÃ¡ todos los espacios (\"\") y saltos de lÃ­nea / retornos de carro (\"\\ n\" y \"\\ r\") que aparecen en la primera Ã¡rea de texto.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(532,'fr','Cela permettra d\'Ã©liminer tous les espaces ( \"\") et / sauts de ligne chariot-retours (\"\\ n\" et \"\\ r\") qui apparaissent dans la premiÃ¨re zone de texte.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(533,'ja','ã“ã‚Œã¯ã€æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã™ã¹ã¦ã®ã‚¹ãƒšãƒ¼ã‚¹ï¼ˆ\"\"ï¼‰ã¨æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸ãƒªã‚¿ãƒ¼ãƒ³ï¼ˆ\"\\ n\"ã‚„ \"\\ rã‚’\"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(534,'it','Questo rimuoverÃ  tutti gli spazi (\"\") e ritorni a capo / trasporto-rendimenti (\"\\ n\" e \"\\ r\") che appaiono nella prima area di testo.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(535,'nl','Hierdoor worden alle ruimten (\"\") en newlines / koets-returns (\"\\ n\" en \"\\ r\") die in de eerste tekstgedeelte verschijnen te verwijderen.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(536,'pl','Spowoduje to usuniÄ™cie wszystkich spacji ( \"\") i nowe linie / powroty karetki ( \"\\ r \\\" n \"i\"), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(537,'pt','Isto irÃ¡ remover todos os espaÃ§os (\"\") e novas linhas / transporte de volta ( \"\\ n\" e \"\\ r\") que aparecem na primeira Ã¡rea de texto.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(538,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ (\"\") Ð¸ Ð½Ð¾Ð²Ð¾Ð¹ ÑÑ‚Ñ€Ð¾ÐºÐ¸ / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ÑÑ (\"\\ Ð¿\" Ð¸ \"\\ Ð³\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(539,'tr','Bu ilk metin alanÄ±nda gÃ¶rÃ¼nen tÃ¼m alanlarda ( \"\") ve satÄ±rsonu / taÅŸÄ±yÄ±cÄ±sÄ±nÄ±-dÃ¶ner (\"\\ n\" ve \"\\ r\") kaldÄ±racaktÄ±r.',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(540,'zh','è¿™å°†åˆ é™¤å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸæ‰€æœ‰çš„ç©ºæ ¼ï¼ˆâ€œâ€ï¼‰å’Œæ¢è¡Œ/å›žè½¦ç¬¦å·ï¼ˆâ€œ\\ nâ€å’Œâ€œ\\ râ€ï¼‰ã€‚',0,52,'2016-08-28 17:50:58','0000-00-00 00:00:00'),(541,'de','Entfernen Sie Tabs / EinzÃ¼ge und Newlines / Carriage-Returns',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(542,'es','Retire aquÃ­ / sangrÃ­as y saltos de lÃ­nea / retornos de carro',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(543,'fr','Retirer Tabs / Retraits et / Carriage-sauts de ligne Retours',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(544,'ja','ã‚¿ãƒ–/ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆã¨æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸-æˆ»ã‚Šå€¤ã‚’å‰Šé™¤ã—ã¾ã™',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(545,'it','Rimuovere schede / Rientri e ritorni a capo / carrozza Returns',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(546,'nl','Verwijder Tabs / Indents en nieuwe regels / Vervoer-Returns',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(547,'pl','UsuÅ„ Tabs / wciÄ™cia i nowych linii / Powroty karetki',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(548,'pt','Remover Tabs / Recuos e novas linhas / transporte de volta',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(549,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð’ÐºÐ»Ð°Ð´ÐºÐ¸ / Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ð¾Ð² Ð¸ Newlines / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð’Ð¾Ð·Ð²Ñ€Ð°Ñ‚',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(550,'tr','Sekmeler / Girintiler ve yenisatÄ±rlar / TaÅŸÄ±ma-Ä°ade kaldÄ±r',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(551,'zh','åˆ é™¤é€‰é¡¹å¡/ç¼©è¿›å’Œæ¢è¡Œ/å›žè½¦ç¬¦å·',0,53,'2016-08-28 17:55:20','0000-00-00 00:00:00'),(552,'de','Dadurch werden alle Tabs / Idents (\"\\ t\") und neue Zeilen / Carriage-Returns (\"\\ n\" und \"\\ r\") zu entfernen, die in der ersten Textbereich erscheinen.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(553,'es','Esto eliminarÃ¡ todos los tabs / identificativos (\"\\ t\") y saltos de lÃ­nea / retornos de carro (\"\\ n\" y \"\\ r\") que aparecen en la primera Ã¡rea de texto.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(554,'fr','Cela permettra d\'Ã©liminer tous les onglets / idents (\"\\ t\") et / nouvelles lignes chariot-retours (\"\\ n\" et \"\\ r\") qui apparaissent dans la premiÃ¨re zone de texte.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(555,'ja','ã“ã‚Œã¯ã€æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã‚‹ã™ã¹ã¦ã®ã‚¿ãƒ–/ identsï¼ˆ\"\\ tã®\"ï¼‰ã¨æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸ãƒªã‚¿ãƒ¼ãƒ³ï¼ˆ\"\\ n\"ã‚„ \"\\ rã‚’\"ï¼‰ã‚’å‰Šé™¤ã—ã¾ã™ã€‚',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(556,'it','Questo eliminerÃ  tutte le schede / ident (\"\\ t\") e ritorni a capo / trasporto-rendimenti (\"\\ n\" e \"\\ r\") che appaiono nella prima area di testo.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(557,'nl','Hierdoor worden alle tabs / idents (\"\\ t\") en newlines / koets-returns (\"\\ n\" en \"\\ r\") die in de eerste tekstgedeelte verschijnen te verwijderen.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(558,'pl','Spowoduje to usuniÄ™cie wszystkich kart / siÄ™ tiret ( \"\\ t\") i nowe linie / powroty karetki (\"R \\\" \"\\ n\", a), ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(559,'pt','Isto irÃ¡ remover todas as guias / idents (\"\\ t\") e novas linhas / transporte de volta ( \"\\ n\" e \"\\ r\") que aparecem na primeira Ã¡rea de texto.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(560,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð²ÐºÐ»Ð°Ð´ÐºÐ¸ / Ð¸Ð´ÐµÐ½Ñ‚ (\"\\ Ñ‚\") Ð¸ Ð½Ð¾Ð²Ð¾Ð¹ ÑÑ‚Ñ€Ð¾ÐºÐ¸ / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ÑÑ (\"\\ Ð¿\" Ð¸ \"\\ Ð³\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(561,'tr','Bu ilk metin alanÄ±nda gÃ¶rÃ¼nen tÃ¼m sekmeleri / idents (\"\\ t\") ve satÄ±rsonu / taÅŸÄ±yÄ±cÄ±sÄ±nÄ±-dÃ¶ner (\"\\ n\" ve \"\\ r\") kaldÄ±racaktÄ±r.',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(562,'zh','è¿™å°†åˆ é™¤å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸä¸­çš„æ‰€æœ‰é€‰é¡¹å¡/ identsï¼ˆâ€œ\\ tâ€çš„ï¼‰å’Œæ¢è¡Œ/å›žè½¦ç¬¦å·ï¼ˆâ€œ\\ nâ€å’Œâ€œ\\ râ€ï¼‰ã€‚',0,54,'2016-08-28 17:58:25','0000-00-00 00:00:00'),(563,'de','Entfernen Sie Leerzeichen, Tabs / EinzÃ¼ge und Newlines / Carriage-Returns',0,55,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(564,'es','Quitar los espacios, aquÃ­ / sangrÃ­as y saltos de lÃ­nea / retornos de carro',0,55,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(565,'fr','Supprimer les espaces, Tabs / Retraits, et les sauts de ligne / Carriage-retours',0,55,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(566,'ja','ã€ã‚¿ãƒ–/ã‚¤ãƒ³ãƒ‡ãƒ³ãƒˆã€ãŠã‚ˆã³æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸-æˆ»ã‚Šå€¤ã‚’ã‚¹ãƒšãƒ¼ã‚¹ã‚’å‰Šé™¤ã—ã¾ã™',0,55,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(567,'it','Rimuovere spazi, tabulazioni / Rientri, e ritorni a capo / carrozza Returns',0,55,'2016-08-28 18:01:16','0000-00-00 00:00:00'),(568,'nl','Verwijder spaties, tabs / Indents en nieuwe regels / Vervoer-Returns',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(569,'pl','UsuÅ„ spacje, Tabs / wciÄ™Ä‡ oraz nowych linii / Powroty karetki',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(570,'pt','Remover espaÃ§os, tabulaÃ§Ãµes / Recuos, e novas linhas / transporte de volta',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(571,'ru','Ð£Ð´Ð°Ð»Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹, Ñ‚Ð°Ð±ÑƒÐ»ÑÑ†Ð¸Ð¸ / Ð¾Ñ‚ÑÑ‚ÑƒÐ¿Ð¾Ð² Ð¸ Newlines / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð’Ð¾Ð·Ð²Ñ€Ð°Ñ‚',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(572,'tr','Sekmeler / Girintiler ve yenisatÄ±rlar / TaÅŸÄ±ma-Ä°ade Spaces KaldÄ±r',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(573,'zh','åˆ é™¤ç©ºæ ¼ï¼Œåˆ¶è¡¨ç¬¦/ç¼©è¿›å’Œæ¢è¡Œ/å›žè½¦ç¬¦å·',0,55,'2016-08-28 18:01:17','0000-00-00 00:00:00'),(574,'de','Dadurch werden alle Leerzeichen, Tabs / Idents (\"\\ t\") und neue Zeilen / Carriage-Returns (\"\\ n\" und \"\\ r\") zu entfernen, die in der ersten Textbereich erscheinen.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(575,'es','Esto eliminarÃ¡ todos los espacios, tabulaciones / identificativos (\"\\ t\"), y saltos de lÃ­nea / retornos de carro (\"\\ n\" y \"\\ r\") que aparecen en la primera Ã¡rea de texto.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(576,'fr','Cela permettra d\'Ã©liminer tous les espaces, tabulations / idents (\"\\ t\"), et / sauts de ligne chariot-retours (\"\\ n\" et \"\\ r\") qui apparaissent dans la premiÃ¨re zone de texte.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(577,'ja','ã“ã‚Œã¯ã€ï¼ˆ\"\\ tã‚’\"ï¼‰ã™ã¹ã¦ã®ã‚¹ãƒšãƒ¼ã‚¹ã€ã‚¿ãƒ–/ identsã‚’å‰Šé™¤ã—ã€æ”¹è¡Œ/ã‚­ãƒ£ãƒªãƒƒã‚¸ãƒªã‚¿ãƒ¼ãƒ³ï¼ˆ\"\\ n\"ã‚„ \"\\ r\"ãªã©ï¼‰æœ€åˆã®ãƒ†ã‚­ã‚¹ãƒˆé ˜åŸŸã«è¡¨ç¤ºã•ã‚Œã¾ã™ã€‚',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(578,'it','Questo rimuoverÃ  tutti gli spazi, tabulazioni / ident (\"\\ t\"), e ritorni a capo / trasporto-rendimenti (\"\\ n\" e \"\\ r\") che appaiono nella prima area di testo.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(579,'nl','Dit zal alle spaties, tabs / idents (\"\\ t\") te verwijderen en nieuwe regels / koets-returns (\"\\ n\" en \"\\ r\") die in de eerste tekst gebied verschijnen.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(580,'pl','Spowoduje to usuniÄ™cie wszystkich pomieszczeniach, zaczepy / siÄ™ tiret (\"\\ t\"), a nowymi liniami / powroty karetki, ktÃ³re pojawiajÄ… siÄ™ w pierwszym polu tekstowym (\"R \\\" \"\\ n\", a).',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(581,'pt','Isto irÃ¡ remover todos os espaÃ§os, tabulaÃ§Ãµes / idents (\"\\ t\"), e novas linhas / transporte de volta ( \"\\ n\" e \"\\ r\") que aparecem na primeira Ã¡rea de texto.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(582,'ru','Ð­Ñ‚Ð¾ ÑƒÐ´Ð°Ð»Ð¸Ñ‚ Ð²ÑÐµ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹, Ð²ÐºÐ»Ð°Ð´ÐºÐ¸ / Ð¸Ð´ÐµÐ½Ñ‚ (\"\\ Ñ‚\"), Ð¸ Ð½Ð¾Ð²Ð¾Ð¹ ÑÑ‚Ñ€Ð¾ÐºÐ¸ / ÐºÐ°Ñ€ÐµÑ‚ÐºÐ¸ Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°ÐµÑ‚ÑÑ (\"\\ Ð¿\" Ð¸ \"\\ Ð³\"), ÐºÐ¾Ñ‚Ð¾Ñ€Ñ‹Ðµ Ð¿Ð¾ÑÐ²Ð»ÑÑŽÑ‚ÑÑ Ð² Ð¿ÐµÑ€Ð²Ð¾Ð¹ Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(583,'tr','Bu (\"\\ t\") tÃ¼m boÅŸluklar, sekmeler / idents kaldÄ±rmak ve satÄ±rsonu / taÅŸÄ±yÄ±cÄ±-dÃ¶ner (\"\\ n\" ve \"\\ r\") ilk metin alanÄ±nda gÃ¶rÃ¼nÃ¼r.',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(584,'zh','è¿™å°†åˆ é™¤æ‰€æœ‰çš„ç©ºæ ¼ï¼Œåˆ¶è¡¨ç¬¦/ identsï¼ˆâ€œ\\ tâ€çš„ï¼‰ï¼Œå’Œæ¢è¡Œ/å›žè½¦ç¬¦å·ï¼ˆâ€œ\\ nâ€å’Œâ€œ\\ râ€ï¼‰å‡ºçŽ°åœ¨ç¬¬ä¸€ä¸ªæ–‡æœ¬åŒºåŸŸã€‚',0,56,'2016-08-28 18:03:38','0000-00-00 00:00:00'),(585,'de','Aktie',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(586,'es','Compartir',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(587,'fr','Partager',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(588,'ja','ã‚·ã‚§ã‚¢',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(589,'it','Condividere',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(590,'nl','Delen',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(591,'pl','DzieliÄ‡',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(592,'pt','Compartilhar',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(593,'ru','ÐŸÐ¾Ð´ÐµÐ»Ð¸Ñ‚ÑŒÑÑ',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(594,'tr','Pay',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(595,'zh','åˆ†äº«',0,57,'2016-09-05 13:50:48','0000-00-00 00:00:00'),(596,'de','Teilen mit',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(597,'es','Compartir con',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(598,'fr','Partager avec',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(599,'ja','ã¨å…±æœ‰ã™ã‚‹',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(600,'it','Condividi con',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(601,'nl','Delen met',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(602,'pl','UdostÄ™pniaÄ‡',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(603,'pt','Compartilhar com',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(604,'ru','Ð Ð°Ð·Ñ€ÐµÑˆÐ¸Ñ‚ÑŒ',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(605,'tr','Ä°le paylaÅŸ',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(606,'zh','ä¸ŽæŸäººåˆ†äº«',0,58,'2016-09-05 13:53:05','0000-00-00 00:00:00'),(607,'de','Sprache auswÃ¤hlen',0,59,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(608,'es','Seleccione el idioma',0,59,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(609,'fr','Choisir la langue',0,59,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(610,'ja','è¨€èªžã‚’é¸æŠžã™ã‚‹',0,59,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(611,'it','Seleziona la lingua',0,59,'2017-01-10 15:32:33','2017-01-10 15:32:33'),(612,'nl','Selecteer Taal',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(613,'pl','Wybierz jÄ™zyk',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(614,'pt','Selecione o idioma',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(615,'ru','Ð’Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(616,'tr','Dil SeÃ§in',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(617,'zh','é€‰æ‹©è¯­è¨€',0,59,'2017-01-10 15:32:34','2017-01-10 15:32:34'),(618,'de','Robots.txt Datei',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(619,'es','Archivo Robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(620,'fr','Fichier Robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(621,'ja','Robots.txtãƒ•ã‚¡ã‚¤ãƒ«',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(622,'it','file robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(623,'nl','robots.txt bestand',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(624,'pl','Plik robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(625,'pt','Arquivo Robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(626,'ru','Ð¤Ð°Ð¹Ð» robots.txt',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(627,'tr','Robots.txt DosyasÄ±',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(628,'zh','Robots.txtæ–‡ä»¶',0,60,'2017-01-10 15:45:48','2017-01-10 15:45:48'),(629,'de','Status',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(630,'es','Estado',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(631,'fr','statut',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(632,'ja','çŠ¶æ…‹',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(633,'it','Stato',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(634,'nl','toestand',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(635,'pl','Status',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(636,'pt','Status',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(637,'ru','ÐŸÐ¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð´ÐµÐ»',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(638,'tr','Durum',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(639,'zh','çŠ¶æ€',0,61,'2017-01-12 14:52:16','2017-01-12 14:52:16'),(640,'de','Warten auf Benutzer',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(641,'es','Esperando usuario',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(642,'fr','Attente de l\'utilisateur',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(643,'ja','ãƒ¦ãƒ¼ã‚¶ãƒ¼å¾…ã¡',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(644,'it','In attesa di utente',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(645,'nl','Wachten op gebruiker',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(646,'pl','Oczekiwanie na uÅ¼ytkownika',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(647,'pt','Aguardando UsuÃ¡rio',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(648,'ru','ÐžÐ¶Ð¸Ð´Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(649,'tr','KullanÄ±cÄ±yÄ± Bekliyor',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21'),(650,'zh','æ­£åœ¨ç­‰å¾…ç”¨æˆ·',0,62,'2017-01-12 14:52:21','2017-01-12 14:52:21');
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
INSERT INTO `PrimaryHostRecord` VALUES (1,'BaseTemplate','file.html','2016-08-28 12:10:43','2017-02-08 16:30:56'),(2,'Classification','Web Application','2016-08-28 12:10:43','2017-02-08 16:30:56'),(3,'Contact','uprisingengineer@gmail.com','2016-08-28 12:10:43','2017-02-08 16:30:56'),(4,'Contributor','No Other Contributors','2016-08-28 12:10:43','2017-02-08 16:30:57'),(5,'Copyright','All Material Created by the Owners of this Site is Owned by the Site\'s Owners','2016-08-28 12:10:43','2017-02-08 16:30:57'),(6,'Creator','UprisingEngineer','2016-08-28 12:10:43','2017-02-08 16:30:57'),(7,'NewsKeywords','Sorting Application, Web Application, Word Application','2016-08-28 12:10:43','2017-02-08 16:30:57'),(8,'PublicReleaseDate','2017-01-01','2016-08-28 12:10:43','2017-02-08 16:30:57'),(9,'Subject','Listing, Sorting, Organizing, Alphabetizing','2016-08-28 12:10:43','2017-02-08 16:30:57'),(10,'ApplicationName','Remove Spacing','2016-08-28 12:10:43','2017-02-08 16:30:56'),(11,'PrimaryImageLeft','remove-spacing.jpg','2016-08-28 12:10:43','2017-02-08 16:30:57'),(12,'PrimaryImageRight','remove-spacing-right.jpg','2016-08-28 12:10:43','2017-02-08 16:30:57'),(13,'Author','UprisingEngineer','2016-08-28 12:10:44','2017-02-08 16:30:56'),(14,'Publisher','Self-Published (removespacing.com)','2016-08-28 12:10:44','2017-02-08 16:30:57'),(15,'Rights','All Material Copyrighted by its Owners, Public Use as made available is allowed.','2016-08-28 12:10:44','2017-02-08 16:30:57'),(16,'NotReadyForSearch','1','2017-01-27 16:53:05','2017-02-08 16:30:57'),(17,'FullImage','remove-spacing-full.jpg','2017-02-08 16:30:57','2017-02-08 16:30:57');
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
INSERT INTO `Quote` VALUES (1,'I removed some spacing today!','','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tag`
--

LOCK TABLES `Tag` WRITE;
/*!40000 ALTER TABLE `Tag` DISABLE KEYS */;
INSERT INTO `Tag` VALUES (1,'remove space','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(2,'remove spaces','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(3,'remove','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(4,'spacing','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(5,'formatting','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(6,'text formatting','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(7,'document formatting','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(8,'indentations','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(9,'tabs','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(10,'carriage returns','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00'),(11,'newlines','',1,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `TextBody` VALUES (1,'<p class=\"margin-0px\">So, you wanted to remove some spacing, right? That\'s what brought to you to this page, isn\'t it?</p>\r\n<br>\r\n<p class=\"margin-0px\">Good, I hope it helped.</p>','','',0,0,1,'2016-08-28 12:05:30','0000-00-00 00:00:00');
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
INSERT INTO `UserAdmin` VALUES (1,1,'2016-08-27 17:45:34','0000-00-00 00:00:00');
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
INSERT INTO `UserSession` VALUES (21,1,'mMYUYO=Sz35hzud4iZy=27KapCzhjVci8T1nQVvYSD','2017-02-25 07:10:56','2016-08-28 11:52:53','2017-02-25 07:10:56');
/*!40000 ALTER TABLE `UserSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'removespacing'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-07  7:36:55
