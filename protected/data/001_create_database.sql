/*

SQLyog Ultimate v8.55 
MySQL - 5.1.49-community : Database - ktemplate

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

<<<<<<< HEAD
=======
USE `ktemplate`;
>>>>>>> origin/master



/*Table structure for table `authassignment` */



DROP TABLE IF EXISTS `authassignment`;



CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*Data for the table `authassignment` */



insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Admin','1',NULL,'N;'),('Authenticated','2',NULL,'N;');



/*Table structure for table `authitem` */



DROP TABLE IF EXISTS `authitem`;



CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*Data for the table `authitem` */



insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Admin',2,NULL,NULL,'N;'),('Authenticated',2,NULL,NULL,'N;'),('Site.Error',0,NULL,NULL,'N;'),('Site.Index',0,NULL,NULL,'N;');



/*Table structure for table `authitemchild` */



DROP TABLE IF EXISTS `authitemchild`;



CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*Data for the table `authitemchild` */



insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Site.Error'),('Authenticated','Site.Index');



/*Table structure for table `profiles` */



DROP TABLE IF EXISTS `profiles`;



CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*Data for the table `profiles` */



insert  into `profiles`(`user_id`,`lastname`,`firstname`,`birthday`) values (1,'Admin','Super','0000-00-00'),(2,'Demo','Demo','0000-00-00');



/*Table structure for table `profiles_fields` */



DROP TABLE IF EXISTS `profiles_fields`;



CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



/*Data for the table `profiles_fields` */



insert  into `profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),(2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3);



/*Table structure for table `rights` */



DROP TABLE IF EXISTS `rights`;



CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*Data for the table `rights` */



/*Table structure for table `users` */



DROP TABLE IF EXISTS `users`;



CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



/*Data for the table `users` */



insert  into `users`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1334526498,1,1),(2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,1334526269,0,1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

