-- MySQL dump 10.11
--
-- Host: localhost    Database: service_bucket
-- ------------------------------------------------------
-- Server version	5.0.45

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
-- Table structure for table `BUCKET`
--

CREATE TABLE `BUCKET` (
  `BUCKET_ID` int(11) NOT NULL auto_increment,
  `CLIENT_ID` int(11) NOT NULL,
  `BUCKET_NAME` varchar(40) NOT NULL,
  `BUCKET_NUM_USERS` int(200) default '0',
  `BUCKET_PUBLIC` tinyint(2) default '0',
  PRIMARY KEY  (`BUCKET_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BUCKET`
--

LOCK TABLES `BUCKET` WRITE;
/*!40000 ALTER TABLE `BUCKET` DISABLE KEYS */;
INSERT INTO `BUCKET` VALUES (1,0,'Untagged',0,0),(2,1,'General',0,0),(3,1,'Health',0,0),(4,1,'Test',0,0),(7,1,'Adelein',0,0),(8,1,'Eating Out',0,0);
/*!40000 ALTER TABLE `BUCKET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLIENT`
--

CREATE TABLE `CLIENT` (
  `CLIENT_ID` int(11) NOT NULL auto_increment,
  `CLIENT_NAME` varchar(255) NOT NULL default '',
  `CLIENT_STREET` varchar(255) default NULL,
  `CLIENT_CITY` varchar(255) default NULL,
  `CLIENT_ZIP` varchar(5) default NULL,
  `CLIENT_EMAIL` varchar(100) default NULL,
  `CLIENT_USERNAME` varchar(65) NOT NULL default '',
  `CLIENT_PASSWORD` varchar(65) NOT NULL default '',
  `CLIENT_STATE` varchar(2) default NULL,
  PRIMARY KEY  (`CLIENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CLIENT`
--

LOCK TABLES `CLIENT` WRITE;
/*!40000 ALTER TABLE `CLIENT` DISABLE KEYS */;
INSERT INTO `CLIENT` VALUES (1,'adelein','','','','','adeleinr','5e69f94fff62731d986a004bdf480867',''),(2,'orlando','','','','','opozo','c06db68e819be6ec3d26c6038d8e8d1f',''),(3,'orlando','','','','','adeleinr','5e69f94fff62731d986a004bdf480867','');
/*!40000 ALTER TABLE `CLIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLIENT_SERVICE_BUCKET`
--

CREATE TABLE `CLIENT_SERVICE_BUCKET` (
  `CLIENT_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `BUCKET_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CLIENT_SERVICE_BUCKET`
--

LOCK TABLES `CLIENT_SERVICE_BUCKET` WRITE;
/*!40000 ALTER TABLE `CLIENT_SERVICE_BUCKET` DISABLE KEYS */;
INSERT INTO `CLIENT_SERVICE_BUCKET` VALUES (1,2,2),(1,1,2),(1,3,2),(1,6,2),(1,4,2),(1,7,2),(1,8,8),(1,16,1),(1,14,1),(1,15,1),(1,17,1),(1,21,1),(1,20,1),(1,19,1),(1,18,1),(1,13,1),(1,22,1),(1,23,1),(1,24,1),(1,25,1),(1,26,1),(1,27,1),(1,28,1),(1,29,1),(1,30,1),(1,31,1),(1,32,1),(1,33,1);
/*!40000 ALTER TABLE `CLIENT_SERVICE_BUCKET` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EVENT`
--

CREATE TABLE `EVENT` (
  `EVENT_ID` int(11) NOT NULL auto_increment,
  `PROVIDER_ID` int(11) NOT NULL default '0',
  `EVENT_NAME` varchar(255) NOT NULL default '',
  `EVENT_DESCRIPTION` varchar(255) NOT NULL default '',
  `EVENT_END_DATE` date default '0000-00-00',
  `EVENT_START_DATE` date default '0000-00-00',
  PRIMARY KEY  (`EVENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EVENT`
--

LOCK TABLES `EVENT` WRITE;
/*!40000 ALTER TABLE `EVENT` DISABLE KEYS */;
INSERT INTO `EVENT` VALUES (4,2,'kjkjkj','hjhjhjhjhj','0000-00-00','2009-11-19'),(2,2,'Juice Party','Lets have a juice for $1.99','0000-00-00','0000-00-00'),(3,2,'asdasd','dsfsdfsdf','0000-00-00','2009-11-19'),(5,2,'kjkjkjkjkj','juyiuiuiuiuiuiu','0000-00-00','2009-11-19'),(6,2,'kjkjkjkjkj','juyiuiuiuiuiuiu','0000-00-00','2009-11-19'),(7,2,'kjkjkj','hjhjhjhjhj','0000-00-00','2009-11-19'),(8,2,'rytytyty','oipipipi','0000-00-00','2009-11-19'),(9,2,'lklklklk','oioioioioi','0000-00-00','2009-11-19'),(11,2,'Jamba Thanksgiving','Peanut butter Shake for $2.99','0000-00-00','2009-11-19'),(12,2,'First Event','Let drink some crazy juice','0000-00-00','2009-11-19'),(13,2,'testing','event information','0000-00-00','2009-11-19');
/*!40000 ALTER TABLE `EVENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROVIDER`
--

CREATE TABLE `PROVIDER` (
  `PROVIDER_ID` int(11) NOT NULL auto_increment,
  `PROVIDER_BUSINESS_NAME` varchar(255) NOT NULL,
  `PROVIDER_STREET` varchar(255) default NULL,
  `PROVIDER_CITY` varchar(255) default NULL,
  `PROVIDER_STATE` varchar(2) default NULL,
  `PROVIDER_ZIP` varchar(5) default NULL,
  `PROVIDER_PHONE` varchar(11) default NULL,
  `PROVIDER_EMAIL` varchar(100) default NULL,
  `PROVIDER_URL` varchar(200) default NULL,
  `PROVIDER_USERNAME` varchar(65) NOT NULL default '',
  `PROVIDER_PASSWORD` varchar(65) NOT NULL,
  PRIMARY KEY  (`PROVIDER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PROVIDER`
--

LOCK TABLES `PROVIDER` WRITE;
/*!40000 ALTER TABLE `PROVIDER` DISABLE KEYS */;
INSERT INTO `PROVIDER` VALUES (1,'hair salon','','','','','','','','hairsalon','c06db68e819be6ec3d26c6038d8e8d1f'),(2,'jamba juice','123 juice st','miami','FL','23234','','','','jamba','c06db68e819be6ec3d26c6038d8e8d1f'),(3,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',''),(4,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',''),(5,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',''),(6,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','');
/*!40000 ALTER TABLE `PROVIDER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `SERVICE_ZIPCODE` varchar(5) default '',
  `SERVICE_ADDRESS` varchar(255) default '',
  `SERVICE_ID` int(11) NOT NULL auto_increment,
  `PROVIDER_ID` int(11) default NULL,
  `SERVICE_NAME` varchar(255) NOT NULL default '',
  `SERVICE_URL` varchar(255) default '',
  `SERVICE_CITY` varchar(255) NOT NULL default '',
  `SERVICE_STATE` varchar(255) NOT NULL default '',
  `SERVICE_PHONE` varchar(255) default '',
  PRIMARY KEY  (`SERVICE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SERVICE`
--

LOCK TABLES `SERVICE` WRITE;
/*!40000 ALTER TABLE `SERVICE` DISABLE KEYS */;
INSERT INTO `SERVICE` VALUES ('','',1,NULL,'Jamba Juice','http://www.jambajuice.com/','Plano','TX','(469) 467-6877'),('','',2,NULL,'Salon Stefano','','Houston','TX','(713) 522-4247'),('','',3,NULL,'Auto Repair Schaumburg/ Drews Garage Auto Repair','http://www.drewsgarage.com/','Schaumburg','IL','(847) 303-1212'),('','',4,NULL,'Palo Alto Medical Foundation','','Palo Alto','CA','(650) 853-2984'),('','',5,NULL,'Maria Hair Salon','','San Jose','CA','(305) 123-2345'),('','',6,NULL,'Grand Lux Cafe','http://www.grandluxcafe.com/','Chicago','IL','(312) 276-2500'),('','',7,NULL,'<b>Adelein Rodriguez</b>','http://ddailygirl.com','','',''),('','',8,NULL,'Starbucks','http://starbucks.com/','Bossier City','LA','(318) 549-2074'),('94086','298 W McKinley Ave',13,NULL,'Target','','Sunnyvale','CA','4087021012'),('95054','3970 Rivermark Plaza',14,NULL,'Safeway','','Santa Clara','CA','4088550980'),('95054','3127 Mission College Blvd',15,NULL,'Tomatina','','Santa Clara','CA','4086549000'),('95054','3127 Mission College Blvd',16,NULL,'Tomatina','','Santa Clara','CA','4086549000'),('95054','3127 Mission College Blvd',17,NULL,'Tomatina','','Santa Clara','CA','4086549000'),('95054','3127 Mission College Blvd',18,NULL,'Tomatina','','Santa Clara','CA','4086549000'),('32819','6875 Sand Lake Rd.',19,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32819','6875 Sand Lake Rd.',20,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32819','6875 Sand Lake Rd.',21,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32819','7344 W Sand Lake Rd',22,NULL,'McDonald\'s','','Orlando','FL','4072640050'),('32836','12549 State Road 535',23,NULL,'McDonald\'s Restaurants','','Orlando','FL','4078271030'),('32819','6875 Sand Lake Rd.',24,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32806','2504 S. Orange Ave.',25,NULL,'McDonald\'s Bistro Gourmet','','Orlando','FL','4078419472'),('32819','7344 W Sand Lake Rd',26,NULL,'McDonald\'s','','Orlando','FL','4072640050'),('32819','7344 W Sand Lake Rd',27,NULL,'McDonald\'s','','Orlando','FL','4072640050'),('32819','6875 Sand Lake Rd.',28,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32819','6875 Sand Lake Rd.',29,NULL,'McDonald\'s','','Orlando','FL','4073512185'),('32836','12549 State Road 535',30,NULL,'McDonald\'s Restaurants','','Orlando','FL','4078271030'),('32806','2504 S. Orange Ave.',31,NULL,'McDonald\'s Bistro Gourmet','','Orlando','FL','4078419472'),('','',32,NULL,'','','','',''),('','',33,NULL,'','','','','');
/*!40000 ALTER TABLE `SERVICE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STATE`
--

CREATE TABLE `STATE` (
  `STATE_ID` smallint(5) unsigned NOT NULL auto_increment,
  `STATE_NAME` varchar(32) NOT NULL,
  `STATE_ABBR` varchar(8) default NULL,
  PRIMARY KEY  (`STATE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STATE`
--

LOCK TABLES `STATE` WRITE;
/*!40000 ALTER TABLE `STATE` DISABLE KEYS */;
INSERT INTO `STATE` VALUES (1,'Alabama','AL'),(2,'Alaska','AK'),(3,'Arizona','AZ'),(4,'Arkansas','AR'),(5,'California','CA'),(6,'Colorado','CO'),(7,'Connecticut','CT'),(8,'Delaware','DE'),(9,'District of Columbia','DC'),(10,'Florida','FL'),(11,'Georgia','GA'),(12,'Hawaii','HI'),(13,'Idaho','ID'),(14,'Illinois','IL'),(15,'Indiana','IN'),(16,'Iowa','IA'),(17,'Kansas','KS'),(18,'Kentucky','KY'),(19,'Louisiana','LA'),(20,'Maine','ME'),(21,'Maryland','MD'),(22,'Massachusetts','MA'),(23,'Michigan','MI'),(24,'Minnesota','MN'),(25,'Mississippi','MS'),(26,'Missouri','MO'),(27,'Montana','MT'),(28,'Nebraska','NE'),(29,'Nevada','NV'),(30,'New Hampshire','NH'),(31,'New Jersey','NJ'),(32,'New Mexico','NM'),(33,'New York','NY'),(34,'North Carolina','NC'),(35,'North Dakota','ND'),(36,'Ohio','OH'),(37,'Oklahoma','OK'),(38,'Oregon','OR'),(39,'Pennsylvania','PA'),(40,'Rhode Island','RI'),(41,'South Carolina','SC'),(42,'South Dakota','SD'),(43,'Tennessee','TN'),(44,'Texas','TX'),(45,'Utah','UT'),(46,'Vermont','VT'),(47,'Virginia','VA'),(48,'Washington','WA'),(49,'West Virginia','WV'),(50,'Wisconsin','WI'),(51,'Wyoming','WY');
/*!40000 ALTER TABLE `STATE` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-11-29 20:10:38
