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
USE `ktemplate`;

/*Table structure for table `authassignment` */

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authassignment` */

insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Admin','1',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Authenticated','2',NULL,'N;');

/*Table structure for table `authitem` */

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitem` */

insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Admin',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Authenticated',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('conf/Parametro.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Mail.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.*',1,NULL,NULL,'N;');

/*Table structure for table `authitemchild` */

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitemchild` */

insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Site.*');

/*Table structure for table `authmenu` */

CREATE TABLE `authmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rol_menu` (`itemname`,`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `authmenu` */

insert  into `authmenu`(`id`,`itemname`,`menu_id`) values (11,'SampleRol',1);
insert  into `authmenu`(`id`,`itemname`,`menu_id`) values (12,'SampleRol',2);
insert  into `authmenu`(`id`,`itemname`,`menu_id`) values (13,'SampleRol',3);
insert  into `authmenu`(`id`,`itemname`,`menu_id`) values (14,'SampleRol',5);
insert  into `authmenu`(`id`,`itemname`,`menu_id`) values (15,'SampleRol',6);

/*Table structure for table `canton` */

CREATE TABLE `canton` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_canton_provincia` (`provincia_id`),
  CONSTRAINT `FK_canton_provincia` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

/*Data for the table `canton` */

insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (1,9,'Guayaquil',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (2,9,'BALAO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (3,9,'BALZAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (4,9,'DAULE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (5,9,'COLIMES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (6,9,'YAGUACHI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (7,9,'SIMON BOLIVAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (8,9,'MILAGRO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (9,9,'DURAN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (10,9,'EL TRIUNFO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (11,9,'URBINA JADO (SALITRE)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (12,9,'LOMAS DE SARGENTILLO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (13,9,'NARANJAL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (14,9,'NARANJITO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (15,9,'PEDRO CARBO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (16,9,'EMPALME',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (17,9,'ALFREDO BAQUERIZO MORENO (JUJAN)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (18,9,'NOBOL (NARCISA DE JESUS)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (19,9,'GENERAL ANTONIO ELIZALDE (BUCAY)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (20,9,'MARCELINO MARIDUENA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (21,9,'PALESTINA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (22,9,'GENERAL VILLAMIL (PLAYAS)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (23,9,'SAMBORONDON',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (24,9,'SANTA LUCIA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (25,9,'ISIDRO AYORA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (51,1,'EL PAN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (52,1,'SEVILLA DE ORO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (53,1,'GIRON',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (54,1,'CUENCA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (55,1,'PAUTE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (56,1,'CAMILO PONCE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (57,1,'PUCARA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (58,1,'SAN FERNANDO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (59,1,'NABON',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (60,1,'SIGSIG',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (61,1,'GUALACEO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (62,1,'SANTA ISABEL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (63,1,'CHORDELEG',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (64,1,'OÑA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (65,1,'GUACHAPALA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (66,2,'GUARANDA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (67,2,'CHIMBO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (68,2,'SAN MIGUEL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (69,2,'CALUMA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (70,2,'CHILLANES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (71,2,'ECHEANDIA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (72,2,'LAS NAVES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (73,3,'AZOGUES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (74,3,'CAÑAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (75,3,'DELEG',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (76,3,'TAMBO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (77,3,'LA TRONCAL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (78,3,'BIBLIAN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (79,3,'SUSCAL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (80,4,'MONTUFAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (81,4,'MIRA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (82,4,'TULCAN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (83,4,'ESPEJO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (84,4,'BOLIVAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (85,4,'SAN PEDRO DE HUACA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (86,5,'LATACUNGA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (87,5,'PUJILI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (88,5,'SALCEDO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (89,5,'SAQUISILI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (90,5,'SIGCHOS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (91,5,'PANGUA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (92,5,'LA MANA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (93,6,'ALAUSI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (94,6,'PENIPE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (95,6,'RIOBAMBA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (96,6,'COLTA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (97,6,'CHUNCHI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (98,6,'GUAMOTE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (99,6,'CUMANDA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (100,6,'CHAMBO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (101,6,'GUANO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (102,6,'PALLATANGA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (103,7,'ZARUMA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (104,7,'ATAHUALPA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (105,7,'ARENILLAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (106,7,'BALSAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (107,7,'EL GUABO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (108,7,'SANTA ROSA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (109,7,'PASAJE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (110,7,'PINAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (111,7,'PORTOVELO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (112,7,'CHILLA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (113,7,'MACHALA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (114,7,'HUAQUILLAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (115,7,'MARCABELI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (116,7,'LAS LAJAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (117,8,'SAN LORENZO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (118,8,'ELOY ALFARO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (119,8,'ESMERALDAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (120,8,'ATACAMES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (121,8,'MUISNE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (122,8,'QUININDE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (123,8,'RIO VERDE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (124,10,'ATUNTAQUI (ANTONIO ANTE)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (125,10,'COTACACHI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (126,10,'IBARRA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (127,10,'PIMAMPIRO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (128,10,'OTAVALO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (129,10,'URCUQUI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (130,11,'CALVAS(CARIAMANGA)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (131,11,'CATAMAYO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (132,11,'CELICA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (133,11,'CHAGUARPAMBA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (134,11,'ESPINDOLA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (135,11,'GONZANAMA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (136,11,'LOJA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (137,11,'MACARA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (138,11,'OLMEDO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (139,11,'PALTAS (CATACOCHA)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (140,11,'PINDAL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (141,11,'PUYANGO(ALAMOR)',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (142,11,'SARAGURO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (143,11,'ZAPOTILLO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (144,11,'QUILANGA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (145,11,'SOZORANGA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (146,12,'BABAHOYO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (147,12,'QUEVEDO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (148,12,'VENTANAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (149,12,'BABA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (150,12,'VINCES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (151,12,'MONTALVO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (152,12,'PUEBLO VIEJO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (153,12,'URDANETA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (154,12,'PALENQUE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (155,12,'BUENA FE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (156,12,'VALENCIA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (157,12,'MOCACHE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (158,13,'PORTOVIEJO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (159,13,'BOLIVAR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (160,13,'CHONE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (161,13,'EL CARMEN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (162,13,'FLAVIO ALFARO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (163,13,'JIPIJAPA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (164,13,'JUNIN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (165,13,'MANTA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (166,13,'MONTECRISTI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (167,13,'PAJAN',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (168,13,'PICHINCHA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (169,13,'ROCAFUERTE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (170,13,'SANTA ANA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (171,13,'SUCRE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (172,13,'TOSAGUA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (173,13,'24 DE MAYO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (174,13,'PEDERNALES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (175,13,'OLMEDO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (176,13,'PUERTO LOPEZ',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (177,13,'JAMA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (178,13,'JARAMIJO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (179,13,'SAN VICENTE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (180,14,'MORONA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (181,14,'GUALAQUIZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (182,14,'LIMON-INDANZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (183,14,'PALORA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (184,14,'SANTIAGO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (185,14,'SUCUA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (186,14,'HUAMBOYA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (187,14,'SAN JUAN BOSCO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (188,14,'TAISHA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (189,14,'LOGROÑO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (190,14,'PABLO VI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (191,14,'TWINTZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (192,15,'TENA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (193,15,'ARCHIDONA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (194,15,'EL CHACO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (195,15,'QUIJOS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (196,15,'CARLOS J. AROSEMENA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (197,15,'ORELLANA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (198,15,'LA JOYA DE LOS SACHAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (199,15,'AGUARICO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (200,15,'LORETO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (201,16,'PASTAZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (202,16,'MERA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (203,16,'SANTA CLARA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (204,16,'ARAJUNO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (205,17,'QUITO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (206,17,'CAYAMBE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (207,17,'MEJIA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (208,17,'PEDRO MONCAYO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (209,17,'RUMIÑAHUI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (210,17,'SAN MIGUEL DE LOS BANCOS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (211,17,'PEDRO VICENTE MALDONADO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (212,17,'PUERTO QUITO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (213,18,'AMBATO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (214,18,'BAÑOS DE AGUA SANTA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (215,18,'SAN PEDRO DE PELILEO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (216,18,'PATATE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (217,18,'SANTIAGO DE PILLARO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (218,18,'CEVALLOS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (219,18,'MOCHA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (220,18,'QUERO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (221,18,'TISALEO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (222,19,'ZAMORA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (223,19,'YANTZAZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (224,19,'YACUAMBI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (225,19,'CHINCHIPE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (226,19,'EL PANGUI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (227,19,'PALANDA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (228,19,'ZAMORA CHINCHIPE',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (229,19,'NANGARITZA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (230,19,'CENTINELA DEL CONDOR',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (231,19,'PAQUISHA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (232,20,'SAN CRISTOBAL',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (233,20,'ISABELA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (234,20,'SANTA CRUZ',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (235,21,'LAGO AGRIO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (236,21,'GONZALO PIZARRO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (237,21,'SHUSHUFINDI',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (238,21,'PUTUMAYO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (239,21,'SUCUMBIOS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (240,21,'CASCALES',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (241,21,'CUYABENO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (242,22,'ORELLANA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (243,22,'AGUARICO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (244,22,'LA JOYA DE LOS SACHAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (245,22,'LORETO',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (246,23,'SANTO DOMINGO DE LOS TSÁCHILAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (247,24,'SALINAS',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (248,24,'SANTA ELENA',1);
insert  into `canton`(`id`,`provincia_id`,`nombre`,`status`) values (249,24,'LA LIBERTAD',1);

/*Table structure for table `mail` */

CREATE TABLE `mail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(250) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `to` text,
  `cc` text,
  `bcc` text,
  `subject` varchar(1000) DEFAULT NULL,
  `attach` text,
  `body` text,
  `registro` datetime DEFAULT NULL,
  `envio` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tabla` varchar(250) DEFAULT NULL,
  `campo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mail_obra` (`referencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mail` */

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `ruta` varchar(1024) NOT NULL DEFAULT '/',
  `apertura` varchar(1) NOT NULL DEFAULT 'S' COMMENT 'Si se abre en la misma ventana o en nueva',
  `status` int(11) NOT NULL DEFAULT '1',
  `menu_id` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (1,'Menu','C','/','S',1,NULL,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (2,'Configuracion','G','/','S',1,1,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (3,'Parametros','O','/conf/parametro','S',1,2,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (5,'General','G','/','S',1,1,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (6,'Mail','O','/mail','S',1,5,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (7,'Pais','O','/conf/pais','S',1,2,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (8,'Provincia','O','/conf/provincia','S',1,2,0);
insert  into `menu`(`id`,`nombre`,`tipo`,`ruta`,`apertura`,`status`,`menu_id`,`orden`) values (9,'Canton','O','/conf/canton','S',1,2,0);

/*Table structure for table `pais` */

CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

/*Data for the table `pais` */

insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (1,'Afghanistan','AF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (2,'Åland Islands','AX',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (3,'Albania','AL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (4,'Algeria','DZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (5,'American Samoa','AS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (6,'Andorra','AD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (7,'Angola','AO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (8,'Anguilla','AI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (9,'Antarctica','AQ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (10,'Antigua and Barbuda','AG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (11,'Argentina','AR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (12,'Armenia','AM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (13,'Aruba','AW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (14,'Australia','AU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (15,'Austria','AT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (16,'Azerbaijan','AZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (17,'Bahamas','BS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (18,'Bahrain','BH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (19,'Bangladesh','BD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (20,'Barbados','BB',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (21,'Belarus','BY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (22,'Belgium','BE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (23,'Belize','BZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (24,'Benin','BJ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (25,'Bermuda','BM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (26,'Bhutan','BT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (27,'Bolivia','BO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (28,'Bonaire','BQ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (29,'Bosnia and Herzegovina','BA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (30,'Botswana','BW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (31,'Bouvet Island','BV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (32,'Brazil','BR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (33,'British Indian Ocean Territory','IO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (34,'Brunei','BN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (35,'Bulgaria','BG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (36,'Burkina Faso','BF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (37,'Burundi','BI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (38,'Cambodia','KH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (39,'Cameroon','CM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (40,'Canada','CA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (41,'Cape Verde','CV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (42,'Cayman Islands','KY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (43,'Central African Republic','CF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (44,'Chad','TD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (45,'Chile','CL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (46,'China','CN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (47,'Christmas Island','CX',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (48,'Cocos (Keeling) Islands','CC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (49,'Colombia','CO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (50,'Comoros','KM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (51,'Congo','CG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (52,'Congo (DRC)','CD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (53,'Cook Islands','CK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (54,'Costa Rica','CR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (55,'Croatia','HR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (56,'Cuba','CU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (57,'Curaçao','CW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (58,'Cyprus','CY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (59,'Czech Republic','CZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (60,'Denmark','DK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (61,'Djibouti','DJ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (62,'Dominica','DM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (63,'Dominican Republic','DO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (64,'Ecuador','EC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (65,'Egypt','EG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (66,'El Salvador','SV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (67,'Equatorial Guinea','GQ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (68,'Eritrea','ER',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (69,'Estonia','EE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (70,'Ethiopia','ET',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (71,'Falkland Islands (Islas Malvinas)','FK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (72,'Faroe Islands','FO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (73,'Fiji Islands','FJ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (74,'Finland','FI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (75,'France','FR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (76,'French Guiana','GF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (77,'French Polynesia','PF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (78,'French Southern and Antarctic Lands','TF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (79,'Gabon','GA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (80,'Gambia, The','GM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (81,'Georgia','GE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (82,'Germany','DE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (83,'Ghana','GH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (84,'Gibraltar','GI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (85,'Greece','GR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (86,'Greenland','GL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (87,'Grenada','GD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (88,'Guadeloupe','GP',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (89,'Guam','GU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (90,'Guatemala','GT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (91,'Guernsey','GG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (92,'Guinea','GN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (93,'Guinea-Bissau','GW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (94,'Guyana','GY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (95,'Haiti','HT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (96,'Heard Island and McDonald Islands','HM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (97,'Honduras','HN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (98,'Hong Kong SAR','HK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (99,'Hungary','HU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (100,'Iceland','IS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (101,'India','IN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (102,'Indonesia','ID',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (103,'Iran','IR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (104,'Iraq','IQ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (105,'Ireland','IE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (106,'Isle of Man','IM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (107,'Israel','IL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (108,'Italy','IT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (109,'Jamaica','JM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (110,'Jan Mayen','SJ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (111,'Japan','JP',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (112,'Jersey','JE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (113,'Jordan','JO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (114,'Kazakhstan','KZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (115,'Kenya','KE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (116,'Kiribati','KI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (117,'Korea','KR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (118,'Kuwait','KW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (119,'Kyrgyzstan','KG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (120,'Laos','LA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (121,'Latvia','LV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (122,'Lebanon','LB',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (123,'Lesotho','LS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (124,'Liberia','LR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (125,'Libya','LY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (126,'Liechtenstein','LI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (127,'Lithuania','LT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (128,'Luxembourg','LU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (129,'Macao SAR','MO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (130,'Macedonia, Former Yugoslav Republic of','MK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (131,'Madagascar','MG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (132,'Malawi','MW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (133,'Malaysia','MY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (134,'Maldives','MV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (135,'Mali','ML',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (136,'Malta','MT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (137,'Marshall Islands','MH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (138,'Martinique','MQ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (139,'Mauritania','MR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (140,'Mauritius','MU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (141,'Mayotte','YT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (142,'Mexico','MX',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (143,'Micronesia','FM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (144,'Moldova','MD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (145,'Monaco','MC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (146,'Mongolia','MN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (147,'Montenegro','ME',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (148,'Montserrat','MS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (149,'Morocco','MA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (150,'Mozambique','MZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (151,'Myanmar','MM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (152,'Namibia','NA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (153,'Nauru','NR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (154,'Nepal','NP',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (155,'Netherlands','NL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (156,'New Caledonia','NC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (157,'New Zealand','NZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (158,'Nicaragua','NI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (159,'Niger','NE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (160,'Nigeria','NG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (161,'Niue','NU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (162,'Norfolk Island','NF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (163,'North Korea','KP',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (164,'Northern Mariana Islands','MP',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (165,'Norway','NO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (166,'Oman','OM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (167,'Pakistan','PK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (168,'Palau','PW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (169,'Palestinian Authority','PS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (170,'Panama','PA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (171,'Papua New Guinea','PG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (172,'Paraguay','PY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (173,'Peru','PE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (174,'Philippines','PH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (175,'Pitcairn Islands','PN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (176,'Poland','PL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (177,'Portugal','PT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (178,'Puerto Rico','PR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (179,'Qatar','QA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (180,'Republic of Côte d\'Ivoire','CI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (181,'Reunion','RE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (182,'Romania','RO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (183,'Russia','RU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (184,'Rwanda','RW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (185,'Saba','XS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (186,'Samoa','WS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (187,'San Marino','SM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (188,'São Tomé and Príncipe','ST',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (189,'Saudi Arabia','SA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (190,'Senegal','SN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (191,'Serbia','RS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (192,'Seychelles','SC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (193,'Sierra Leone','SL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (194,'Singapore','SG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (195,'Sint Eustatius','XE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (196,'Sint Maarten','SX',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (197,'Slovakia','SK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (198,'Slovenia','SI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (199,'Solomon Islands','SB',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (200,'Somalia','SO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (201,'South Africa','ZA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (202,'South Georgia and the South Sandwich Islands','GS',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (203,'Spain','ES',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (204,'Sri Lanka','LK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (205,'St. Barthélemy','BL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (206,'St. Helena','SH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (207,'St. Kitts and Nevis','KN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (208,'St. Lucia','LC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (209,'St. Martin','MF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (210,'St. Pierre and Miquelon','PM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (211,'St. Vincent and the Grenadines','VC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (212,'Sudan','SD',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (213,'Suriname','SR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (214,'Swaziland','SZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (215,'Sweden','SE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (216,'Switzerland','CH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (217,'Syria','SY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (218,'Taiwan','TW',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (219,'Tajikistan','TJ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (220,'Tanzania','TZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (221,'Thailand','TH',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (222,'Timor-Leste','TL',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (223,'Togo','TG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (224,'Tokelau','TK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (225,'Tonga','TO',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (226,'Trinidad and Tobago','TT',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (227,'Tunisia','TN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (228,'Turkey','TR',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (229,'Turkmenistan','TM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (230,'Turks and Caicos Islands','TC',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (231,'Tuvalu','TV',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (232,'Uganda','UG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (233,'Ukraine','UA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (234,'United Arab Emirates','AE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (235,'United Kingdom','UK',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (236,'United States','US',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (237,'United States Minor Outlying Islands','UM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (238,'Uruguay','UY',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (239,'Uzbekistan','UZ',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (240,'Vanuatu','VU',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (241,'Vatican City','VA',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (242,'Venezuela','VE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (243,'Vietnam','VN',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (244,'Virgin Islands, British','VG',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (245,'Virgin Islands, U.S.','VI',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (246,'Wallis and Futuna','WF',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (247,'Yemen','YE',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (248,'Zambia','ZM',1);
insert  into `pais`(`id`,`nombre`,`codigo`,`status`) values (249,'Zimbabwe','ZW',1);

/*Table structure for table `parametro` */

CREATE TABLE `parametro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escenario` varchar(50) NOT NULL,
  `parametro` varchar(250) NOT NULL,
  `valor` varchar(250) DEFAULT NULL,
  `referencia_1` varchar(250) DEFAULT NULL,
  `referencia_2` varchar(250) DEFAULT NULL,
  `referencia_3` text,
  `comentario` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `parametro` */

/*Table structure for table `parroquia` */

CREATE TABLE `parroquia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `canton_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `parroquia` */

insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (1,1,'AYACUCHO',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (2,1,'BOLIVAR (SAGRARIO)',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (3,1,'CARBO (CONCEPCION)',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (4,1,'CHONGON',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (5,1,'LETAMENDI',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (6,1,'MORRO',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (7,1,'ROCA',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (8,1,'ROCAFUERTE',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (9,1,'SUCRE',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (10,1,'TARQUI',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (11,1,'TENGUEL',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (12,1,'URDANETA',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (13,1,'XIMENA',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (14,1,'FEBRES CORDERO',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (15,1,'GARCIA MORENO',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (16,1,'GUAYAQUIL',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (17,1,'JUAN GÓMEZ RENDÓN (PROGRESO)',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (18,1,'NUEVE DE OCTUBRE',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (19,1,'OLMEDO (SAN ALEJO)',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (20,1,'PASCUALES',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (21,1,'PASCUALES 1',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (22,1,'PLAYAS (GENERAL VILLAMIL)',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (23,1,'POSORJA',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (24,1,'PUNA',1);
insert  into `parroquia`(`id`,`canton_id`,`nombre`,`status`) values (25,1,'CHONGON',1);

/*Table structure for table `profiles` */

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profiles` */

insert  into `profiles`(`user_id`,`lastname`,`firstname`,`birthday`) values (1,'Admin','Super','0000-00-00');
insert  into `profiles`(`user_id`,`lastname`,`firstname`,`birthday`) values (2,'Demo','Demo','0000-00-00');

/*Table structure for table `profiles_fields` */

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

insert  into `profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3);
insert  into `profiles_fields`(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) values (2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3);

/*Table structure for table `provincia` */

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_provincia_pais` (`pais_id`),
  CONSTRAINT `FK_provincia_pais` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `provincia` */

insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (1,64,'Azuay',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (2,64,'BOLIVAR',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (3,64,'CANAR',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (4,64,'CARCHI',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (5,64,'COTOPAXI',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (6,64,'CHIMBORAZO',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (7,64,'EL ORO',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (8,64,'ESMERALDAS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (9,64,'GUAYAS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (10,64,'Imbabura',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (11,64,'LOJA',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (12,64,'LOS RIOS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (13,64,'MANABI',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (14,64,'MORONA SANTIAGO',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (15,64,'NAPO',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (16,64,'PASTAZA',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (17,64,'PICHINCHA',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (18,64,'TUNGURAHUA',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (19,64,'ZAMORA CHINCHIPE',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (20,64,'GALAPAGOS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (21,64,'SUCUMBIOS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (22,64,'ORELLANA',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (23,64,'SANTO DOMINGO DE LOS TSACHILAS',1);
insert  into `provincia`(`id`,`pais_id`,`nombre`,`status`) values (24,64,'SANTA ELENA',1);

/*Table structure for table `rights` */

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rights` */

/*Table structure for table `users` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,1344620123,1,1);
insert  into `users`(`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`) values (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,1344701814,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
