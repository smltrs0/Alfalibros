-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2019 at 06:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfalibros`
--

-- --------------------------------------------------------

--
-- Table structure for table `abastecer`
--

CREATE TABLE `abastecer` (
  `id_abastecer` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abastecer`
--

INSERT INTO `abastecer` (`id_abastecer`, `id_libro`, `cantidad`, `id_proveedor`, `fecha_entrada`) VALUES
(2, 5, 2, 12, '2019-11-27 12:48:14'),
(6, 8, 10, 12, '2019-11-28 08:35:34'),
(7, 9, 10, 12, '2019-11-28 08:38:12'),
(8, 9, 50, 12, '2019-11-28 08:40:26'),
(9, 8, 5, 12, '2019-11-28 08:44:01'),
(10, 8, 10, 12, '2019-11-28 08:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `autor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id_autor`, `autor`) VALUES
(1, 'Oscar Ruiz'),
(2, 'Kledany Barzola'),
(3, 'Nuevo Autor'),
(4, 'Samuel Trias'),
(5, 'Dan Brown'),
(6, 'Zuzane Collins'),
(7, 'Victoria Aveyard');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_libro`
--

CREATE TABLE `categoria_libro` (
  `id_categoria` int(11) NOT NULL,
  `categoria` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_libro`
--

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
(13, 'neww');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `datos_personales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `datos_personales`) VALUES
(10, 5),
(11, 22),
(13, 24),
(14, 25),
(15, 26),
(16, 27);

-- --------------------------------------------------------

--
-- Table structure for table `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_datos_personales` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datos_personales`
--

INSERT INTO `datos_personales` (`id_datos_personales`, `nombre`, `apellido`, `id_tipo_documento`, `documento`, `telefono`, `direccion`) VALUES
(1, 'Oscar', 'Ruiz', 1, '25695517', '+584127969795', 'Urb. La Paragua'),
(2, 'Kledany', 'Barzola', 1, 'V121867257', '+584120890503', 'Urb.'),
(4, 'Saul', 'Yanave', 1, '21333222', '+584127969795', 'Urbanización...'),
(5, 'Mariangelis', 'Escobar', 1, 'V27486197', '', 'Un lugar muy muy lejano'),
(22, 'Samuel', 'Trias', 1, 'V24186725', '+584127969795', 'El fin del mundo'),
(24, 'Cristian', 'Hernandez', 1, 'V992893333', '', 'Donde no llega el agua'),
(25, 'Saul', 'Yanave', 1, 'V324948844', '', 'Un lugar donde siempre atracan'),
(26, 'Angelo ', 'Amaro', 1, 'V23434567', '', 'marhuanta'),
(27, 'Ivan', 'Ascanio', 1, 'V255443255', '', 'El poso del cura');

-- --------------------------------------------------------

--
-- Table structure for table `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_detalles` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalles_factura`
--

INSERT INTO `detalles_factura` (`id_detalles`, `id_producto`, `cantidad`, `precio`, `id_factura`) VALUES
(35, 3, 1, '463', 53),
(36, 5, 1, '730', 53),
(37, 8, 1, '870', 53),
(38, 3, 2, '463', 54),
(39, 9, 1, '911', 55),
(40, 8, 7, '870', 55),
(41, 3, 3, '463', 56),
(42, 5, 1, '730', 56),
(43, 8, 1, '870', 57),
(44, 9, 1, '911', 57),
(45, 9, 4, '911', 58),
(46, 3, 1, '660', 59),
(47, 5, 1, '730', 59),
(48, 8, 1, '870', 59),
(49, 9, 1, '911', 59),
(50, 8, 5, '871', 60),
(51, 8, 1, '871', 61),
(52, 5, 3, '730', 62),
(53, 3, 4, '660', 63);

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cod_formapago` int(11) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `IVA` float DEFAULT NULL,
  `total_factura` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `cod_formapago`, `fecha_facturacion`, `IVA`, `total_factura`) VALUES
(53, 10, 1, '2019-01-26', NULL, 2),
(54, 11, 1, '2019-02-28', NULL, 926),
(55, 11, 4, '2019-04-28', NULL, 7001),
(56, 13, 1, '2019-10-28', NULL, 2119),
(57, 14, 1, '2019-11-28', NULL, 1781),
(58, 15, 2, '2019-11-28', NULL, 3644),
(59, 16, 3, '2019-11-29', NULL, 3171),
(60, 16, 1, '2019-11-29', NULL, 4355),
(61, 14, 2, '2019-11-29', NULL, 871),
(62, 13, 3, '2019-11-29', NULL, 2190),
(63, 11, 1, '2019-11-29', NULL, 2640);

-- --------------------------------------------------------

--
-- Table structure for table `forma_de_pago`
--

CREATE TABLE `forma_de_pago` (
  `id_formapago` int(11) NOT NULL,
  `descripcion_formapago` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forma_de_pago`
--

INSERT INTO `forma_de_pago` (`id_formapago`, `descripcion_formapago`) VALUES
(1, 'EFECTIVO'),
(2, 'TARJETA DE CREDITO'),
(3, 'CHEQUE'),
(4, 'TARJETA DE DEBITO');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `cantidad` int(255) NOT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `ISBN` varchar(50) NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `sinopsis` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `id_autor`, `id_categoria`, `fecha_lanzamiento`, `cantidad`, `precio`, `ISBN`, `paginas`, `ruta_imagen`, `sinopsis`) VALUES
(3, 'Pablo escobar Mi padre', 4, 1, '2017-09-28', 137, '660', '', 0, '2.jpg', 'Pasaron más de veinte años.'),
(5, 'La reina roja', 7, 4, '2019-01-21', 8, '730', '', 0, '1.jpg', '730'),
(8, 'Prueba existente sin imagen de portada', 7, 13, '2018-11-30', 19, '8', '', 0, NULL, 'Prueba existente sin imagen de portada'),
(9, 'prueba', 3, 2, '2017-10-29', 152, '911', '', 0, 'mbiopb90k4evsb1gwh0a.jpeg', 'prueba'),
(17, 'Prueba sin existencia y sin imagen', 2, 1, '2016-12-31', 0, '1', 'testisbn23142', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta_de_seguridad`
--

CREATE TABLE `pregunta_de_seguridad` (
  `id` int(11) NOT NULL,
  `pregunta` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pregunta_de_seguridad`
--

INSERT INTO `pregunta_de_seguridad` (`id`, `pregunta`) VALUES
(1, 'Nombre de mi mejor amigo'),
(2, 'Lugar de nacimiento'),
(3, 'Nombre de mi mascota'),
(4, 'Lugar de nacimiento de mi madre'),
(5, 'Nombre de mi primer colegio');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(255) NOT NULL,
  `nombre_comercial` varchar(20) CHARACTER SET latin1 NOT NULL,
  `datos_personales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre_comercial`, `datos_personales`) VALUES
(12, 'kledany company', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo_de_documento` int(11) NOT NULL,
  `tipo_de_documento` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_tipo_de_documento`, `tipo_de_documento`) VALUES
(1, 'Cedula'),
(2, 'Rif Personal'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `level` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `level`) VALUES
(1, 'Administrador'),
(2, 'Trabajador'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `cedula` int(11) NOT NULL,
  `username` text CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cargo` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `respuesta` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `username`, `email`, `clave`, `cargo`, `pregunta`, `respuesta`, `image`) VALUES
(3, 'Samuel', 'Trias', 242, 'smltrs0', 'smltrs0@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1, 1, 'xsd', '1465291631.jpg'),
(7, 'admin', 'admin', 1111111, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecer`
--
ALTER TABLE `abastecer`
  ADD PRIMARY KEY (`id_abastecer`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `categoria_libro`
--
ALTER TABLE `categoria_libro`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_personales` (`datos_personales`);

--
-- Indexes for table `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_datos_personales`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD KEY `id_tipo_documento` (`id_tipo_documento`);

--
-- Indexes for table `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id_detalles`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_detalles_factura` (`id_factura`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `ref_cli_idx` (`id_cliente`),
  ADD KEY `ref_formapago_idx` (`cod_formapago`);

--
-- Indexes for table `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD PRIMARY KEY (`id_formapago`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `fk_id_autor` (`id_autor`),
  ADD KEY `fk_id_categoria` (`id_categoria`);

--
-- Indexes for table `pregunta_de_seguridad`
--
ALTER TABLE `pregunta_de_seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datos_personales` (`datos_personales`);

--
-- Indexes for table `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`id_tipo_de_documento`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`cargo`),
  ADD KEY `pregunta` (`pregunta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecer`
--
ALTER TABLE `abastecer`
  MODIFY `id_abastecer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  MODIFY `id_formapago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pregunta_de_seguridad`
--
ALTER TABLE `pregunta_de_seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  MODIFY `id_tipo_de_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abastecer`
--
ALTER TABLE `abastecer`
  ADD CONSTRAINT `abastecer_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`),
  ADD CONSTRAINT `abastecer_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`datos_personales`) REFERENCES `datos_personales` (`id_datos_personales`);

--
-- Constraints for table `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON UPDATE CASCADE;

--
-- Constraints for table `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `libro` (`id_libro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON UPDATE CASCADE;

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_formapago` FOREIGN KEY (`cod_formapago`) REFERENCES `forma_de_pago` (`id_formapago`) ON UPDATE CASCADE;

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_libro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`datos_personales`) REFERENCES `datos_personales` (`id_datos_personales`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`pregunta`) REFERENCES `pregunta_de_seguridad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
