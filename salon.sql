/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 10.1.40-MariaDB-0ubuntu0.18.04.1 : Database - salon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`salon` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `salon`;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

insert  into `member`(`member_id`,`member_name`,`member_address`,`member_birthdate`,`member_phone`,`member_created_at`,`member_updated_at`) values (2,'joko','joko','2019-07-09','2334123412','2019-07-15 19:13:58','2019-07-15 19:13:58'),(3,'angelina','jogja','2019-07-09','3453245','2019-07-16 16:30:09','2019-07-16 16:30:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `officer` */

insert  into `officer`(`officer_id`,`officer_name`,`officer_address`,`officer_phone`,`officer_birthdate`,`officer_date_join`,`officer_created_at`,`officer_updated_at`) values (1,'pemilik','jogja','098560943','2019-07-17','2019-07-01','2019-07-16 14:07:11','2019-07-16 14:07:13'),(2,'petugas','jogja','095464343','2019-07-16','2019-07-16','2019-07-16 14:07:57','2019-07-16 14:08:00');

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_member_id` int(11) NOT NULL,
  `reservation_service_id` int(11) DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `reservation_status` enum('ok','close','cancel','confirmed') DEFAULT 'cancel',
  `reservation_created_at` datetime DEFAULT NULL,
  `reservation_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `reservation_member_id` (`reservation_member_id`),
  KEY `reservation_service_id` (`reservation_service_id`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`reservation_member_id`) REFERENCES `member` (`member_id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`reservation_service_id`) REFERENCES `service` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reservation` */

insert  into `reservation`(`reservation_id`,`reservation_member_id`,`reservation_service_id`,`reservation_date`,`reservation_time`,`reservation_status`,`reservation_created_at`,`reservation_updated_at`) values (8,2,2,'2019-07-16','10:00:00','close','2019-07-16 15:30:16','2019-07-16 15:30:16'),(9,2,3,'2019-07-16','10:00:00','confirmed','2019-07-16 15:30:16','2019-07-16 15:30:16'),(10,2,4,'2019-07-16','10:00:00','confirmed','2019-07-16 15:30:16','2019-07-16 15:30:16'),(11,3,3,'2019-07-16','15:00:00','confirmed','2019-07-16 16:30:42','2019-07-16 16:30:42'),(12,3,4,'2019-07-16','15:00:00','confirmed','2019-07-16 16:30:42','2019-07-16 16:30:42');

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(30) DEFAULT NULL,
  `service_desc` text,
  `service_price` int(11) DEFAULT NULL,
  `service_photo` varchar(250) DEFAULT NULL,
  `service_created_at` datetime DEFAULT NULL,
  `service_updates_at` datetime DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `service` */

insert  into `service`(`service_id`,`service_name`,`service_desc`,`service_price`,`service_photo`,`service_created_at`,`service_updates_at`) values (2,'Potong Rambut','sadfasdfasdf',2147483647,'15072019161317user.png','2019-07-15 16:13:17','2019-07-15 16:13:17'),(3,'Creambath','asdfasdfasd',2147483647,'15072019163336user.png','2019-07-15 16:33:36','2019-07-15 16:33:36'),(4,'Smoothing','dfasdfasdfasdf',2147483647,'15072019163350user.png','2019-07-15 16:33:50','2019-07-15 16:33:50'),(6,'Rebonding','werwqerqwer',21341225,'15072019163516tanggal.jpg','2019-07-15 16:35:16','2019-07-15 16:35:16');

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_reservation_id` int(11) NOT NULL,
  `transaction_officer_id` int(11) NOT NULL,
  `transaction_status` enum('ok','cancel') DEFAULT NULL,
  `transaction_created_at` datetime DEFAULT NULL,
  `transaction_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `transaction_reservation_id` (`transaction_reservation_id`),
  KEY `transaction_officer_id` (`transaction_officer_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`transaction_reservation_id`) REFERENCES `reservation` (`reservation_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`transaction_officer_id`) REFERENCES `officer` (`officer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaction` */

insert  into `transaction`(`transaction_id`,`transaction_reservation_id`,`transaction_officer_id`,`transaction_status`,`transaction_created_at`,`transaction_updated_at`) values (1,8,2,'ok','2019-07-16 20:39:09','2019-07-16 20:39:09');

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
  `user_access_password` varchar(100) DEFAULT NULL,
  `user_access_level` int(11) DEFAULT NULL,
  `user_access_created_at` datetime DEFAULT NULL,
  `user_access_updated_at` datetime DEFAULT NULL,
  `user_access_type` enum('admin','member','owner') DEFAULT NULL,
  PRIMARY KEY (`user_access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_access` */

insert  into `user_access`(`user_access_id`,`user_access_officer_id`,`user_access_member_id`,`user_access_name`,`user_access_address`,`user_access_birthdate`,`user_access_registration_date`,`user_access_phone`,`user_access_status`,`user_access_username`,`user_access_password`,`user_access_level`,`user_access_created_at`,`user_access_updated_at`,`user_access_type`) values (1,1,NULL,'pemilik',NULL,NULL,NULL,NULL,'active','pemilik','58399557dae3c60e23c78606771dfa3d',0,'2019-07-15 11:36:20','2019-07-15 11:36:23','owner'),(3,NULL,2,'joko','joko','2019-07-09','2019-07-15','2334123412','active','joko','9ba0009aa81e794e628a04b51eaf7d7f',2,'2019-07-15 19:13:58','2019-07-15 19:13:58','member'),(4,2,NULL,'petugas','jogja','2019-07-16','2019-07-16','90789678','active','petugas','afb91ef692fd08c445e8cb1bab2ccf9c',1,'2019-07-16 14:12:45','2019-07-16 14:12:47','admin'),(5,NULL,3,'angelina','jogja','2019-07-09','2019-07-16','3453245','active','angelina','4e3d821e1e6207e6acd0e02bc3099e5a',2,'2019-07-16 16:30:09','2019-07-16 16:30:09',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
