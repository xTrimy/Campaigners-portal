/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - campaigners_portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`campaigners_portal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `campaigners_portal`;

/*Table structure for table `committees` */

DROP TABLE IF EXISTS `committees`;

CREATE TABLE `committees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `committees` */

insert  into `committees`(`id`,`name`) values 
(1,'Personnel'),
(2,'Media'),
(3,'Coaching');

/*Table structure for table `member_login_tokens` */

DROP TABLE IF EXISTS `member_login_tokens`;

CREATE TABLE `member_login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `member_login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `member_login_tokens` */

insert  into `member_login_tokens`(`id`,`token`,`user_id`) values 
(1,'188ab625a536ff8b68351b45725f1ca9dc57de87',1),
(2,'408b7d690a4cf45fa45af748a760cb9634be4f0a',1);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `committee_id` (`committee_id`),
  KEY `position_id` (`position_id`),
  CONSTRAINT `members_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`),
  CONSTRAINT `members_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `members` */

insert  into `members`(`id`,`name`,`email`,`university_id`,`phone`,`committee_id`,`position_id`,`password`,`image`) values 
(1,'Mohamed Ashraf','Mohamed1812470@miuegypt.edu.eg','2018/12470','01156052920',1,1,'$2y$10$oLvOXXUge2Bhjc5iR6JtcuHFlvm.hnwxOK..Fiz8f/IPyEyPZYWD2','profile.png'),
(2,'Test user','example@example.com','2018/12471','01156052921',2,1,'123456789','test.png');

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `positions` */

insert  into `positions`(`id`,`name`) values 
(1,'Head'),
(2,'Co-Head');

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `committee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`name`,`description`,`start_date`,`deadline`,`committee_id`) values 
(1,'ssss','ddddddddd','2021-01-16','2021-01-22',0),
(2,'xxxx','eeeeeeeeee','2021-01-16','2021-01-22',1);

/*Table structure for table `trainee_login_tokens` */

DROP TABLE IF EXISTS `trainee_login_tokens`;

CREATE TABLE `trainee_login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trainee_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trainee_login_tokens` */

/*Table structure for table `trainees` */

DROP TABLE IF EXISTS `trainees`;

CREATE TABLE `trainees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `school_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trainees` */

/*Table structure for table `warnings` */

DROP TABLE IF EXISTS `warnings`;

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `warndate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `warnings` */

insert  into `warnings`(`id`,`member_id`,`reason`,`warndate`) values 
(1,1,'Testing','2021-02-04'),
(2,1,'>/!@#$%^&','2021-02-04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
