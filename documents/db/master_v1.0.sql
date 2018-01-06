/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 10.1.21-MariaDB : Database - abeef
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`abeef` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `abeef`;

/*Table structure for table `actions` */

DROP TABLE IF EXISTS `actions`;

CREATE TABLE `actions` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `controller_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `actions` */

/*Table structure for table `addresses` */

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` char(36) NOT NULL,
  `address_line` varchar(255) DEFAULT NULL,
  `houseno` varchar(10) NOT NULL,
  `villageno` varchar(10) NOT NULL,
  `villagename` varchar(255) DEFAULT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province_id` char(36) NOT NULL,
  `postalcode` char(5) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `addresses` */

/*Table structure for table `controllers` */

DROP TABLE IF EXISTS `controllers`;

CREATE TABLE `controllers` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `controllers` */

/*Table structure for table `farms` */

DROP TABLE IF EXISTS `farms`;

CREATE TABLE `farms` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address_id` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location_image` char(36) DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `hasstable` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'โรงเรือน',
  `total_stable` int(2) DEFAULT NULL,
  `total_cow_capacity` int(4) DEFAULT NULL,
  `hasmeadow` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'แปลงหญ้า',
  `total_meadow` int(2) DEFAULT NULL,
  `total_space` int(4) DEFAULT NULL,
  `grass_species` varchar(50) DEFAULT NULL,
  `water_body` varchar(50) DEFAULT NULL,
  `dung_destroy` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `farms` */

/*Table structure for table `herdsmans` */

DROP TABLE IF EXISTS `herdsmans`;

CREATE TABLE `herdsmans` (
  `id` char(36) NOT NULL,
  `code` varchar(5) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `idcard` char(13) NOT NULL,
  `birthday` date DEFAULT NULL,
  `registerdate` date NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `address_id` char(36) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `herdsmans` */

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` text,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `images` */

/*Table structure for table `role_accesses` */

DROP TABLE IF EXISTS `role_accesses`;

CREATE TABLE `role_accesses` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `action_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `role_accesses` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` char(36) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
