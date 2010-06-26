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
-- Table structure for table `CLIENT_SERVICE_BUCKET`
--

CREATE TABLE `CLIENT_SERVICE_BUCKET` (
  `CLIENT_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `BUCKET_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `STATE`
--

CREATE TABLE `STATE` (
  `STATE_ID` smallint(5) unsigned NOT NULL auto_increment,
  `STATE_NAME` varchar(32) NOT NULL,
  `STATE_ABBR` varchar(8) default NULL,
  PRIMARY KEY  (`STATE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-11-29 20:04:55
