/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 10.1.38-MariaDB-0ubuntu0.18.04.1 : Database - x
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`x` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `x`;

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) DEFAULT NULL,
  `member_address` varchar(70) DEFAULT NULL,
  `member_birthdate` date DEFAULT NULL,
  `member_phone` varchar(30) DEFAULT NULL,
  `member_created_at` datetime DEFAULT NULL,
  `member_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

/*Table structure for table `officer` */

DROP TABLE IF EXISTS `officer`;

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `officer_name` varchar(30) DEFAULT NULL,
  `officer_address` varchar(50) DEFAULT NULL,
  `officer_phone` varchar(15) DEFAULT NULL,
  `officer_birthdate` date DEFAULT NULL,
  `officer_date_join` date DEFAULT NULL,
  `officer_created_at` datetime DEFAULT NULL,
  `officer_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `officer` */

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_member_id` int(11) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `reservation_status` enum('active','close','cancel') DEFAULT 'cancel',
  `reservation_created_at` datetime DEFAULT NULL,
  `reservation_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `reservation` */

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(30) DEFAULT NULL,
  `service_price` int(11) DEFAULT NULL,
  `service_created_at` datetime DEFAULT NULL,
  `service_updates_at` datetime DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `service` */

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_member_id` int(11) NOT NULL,
  `transaction_service_id` int(11) NOT NULL,
  `transaction_officer_id` int(11) NOT NULL,
  `transaction_status` enum('ok','confirmed','cancel') DEFAULT 'confirmed',
  `transaction_created_at` datetime DEFAULT NULL,
  `transaction_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaction` */

/*Table structure for table `user_access` */

DROP TABLE IF EXISTS `user_access`;

CREATE TABLE `user_access` (
  `user_access_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_access_officer_id` int(11) DEFAULT NULL,
  `user_access_member_id` int(11) DEFAULT NULL,
  `user_access_name` varchar(30) DEFAULT NULL,
  `user_access_address` varchar(50) DEFAULT NULL,
  `user_access_birthdate` date DEFAULT NULL,
  `user_access_registration_date` date DEFAULT NULL,
  `user_access_phone` varchar(15) DEFAULT NULL,
  `user_access_status` enum('active','not_active') DEFAULT 'active',
  `user_access_username` varchar(20) DEFAULT NULL,
  `user_access_password` varchar(30) DEFAULT NULL,
  `user_access_level` int(11) DEFAULT NULL,
  `user_access_created_at` datetime DEFAULT NULL,
  `user_access_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_access` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
