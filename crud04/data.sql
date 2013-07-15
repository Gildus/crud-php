CREATE DATABASE  `dbejemplo`;

USE `dbejemplo`;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `usuario` VALUES (1,'roxana','roxana123','Roxana','roxana@gmail.com'),(2,'luisa','luisa123','Luisa','luisa@gmail.com');

