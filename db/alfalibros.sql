-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para alfalibros
DROP DATABASE IF EXISTS `alfalibros`;
CREATE DATABASE IF NOT EXISTS `alfalibros` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alfalibros`;

-- Volcando estructura para tabla alfalibros.autor
DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alfalibros.autor: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` (`id_autor`, `autor`) VALUES
	(1, 'Oscar Ruiz'),
	(2, 'Kledany Barzola'),
	(3, 'Nuevo Autor'),
	(4, 'Samuel Trias'),
	(5, 'Dan Brown'),
	(6, 'Zuzane Collins'),
	(7, 'Otro autor'),
	(8, 'autor'),
	(9, 'prueba nueva clase'),
	(10, 'prueba nueva clase'),
	(11, 'ejemplo');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.categoria_libro
DROP TABLE IF EXISTS `categoria_libro`;
CREATE TABLE IF NOT EXISTS `categoria_libro` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.categoria_libro: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_libro` DISABLE KEYS */;
INSERT INTO `categoria_libro` (`id_categoria`, `categoria`) VALUES
	(1, 'Historia'),
	(2, 'Novela de terror'),
	(3, 'Novela erótica'),
	(4, 'Ciencia ficción'),
	(5, 'Novela romántica'),
	(6, ' Novela negra'),
	(7, ' Novela histórica'),
	(8, 'Biografías'),
	(9, ' Libros de autoayuda'),
	(10, 'Libros de poesía'),
	(11, 'Literatura infantil'),
	(12, 'prueba nueva clase');
/*!40000 ALTER TABLE `categoria_libro` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_de_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_tipo_de_documento` (`id_tipo_de_documento`),
  CONSTRAINT `FK_id_tipo_de_documento` FOREIGN KEY (`id_tipo_de_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.cliente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `id_tipo_de_documento`, `documento`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
	(1, 1, 25695517, 'Oscar', 'Ruiz', 'Urb. La Paragua', '+584127969795'),
	(2, 1, 25695518, 'Kledany', 'Barzola', 'Urb. La Paragua', '+584120890503'),
	(3, 1, 123456789, 'Prueba', 'Prueba', 'Prueba', '+584648519');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.factura
DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `cod_formapago` int(11) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `IVA` float DEFAULT NULL,
  `total_factura` float DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `ref_cli_idx` (`id_cliente`),
  KEY `ref_formapago_idx` (`cod_formapago`),
  CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ref_formapago` FOREIGN KEY (`cod_formapago`) REFERENCES `forma_de_pago` (`id_formapago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.factura: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`id_factura`, `id_cliente`, `cod_formapago`, `fecha_facturacion`, `IVA`, `total_factura`) VALUES
	(29, 2, 1, '2019-08-28', 17.28, 161.28),
	(30, 2, 2, '2019-08-28', 64.8, 604.8),
	(31, 1, 1, '2019-08-28', 21.6, 201.6),
	(32, 2, 2, '2019-08-28', 6121.44, 57133.4),
	(33, 3, 2, '2019-08-28', 112.32, 1048.32),
	(34, 2, 2, '2019-08-28', 14.4, 134.4),
	(35, 1, 2, '2019-08-28', 77.76, 725.76),
	(36, 2, 1, '2019-08-28', 1648.08, 15382.1),
	(37, 1, 1, '2019-10-06', 1.44, 13.44);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.finanzas
DROP TABLE IF EXISTS `finanzas`;
CREATE TABLE IF NOT EXISTS `finanzas` (
  `id_finanzas` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` float NOT NULL,
  `salida` float NOT NULL DEFAULT '0',
  `activos` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_finanzas`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.finanzas: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `finanzas` DISABLE KEYS */;
INSERT INTO `finanzas` (`id_finanzas`, `entrada`, `salida`, `activos`, `fecha`) VALUES
	(29, 161.28, 0, 161000, '2019-08-28'),
	(30, 604.8, 0, 76006.1, '2019-07-28'),
	(31, 201.6, 0, 96007.7, '2019-06-28'),
	(32, 57133.4, 0, 58101.1, '2019-05-28'),
	(33, 1048.32, 0, 59149.4, '2019-04-28'),
	(34, 134.4, 0, 59283.8, '2019-03-28'),
	(35, 725.76, 0, 60009.6, '2019-02-28'),
	(36, 15382.1, 0, 75391.7, '2019-01-28'),
	(37, 13.44, 0, 75405.1, '2019-10-06');
/*!40000 ALTER TABLE `finanzas` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.forma_de_pago
DROP TABLE IF EXISTS `forma_de_pago`;
CREATE TABLE IF NOT EXISTS `forma_de_pago` (
  `id_formapago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_formapago` varchar(20) NOT NULL,
  PRIMARY KEY (`id_formapago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.forma_de_pago: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `forma_de_pago` DISABLE KEYS */;
INSERT INTO `forma_de_pago` (`id_formapago`, `descripcion_formapago`) VALUES
	(1, 'EFECTIVO'),
	(2, 'TARJETA DE CREDITO'),
	(3, 'CHEQUE'),
	(4, 'TARJETA DE DEBITO');
/*!40000 ALTER TABLE `forma_de_pago` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.info_libro
DROP TABLE IF EXISTS `info_libro`;
CREATE TABLE IF NOT EXISTS `info_libro` (
  `id_info_libro` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `ruta_imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_info_libro`),
  KEY `fk_id_libro` (`id_libro`),
  CONSTRAINT `fk_id_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alfalibros.info_libro: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `info_libro` DISABLE KEYS */;
INSERT INTO `info_libro` (`id_info_libro`, `id_libro`, `cantidad`, `precio`, `ruta_imagen`) VALUES
	(1, 3, 669, 12, NULL),
	(2, 5, 98451, 65, NULL),
	(3, 8, 657, 54, NULL),
	(4, 9, 6486, 98, 'uploaded_files/img_books/vyniurqdu3oqjasqwcmb.jpeg');
/*!40000 ALTER TABLE `info_libro` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.libro
DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `sinopsis` text,
  PRIMARY KEY (`id_libro`),
  KEY `fk_id_autor` (`id_autor`),
  KEY `fk_id_categoria` (`id_categoria`),
  CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_libro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla alfalibros.libro: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` (`id_libro`, `titulo`, `id_autor`, `id_categoria`, `fecha_lanzamiento`, `sinopsis`) VALUES
	(1, 'Prueba', 4, 3, '2018-11-29', 'Esta es una sinopsis'),
	(2, 'Otro libro', 2, 4, '2018-10-29', 'otra sinopsis'),
	(3, 'Prueba sin imagen', 4, 3, '2017-09-28', 'Prueba'),
	(4, 'Inferno', 5, 3, '2017-10-29', 'awefaw'),
	(5, 'Inferno', 1, 9, '2020-02-02', 'ASDFASDF'),
	(6, 'Prueba con imn', 2, 2, '2018-11-30', 'prueba con imagen'),
	(7, 'Prueba con imn', 2, 2, '2018-11-30', 'prueba con imagen'),
	(8, 'Prueba img', 2, 2, '2018-11-30', 'prueba'),
	(9, 'prueba', 3, 2, '2017-10-29', 'prueba');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.pregunta_de_seguridad
DROP TABLE IF EXISTS `pregunta_de_seguridad`;
CREATE TABLE IF NOT EXISTS `pregunta_de_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.pregunta_de_seguridad: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `pregunta_de_seguridad` DISABLE KEYS */;
INSERT INTO `pregunta_de_seguridad` (`id`, `pregunta`) VALUES
	(1, 'Nombre de mi mejor amigo'),
	(2, 'Lugar de nacimiento'),
	(3, 'Nombre de mi mascota'),
	(4, 'Lugar de nacimiento de mi madre'),
	(5, 'Nombre de mi primer colegio');
/*!40000 ALTER TABLE `pregunta_de_seguridad` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.proveedor
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cod_tipo_documento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nombre_comercial` varchar(20) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedor_ibfk_1` (`cod_tipo_documento`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`cod_tipo_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.tipo_de_documento
DROP TABLE IF EXISTS `tipo_de_documento`;
CREATE TABLE IF NOT EXISTS `tipo_de_documento` (
  `id_tipo_de_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_de_documento` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tipo_de_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.tipo_de_documento: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_de_documento` DISABLE KEYS */;
INSERT INTO `tipo_de_documento` (`id_tipo_de_documento`, `tipo_de_documento`) VALUES
	(1, 'Cedula'),
	(2, 'Rif Personal'),
	(3, 'Pasaporte');
/*!40000 ALTER TABLE `tipo_de_documento` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.user_level
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.user_level: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id_user_level`, `level`) VALUES
	(1, 'Administrador'),
	(2, 'Encargado'),
	(3, 'Inactivo');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta_pregunta` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`cargo`),
  KEY `FK2_id_pregunta` (`id_pregunta`),
  CONSTRAINT `FK2_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta_de_seguridad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `username`, `email`, `clave`, `id_pregunta`, `respuesta_pregunta`, `cargo`, `image`) VALUES
	(2, 'samuel', 'trias', 'smltrs', 'smltrs0@gmail.com', '0d7363894acdee742caf7fe4e97c4d49', 2, 1, 1, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla alfalibros.venta
DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id_factura` int(11) NOT NULL,
  `id_info_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  KEY `FK_id_info_libro` (`id_info_libro`),
  KEY `FK_id_factura` (`id_factura`),
  CONSTRAINT `FK_id_factura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_info_libro` FOREIGN KEY (`id_info_libro`) REFERENCES `info_libro` (`id_info_libro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla alfalibros.venta: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id_factura`, `id_info_libro`, `cantidad`, `total`) VALUES
	(29, 1, 12, 144),
	(30, 1, 45, 540),
	(31, 1, 15, 180),
	(32, 2, 78, 51012),
	(33, 1, 78, 936),
	(34, 1, 10, 120),
	(35, 1, 54, 648),
	(36, 2, 21, 13734),
	(37, 1, 1, 12);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
