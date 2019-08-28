-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2019 a las 18:02:41
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfalibros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_libro`
--

CREATE TABLE `categoria_libro` (
  `id_categoria` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_libro`
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
(12, 'prueba nueva clase');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `id_tipo_de_documento` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `id_tipo_de_documento`, `documento`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 1, 25695517, 'Oscar', 'Ruiz', 'Urb. La Paragua', '+584127969795'),
(2, 1, 25695518, 'Kledany', 'Barzola', 'Urb. La Paragua', '+584120890503'),
(3, 1, 123456789, 'Prueba', 'Prueba', 'Prueba', '+584648519');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cod_formapago` int(11) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `IVA` float DEFAULT NULL,
  `total_factura` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `cod_formapago`, `fecha_facturacion`, `IVA`, `total_factura`) VALUES
(29, 2, 1, '2019-08-28', 17.28, 161.28),
(30, 2, 2, '2019-08-28', 64.8, 604.8),
(31, 1, 1, '2019-08-28', 21.6, 201.6),
(32, 2, 2, '2019-08-28', 6121.44, 57133.4),
(33, 3, 2, '2019-08-28', 112.32, 1048.32),
(34, 2, 2, '2019-08-28', 14.4, 134.4),
(35, 1, 2, '2019-08-28', 77.76, 725.76),
(36, 2, 1, '2019-08-28', 1648.08, 15382.1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finanzas`
--

CREATE TABLE `finanzas` (
  `id_finanzas` int(11) NOT NULL,
  `entrada` float NOT NULL,
  `salida` float NOT NULL DEFAULT '0',
  `activos` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `finanzas`
--

INSERT INTO `finanzas` (`id_finanzas`, `entrada`, `salida`, `activos`, `fecha`) VALUES
(29, 161.28, 0, 161000, '2019-08-28'),
(30, 604.8, 0, 76006.1, '2019-07-28'),
(31, 201.6, 0, 96007.7, '2019-06-28'),
(32, 57133.4, 0, 58101.1, '2019-05-28'),
(33, 1048.32, 0, 59149.4, '2019-04-28'),
(34, 134.4, 0, 59283.8, '2019-03-28'),
(35, 725.76, 0, 60009.6, '2019-02-28'),
(36, 15382.1, 0, 75391.7, '2019-01-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_de_pago`
--

CREATE TABLE `forma_de_pago` (
  `id_formapago` int(11) NOT NULL,
  `descripcion_formapago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `forma_de_pago`
--

INSERT INTO `forma_de_pago` (`id_formapago`, `descripcion_formapago`) VALUES
(1, 'EFECTIVO'),
(2, 'TARJETA DE CREDITO'),
(3, 'CHEQUE'),
(4, 'TARJETA DE DEBITO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_libro`
--

CREATE TABLE `info_libro` (
  `id_info_libro` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `ruta_imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_libro`
--

INSERT INTO `info_libro` (`id_info_libro`, `id_libro`, `cantidad`, `precio`, `ruta_imagen`) VALUES
(1, 3, 670, 12, NULL),
(2, 5, 98451, 654, NULL),
(3, 8, 657, 654, NULL),
(4, 9, 6486, 654684, 'uploaded_files/img_books/vyniurqdu3oqjasqwcmb.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `sinopsis` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_de_seguridad`
--

CREATE TABLE `pregunta_de_seguridad` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta_de_seguridad`
--

INSERT INTO `pregunta_de_seguridad` (`id`, `pregunta`) VALUES
(1, 'Nombre de mi mejor amigo'),
(2, 'Lugar de nacimiento'),
(3, 'Nombre de mi mascota'),
(4, 'Lugar de nacimiento de mi madre'),
(5, 'Nombre de mi primer colegio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(255) NOT NULL,
  `cod_tipo_documento` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `nombre_comercial` varchar(20) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo_de_documento` int(11) NOT NULL,
  `tipo_de_documento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_documento`
--

INSERT INTO `tipo_de_documento` (`id_tipo_de_documento`, `tipo_de_documento`) VALUES
(1, 'Cedula'),
(2, 'Rif Personal'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `level`) VALUES
(1, 'Administrador'),
(2, 'Encargado'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta_pregunta` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `ruta_imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_factura` int(11) NOT NULL,
  `id_info_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_factura`, `id_info_libro`, `cantidad`, `total`) VALUES
(29, 1, 12, 144),
(30, 1, 45, 540),
(31, 1, 15, 180),
(32, 2, 78, 51012),
(33, 1, 78, 936),
(34, 1, 10, 120),
(35, 1, 54, 648),
(36, 2, 21, 13734);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_tipo_de_documento` (`id_tipo_de_documento`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `ref_cli_idx` (`id_cliente`),
  ADD KEY `ref_formapago_idx` (`cod_formapago`);

--
-- Indices de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  ADD PRIMARY KEY (`id_finanzas`);

--
-- Indices de la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD PRIMARY KEY (`id_formapago`);

--
-- Indices de la tabla `info_libro`
--
ALTER TABLE `info_libro`
  ADD PRIMARY KEY (`id_info_libro`),
  ADD KEY `fk_id_libro` (`id_libro`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `fk_id_autor` (`id_autor`),
  ADD KEY `fk_id_categoria` (`id_categoria`);

--
-- Indices de la tabla `pregunta_de_seguridad`
--
ALTER TABLE `pregunta_de_seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor_ibfk_1` (`cod_tipo_documento`);

--
-- Indices de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  ADD PRIMARY KEY (`id_tipo_de_documento`);

--
-- Indices de la tabla `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`user_level`),
  ADD KEY `FK2_id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD KEY `FK_id_info_libro` (`id_info_libro`),
  ADD KEY `FK_id_factura` (`id_factura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `finanzas`
--
ALTER TABLE `finanzas`
  MODIFY `id_finanzas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  MODIFY `id_formapago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `info_libro`
--
ALTER TABLE `info_libro`
  MODIFY `id_info_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pregunta_de_seguridad`
--
ALTER TABLE `pregunta_de_seguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_de_documento`
--
ALTER TABLE `tipo_de_documento`
  MODIFY `id_tipo_de_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `FK_id_tipo_de_documento` FOREIGN KEY (`id_tipo_de_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_formapago` FOREIGN KEY (`cod_formapago`) REFERENCES `forma_de_pago` (`id_formapago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `info_libro`
--
ALTER TABLE `info_libro`
  ADD CONSTRAINT `fk_id_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `fk_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_libro` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`cod_tipo_documento`) REFERENCES `tipo_de_documento` (`id_tipo_de_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK2_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta_de_seguridad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `FK_id_factura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_info_libro` FOREIGN KEY (`id_info_libro`) REFERENCES `info_libro` (`id_info_libro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
