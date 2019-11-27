-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 01:31 PM
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
(6, 'Zuzane Collins');

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
  `id_tipo_de_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `apellido` text CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `id_tipo_de_documento`, `documento`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 1, 25695517, 'Oscar', 'Ruiz', 'Urb. La Paragua', '+584127969795'),
(2, 1, 25695518, 'Kledany', 'Barzola', 'Urb. La Paragua', '+584120890503'),
(4, 1, 24186725, 'Samuel', 'Trias', 'Marhuanta', ''),
(5, 1, 21333222, 'Saul', 'Yanave', 'Urbanización...', '+584127969795'),
(10, 1, 27486197, 'Mariangelis', 'Escobar', 'Su casa', '');

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
(18, 3, 2, '12', 45),
(19, 8, 4, '54', 45),
(20, 3, 3, '12', 46),
(21, 9, 1, '98', 46),
(22, 5, 1, '65', 46),
(23, 8, 1, '54', 46),
(24, 3, 1, '12', 47),
(25, 5, 2, '65', 47),
(26, 3, 1, '12', 48),
(27, 5, 1, '65', 48),
(28, 8, 4, '54', 48),
(29, 3, 1, '12', 49),
(30, 5, 1, '65', 49);

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
(45, 1, 2, '2019-11-18', NULL, NULL),
(46, 4, 3, '2019-11-18', NULL, NULL),
(47, 4, 1, '2013-01-02', NULL, NULL),
(48, 10, 1, '2013-01-01', NULL, NULL),
(49, 1, 1, '2013-01-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `finanzas`
--

CREATE TABLE `finanzas` (
  `id_finanzas` int(11) NOT NULL,
  `entrada` float NOT NULL,
  `salida` float NOT NULL DEFAULT '0',
  `activos` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finanzas`
--

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
-- Table structure for table `info_libro`
--

CREATE TABLE `info_libro` (
  `id_info_libro` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `ruta_imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info_libro`
--

INSERT INTO `info_libro` (`id_info_libro`, `id_libro`, `cantidad`, `precio`, `ruta_imagen`) VALUES
(1, 3, 669, 12, 'uploaded_files/img_books/2.jpg'),
(2, 5, 50, 59, 'uploaded_files/img_books/1.jpg'),
(3, 8, 657, 54, NULL),
(4, 9, 86, 98, 'uploaded_files/img_books/mbiopb90k4evsb1gwh0a.jpeg');

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
  `sinopsis` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `id_autor`, `id_categoria`, `fecha_lanzamiento`, `sinopsis`) VALUES
(3, 'Pablo escobar Mi padre', 4, 3, '2017-09-28', 'Pasaron más de veinte años.'),
(4, 'Inferno', 5, 3, '2017-10-29', 'awefaw'),
(5, 'La reina roja', 4, 2, '2019-01-21', 'La reina roja no es mas que'),
(8, 'Prueba img', 2, 2, '2018-11-30', 'prueba'),
(9, 'prueba', 3, 2, '2017-10-29', 'prueba');

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
  `cod_tipo_documento` int(11) NOT NULL,
  `nombre` varchar(20) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(20) CHARACTER SET latin1 NOT NULL,
  `documento` int(20) NOT NULL,
  `nombre_comercial` varchar(20) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` varchar(15) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `cod_tipo_documento`, `nombre`, `apellido`, `documento`, `nombre_comercial`, `direccion`, `telefono`) VALUES
(7, 2, 'testsss', 'test', 21319, 'test', 'San José', '+584127969795');

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
(3, 'samuel', 'Trias', 242, 'smltrs0', 'smltrs0@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1, 1, 'xsd', '9.jpg'),
(4, 'oscar', 'Ruiz', 21333222, 'oscar', 'oscar@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1, 2, 'd', '855752469.jpg'),
(5, 'test', 'test', 2122228947, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, 1, 'test', '');

--
-- Indexes for dumped tables
--

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
  ADD KEY `FK_id_tipo_de_documento` (`id_tipo_de_documento`);

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
-- Indexes for table `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id_finanzas`);

--
-- Indexes for table `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD PRIMARY KEY (`id_formapago`);

--
-- Indexes for table `info_libro`
--
ALTER TABLE `info_libro`
  ADD PRIMARY KEY (`id_info_libro`),
  ADD KEY `fk_id_libro` (`id_libro`);

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
  ADD KEY `proveedor_ibfk_1` (`cod_tipo_documento`);

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
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id_finanzas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  MODIFY `id_formapago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info_libro`
--
ALTER TABLE `info_libro`
  MODIFY `id_info_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pregunta_de_seguridad`
--
ALTER TABLE `pregunta_de_seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_id_tipo_de_documento` FOREIGN KEY (`id_tipo_de_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON UPDATE CASCADE;

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
-- Constraints for table `info_libro`
--
ALTER TABLE `info_libro`
  ADD CONSTRAINT `fk_id_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`cod_tipo_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

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
