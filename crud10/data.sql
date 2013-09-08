/*
SQLyog Enterprise - MySQL GUI v8.02 RC
MySQL - 5.1.50-community : Database - dbcimas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(250) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (1,'Nombre de algun cliente','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (2,'bbbbbb','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (3,'Nombre de Cliente 3','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (4,'11121212','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (5,'sdcasdasf','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (6,'aaaaaaa','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (7,'Nuevo cliente Z','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (8,'1111111111','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (9,'aaaaaaa','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (10,'Peter Parker','E');
insert  into `cliente`(`idcliente`,`nombre_cliente`,`status`) values (11,'A','E');

/*Table structure for table `facturadet` */

DROP TABLE IF EXISTS `facturadet`;

CREATE TABLE `facturadet` (
  `idfacturadet` int(11) NOT NULL AUTO_INCREMENT,
  `idfacturaenc` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `monto` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`idfacturadet`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `facturadet` */

insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (1,1,'Detalle de item 1','201.75');
insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (2,1,'Detalle de item 2','400.00');
insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (5,0,'asdasdeeeee','111.00');
insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (7,2,'Caramelo Tofi','0.50');
insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (8,3,'Google Glass ','3500.00');
insert  into `facturadet`(`idfacturadet`,`idfacturaenc`,`descripcion`,`monto`) values (9,3,'Servidor VPS Linode','1500.00');

/*Table structure for table `facturaenc` */

DROP TABLE IF EXISTS `facturaenc`;

CREATE TABLE `facturaenc` (
  `idfacturaenc` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL,
  `nro_factura` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `detalle` varchar(250) DEFAULT NULL,
  `status` char(1) DEFAULT 'N',
  PRIMARY KEY (`idfacturaenc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `facturaenc` */

insert  into `facturaenc`(`idfacturaenc`,`idcliente`,`nro_factura`,`fecha`,`detalle`,`status`) values (1,5,'001-123456','2013-07-24','aaaaabbbbb','N');
insert  into `facturaenc`(`idfacturaenc`,`idcliente`,`nro_factura`,`fecha`,`detalle`,`status`) values (2,2,'sdfsdfsdfs','2013-07-17','dsfgdsfg nsdfsdfsdfsd','N');
insert  into `facturaenc`(`idfacturaenc`,`idcliente`,`nro_factura`,`fecha`,`detalle`,`status`) values (3,1,'ddddddd','2013-07-17','eeeeeee','N');

/*Table structure for table `mensajes` */

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) CHARACTER SET utf8 NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `mensaje` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `mensajes` */

insert  into `mensajes`(`id`,`nombre`,`fecha`,`mensaje`) values (1,'Roxana','2013-12-25 11:59:00','Hola Mundo');
insert  into `mensajes`(`id`,`nombre`,`fecha`,`mensaje`) values (2,'Mery','2013-06-01 12:00:00','Donde esta peter?');
insert  into `mensajes`(`id`,`nombre`,`fecha`,`mensaje`) values (3,'Peter','2013-06-01 09:00:00','Hola Roxana');
insert  into `mensajes`(`id`,`nombre`,`fecha`,`mensaje`) values (4,'Roxana','2013-06-04 22:31:45','ggggg');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`usuario`,`password`,`nombres`,`correo`) values (2,'luisa','b338ce0d22f0bb9d6bd99aaa29c36c3e','Luisa Lein','luisa@gmail.com');
insert  into `usuario`(`id`,`usuario`,`password`,`nombres`,`correo`) values (4,'milagros','3722ff9c61e5eca0e0e05bb3684a9304','Milagros Gladysita','mila@gmail.com');
insert  into `usuario`(`id`,`usuario`,`password`,`nombres`,`correo`) values (6,'roxana','848df9bb06c02a5023fb1576577ed1da','Roxana','roxana@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
