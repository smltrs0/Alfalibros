SET FOREIGN_KEY_CHECKS = 0;
CREATE DATABASE IF NOT EXISTS `alfalibros`;
USE `alfalibros`;

DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `autor` text NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `autor` VALUES("1", "Oscar Ruiz"); 
INSERT INTO `autor` VALUES("2", "Kledany Barzola"); 
INSERT INTO `autor` VALUES("3", "Nuevo Autor"); 
INSERT INTO `autor` VALUES("4", "Samuel Trias"); 
INSERT INTO `autor` VALUES("5", "Dan Brown"); 
INSERT INTO `autor` VALUES("6", "Zuzane Collins"); 
INSERT INTO `autor` VALUES("7", "Victoria Aveyard"); 


DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE `categoria_libro` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `categoria_libro` VALUES("1", "Historia"); 
INSERT INTO `categoria_libro` VALUES("2", "Novela de terror"); 
INSERT INTO `categoria_libro` VALUES("3", "Novela erótica"); 
INSERT INTO `categoria_libro` VALUES("4", "Ciencia ficción"); 
INSERT INTO `categoria_libro` VALUES("5", "Novela romántica"); 
INSERT INTO `categoria_libro` VALUES("6", " Novela negra"); 
INSERT INTO `categoria_libro` VALUES("7", " Novela histórica"); 
INSERT INTO `categoria_libro` VALUES("8", "Biografías"); 
INSERT INTO `categoria_libro` VALUES("9", " Libros de autoayuda"); 
INSERT INTO `categoria_libro` VALUES("10", "Libros de poesía"); 
INSERT INTO `categoria_libro` VALUES("11", "Literatura infantil"); 
INSERT INTO `categoria_libro` VALUES("13", "neww"); 


DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_de_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `datos_personales` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_tipo_de_documento` (`id_tipo_de_documento`),
  KEY `datos_personales` (`datos_personales`),
  CONSTRAINT `FK_id_tipo_de_documento` FOREIGN KEY (`id_tipo_de_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `cliente` VALUES("10", "1", "27486197", "Mariangelis", "Escobar", "Un lugar muy muy lejano", "", "0"); 


DROP TABLE IF EXISTS `datos_personales`;
CREATE TABLE `datos_personales` (
  `id_datos_personales` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_datos_personales`),
  UNIQUE KEY `documento` (`documento`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `datos_personales` VALUES("1", "Oscar", "Ruiz", "1", "25695517", "+584127969795", "Urb. La Paragua"); 
INSERT INTO `datos_personales` VALUES("2", "Kledany", "Barzola", "1", "25695518", "+584120890503", "Urb."); 
INSERT INTO `datos_personales` VALUES("3", "Samuel", "Trias", "1", "24186725", "", "Marhuanta"); 
INSERT INTO `datos_personales` VALUES("4", "Saul", "Yanave", "1", "21333222", "+584127969795", "Urbanización..."); 
INSERT INTO `datos_personales` VALUES("5", "Mariangelis", "Escobar", "1", "27486197", "", "Un lugar muy muy lejano"); 


DROP TABLE IF EXISTS `detalles_factura`;
CREATE TABLE `detalles_factura` (
  `id_detalles` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_factura` int(11) NOT NULL,
  PRIMARY KEY (`id_detalles`),
  KEY `id_producto` (`id_producto`),
  KEY `id_detalles_factura` (`id_factura`),
  CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `libro` (`id_libro`) ON UPDATE CASCADE,
  CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO `detalles_factura` VALUES("35", "3", "1", "463", "53"); 
INSERT INTO `detalles_factura` VALUES("36", "5", "1", "730", "53"); 
INSERT INTO `detalles_factura` VALUES("37", "8", "1", "870", "53"); 


DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `cod_formapago` int(11) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `IVA` float DEFAULT NULL,
  `total_factura` float DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `ref_cli_idx` (`id_cliente`),
  KEY `ref_formapago_idx` (`cod_formapago`),
  CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `ref_formapago` FOREIGN KEY (`cod_formapago`) REFERENCES `forma_de_pago` (`id_formapago`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

INSERT INTO `factura` VALUES("53", "10", "1", "2019-11-26", "", "2063"); 


DROP TABLE IF EXISTS `finanzas`;
CREATE TABLE `finanzas` (
  `id_finanzas` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` float NOT NULL,
  `salida` float NOT NULL DEFAULT '0',
  `activos` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_finanzas`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO `finanzas` VALUES("29", "161.28", "0", "161000", "2019-08-28"); 
INSERT INTO `finanzas` VALUES("30", "604.8", "0", "76006.1", "2019-07-28"); 
INSERT INTO `finanzas` VALUES("31", "201.6", "0", "96007.7", "2019-06-28"); 
INSERT INTO `finanzas` VALUES("32", "57133.4", "0", "58101.1", "2019-05-28"); 
INSERT INTO `finanzas` VALUES("33", "1048.32", "0", "59149.4", "2019-04-28"); 
INSERT INTO `finanzas` VALUES("34", "134.4", "0", "59283.8", "2019-03-28"); 
INSERT INTO `finanzas` VALUES("35", "725.76", "0", "60009.6", "2019-02-28"); 
INSERT INTO `finanzas` VALUES("36", "15382.1", "0", "75391.7", "2019-01-28"); 
INSERT INTO `finanzas` VALUES("37", "13.44", "0", "75405.1", "2019-10-06"); 


DROP TABLE IF EXISTS `forma_de_pago`;
CREATE TABLE `forma_de_pago` (
  `id_formapago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_formapago` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_formapago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `forma_de_pago` VALUES("1", "EFECTIVO"); 
INSERT INTO `forma_de_pago` VALUES("2", "TARJETA DE CREDITO"); 
INSERT INTO `forma_de_pago` VALUES("3", "CHEQUE"); 
INSERT INTO `forma_de_pago` VALUES("4", "TARJETA DE DEBITO"); 


DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `cantidad` int(255) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `sinopsis` text,
  PRIMARY KEY (`id_libro`),
  KEY `fk_id_autor` (`id_autor`),
  KEY `fk_id_categoria` (`id_categoria`),
  CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_libro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `libro` VALUES("3", "Pablo escobar Mi padre", "6", "1", "2017-09-28", "100", "463", "uploaded_files/img_books/2.jpg", "Pasaron más de veinte años."); 
INSERT INTO `libro` VALUES("5", "La reina roja", "7", "4", "2019-01-21", "57", "730", "uploaded_files/img_books/1.jpg", "Alerta de spoilers! La protagonista tiene poderes que nadie sabia y es de sangre roja pero con poderes plateados..."); 
INSERT INTO `libro` VALUES("8", "Prueba img", "2", "2", "2018-11-30", "87", "870", "", "prueba"); 
INSERT INTO `libro` VALUES("9", "prueba", "3", "2", "2017-10-29", "11", "911", "uploaded_files/img_books/mbiopb90k4evsb1gwh0a.jpeg", "prueba"); 


DROP TABLE IF EXISTS `pregunta_de_seguridad`;
CREATE TABLE `pregunta_de_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `pregunta_de_seguridad` VALUES("1", "Nombre de mi mejor amigo"); 
INSERT INTO `pregunta_de_seguridad` VALUES("2", "Lugar de nacimiento"); 
INSERT INTO `pregunta_de_seguridad` VALUES("3", "Nombre de mi mascota"); 
INSERT INTO `pregunta_de_seguridad` VALUES("4", "Lugar de nacimiento de mi madre"); 
INSERT INTO `pregunta_de_seguridad` VALUES("5", "Nombre de mi primer colegio"); 


DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_comercial` varchar(20) CHARACTER SET latin1 NOT NULL,
  `datos_personales` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_datos_personales` (`datos_personales`),
  CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`datos_personales`) REFERENCES `datos_personales` (`id_datos_personales`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `proveedor` VALUES("12", "kledany company", "2"); 


DROP TABLE IF EXISTS `tipo_de_documento`;
CREATE TABLE `tipo_de_documento` (
  `id_tipo_de_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_de_documento` varchar(15) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_tipo_de_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tipo_de_documento` VALUES("1", "Cedula"); 
INSERT INTO `tipo_de_documento` VALUES("2", "Rif Personal"); 
INSERT INTO `tipo_de_documento` VALUES("3", "Pasaporte"); 


DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `user_level` VALUES("1", "Administrador"); 
INSERT INTO `user_level` VALUES("2", "Trabajador"); 
INSERT INTO `user_level` VALUES("3", "Inactivo"); 


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `cedula` int(11) NOT NULL,
  `username` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cargo` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `respuesta` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`cargo`),
  KEY `pregunta` (`pregunta`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`pregunta`) REFERENCES `pregunta_de_seguridad` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` VALUES("3", "samuel", "Trias", "242", "smltrs0", "smltrs0@gmail.com", "63a9f0ea7bb98050796b649e85481845", "1", "1", "xsd", "1465291631.jpg"); 
INSERT INTO `usuarios` VALUES("4", "oscar", "Ruiz", "21333222", "oscar", "oscar@gmail.com", "63a9f0ea7bb98050796b649e85481845", "2", "2", "venezuela", "855752469.jpg"); 
INSERT INTO `usuarios` VALUES("5", "test", "test", "2122228947", "test", "test@test.com", "63a9f0ea7bb98050796b649e85481845", "3", "1", "test", ""); 
SET FOREIGN_KEY_CHECKS = 1;