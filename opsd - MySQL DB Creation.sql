-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.8-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema opsd
--

CREATE DATABASE IF NOT EXISTS opsd;
USE opsd;

--
-- Definition of table `proejct_client_file`
--

DROP TABLE IF EXISTS `proejct_client_file`;
CREATE TABLE `proejct_client_file` (
  `proejct_client_file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_title` varchar(45) NOT NULL,
  `file_path` varchar(45) NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`proejct_client_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proejct_client_file`
--

/*!40000 ALTER TABLE `proejct_client_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `proejct_client_file` ENABLE KEYS */;


--
-- Definition of table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `city` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `website` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `profile_image_path` varchar(100) NOT NULL,
  `donation_link` varchar(100) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `user_preferences` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


--
-- Definition of table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `project_tags` varchar(30) NOT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


--
-- Definition of table `project_request`
--

DROP TABLE IF EXISTS `project_request`;
CREATE TABLE `project_request` (
  `project_request_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `sender_profile_id` int(10) unsigned NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`project_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_request`
--

/*!40000 ALTER TABLE `project_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_request` ENABLE KEYS */;


--
-- Definition of table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE `user_feedback` (
  `user_feedback_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL,
  `review` text NOT NULL,
  `writer_profile_id` int(10) unsigned NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`user_feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_feedback`
--

/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
