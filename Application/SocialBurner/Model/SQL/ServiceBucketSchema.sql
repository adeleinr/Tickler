# CocoaMySQL dump
# Version 0.7b5
# http://cocoamysql.sourceforge.net
#
# Host: 127.0.0.1 (MySQL 5.0.41)
# Database: service_bucket
# Generation Time: 2009-10-10 17:46:06 -0700
# ************************************************************

# Dump of table CLIENT
# ------------------------------------------------------------

CREATE TABLE `CLIENT` (
  `CLIENT_ID` int(11) NOT NULL auto_increment,
  `CLIENT_NAME` varchar(255) NOT NULL default '',
  `CLIENT_STREET` varchar(255) default NULL,
  `CLIENT_CITY` varchar(255) default NULL,
  `CLIENT_ZIP` varchar(5) default NULL,
  `CLIENT_EMAIL` varchar(100) default NULL,
  `CLIENT_USERNAME` varchar(65) NOT NULL UNIQUE default '',
  `CLIENT_PASSWORD` varchar(65) NOT NULL default '',
  `CLIENT_STATE` varchar(2) default NULL,
  PRIMARY KEY  (`CLIENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Dump of table SERVICE
# ------------------------------------------------------------

CREATE TABLE `SERVICE` (
  `SERVICE_ID` int(11) NOT NULL auto_increment,
  `PROVIDER_ID` int(11) default NULL,
  `SERVICE_NAME` varchar(255) NOT NULL default '',
  `SERVICE_URL` varchar(255) NOT NULL default '',
  `SERVICE_CITY` varchar(255) NOT NULL default '',
  `SERVICE_STATE` varchar(255) NOT NULL default '',
  `SERVICE_PHONE` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`SERVICE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Dump of table BUCKET
# ------------------------------------------------------------

CREATE TABLE `BUCKET` (
  `BUCKET_ID` int(11) NOT NULL auto_increment,
  `CLIENT_ID` int(11) NOT NULL,
  `BUCKET_NAME` varchar(40) NOT NULL,
  `BUCKET_NUM_USERS` int(200) default '0',
  `BUCKET_PUBLIC` tinyint(2) default '0',
  PRIMARY KEY  (`BUCKET_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Dump of table CLIENT_SERVICE_BUCKET
# ------------------------------------------------------------

CREATE TABLE `CLIENT_SERVICE_BUCKET` (
  `CLIENT_ID` int(11) NOT NULL,
  `SERVICE_ID` int(11) NOT NULL,
  `BUCKET_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table PROVIDER
# ------------------------------------------------------------

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
  `PROVIDER_USERNAME` varchar(65) NOT NULL UNIQUE default '',
  `PROVIDER_PASSWORD` varchar(65) NOT NULL,
  PRIMARY KEY  (`PROVIDER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Dump of table STATE
# ------------------------------------------------------------

CREATE TABLE `STATE` (
  `STATE_ID` smallint(5) unsigned NOT NULL auto_increment,
  `STATE_NAME` varchar(32) NOT NULL,
  `STATE_ABBR` varchar(8) default NULL,
  PRIMARY KEY  (`STATE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;