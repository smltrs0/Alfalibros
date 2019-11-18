-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2013 at 04:41 AM
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
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id_autor`, `autor`) VALUES
(1, 'Oscar Ruizzzz'),
(2, 'Kledany Barzola'),
(3, 'Nuevo Autor'),
(4, 'Samuel Trias'),
(5, 'Dan Brown'),
(6, 'Zuzane Collins'),
(13, 'Dan Brow');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_libro`
--

CREATE TABLE `categoria_libro` (
  `id_categoria` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 'prueba nueva clase');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
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
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `id_tipo_de_documento`, `documento`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 1, 25695517, 'Oscar', 'Ruiz', 'Urb. La Paragua', '+584127969795'),
(2, 1, 25695518, 'Kledany', 'Barzola', 'Urb. La Paragua', '+584120890503'),
(3, 1, 123456789, 'Prueba', 'Prueba', 'Prueba', '+584648519'),
(4, 1, 24186725, 'Samuel', 'Trias', 'Marhuanta', NULL),
(5, 1, 21333222, 'Saul', 'Yanave', 'San José', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_detalles` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalles_factura`
--

INSERT INTO `detalles_factura` (`id_detalles`, `id_producto`, `cantidad`, `precio`, `id_factura`) VALUES
(1, 3, 1, '12', 38),
(2, 5, 1, '65', 38),
(3, 8, 1, '54', 38),
(4, 3, 1, '12', 39),
(5, 5, 1, '65', 40),
(6, 8, 1, '54', 40),
(7, 9, 1, '98', 40),
(8, 3, 1, '12', 41),
(9, 5, 1, '65', 41),
(10, 8, 1, '54', 41),
(11, 3, 1, '12', 42),
(12, 3, 2, '12', 43),
(13, 5, 1, '65', 43),
(14, 8, 1, '54', 43);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `cod_formapago`, `fecha_facturacion`, `IVA`, `total_factura`) VALUES
(29, 2, 1, '2019-08-28', 17.28, 161.28),
(30, 2, 2, '2019-08-28', 64.8, 604.8),
(31, 1, 1, '2019-08-28', 21.6, 201.6),
(32, 2, 2, '2019-08-28', 6121.44, 57133.4),
(33, 3, 2, '2019-08-28', 112.32, 1048.32),
(34, 2, 2, '2019-08-28', 14.4, 134.4),
(35, 1, 2, '2019-08-28', 77.76, 725.76),
(36, 2, 1, '2019-08-28', 1648.08, 15382.1),
(37, 1, 1, '2019-10-06', 1.44, 13.44),
(38, 4, 1, '2019-11-12', 1.23, 12.34),
(39, 1, 1, '2013-01-01', NULL, NULL),
(40, 3, 1, '2019-11-14', NULL, NULL),
(41, 5, 1, '2019-11-14', NULL, NULL),
(42, 5, 1, '2019-11-14', NULL, NULL),
(43, 1, 1, '2013-01-01', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `descripcion_formapago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 5, 98451, 65, 'uploaded_files/img_books/1.jpg'),
(3, 8, 657, 54, NULL),
(4, 9, 6486, 98, 'uploaded_files/img_books/mbiopb90k4evsb1gwh0a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
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
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `id_autor`, `id_categoria`, `fecha_lanzamiento`, `sinopsis`) VALUES
(1, 'test', 4, 3, '2018-11-29', 'ld'),
(2, 'Otro libro', 2, 4, '2018-10-29', 'otra sinopsis'),
(3, 'Pablo escobar Mi padre', 4, 3, '2017-09-28', 'Pasaron más de veinte años de silencio mientras recomponía mi vida en el exilio. Para cada cosa hay un tiempo y este libro, al igual que su autor, necesitaban un proceso de maduración, autocrítica y humildad. Solo así estaría listo para sentarme a escribir historias que aún hoy para la sociedad colombiana siguen siendo un interrogante.\r\nColombia también ha madurado para escuchar y por eso consideré que era hora de compartir con los lectores mi vida al lado del hombre que fue mi padre, a quien amé incondicionalmente y con quien por imperio del destino compartí momentos que marcaron una parte de la historia de Colombia.\r\nDesde el día en que nací hasta el día de su muerte, mi padre fue mi amigo, guía, maestro y consejero de bien. En vida, alguna vez le pedí que escribiera su verdadera historia, pero no estuvo de acuerdo: “Grégory, la historia hay que terminar de hacerla para poder escribirla”.\r\nJuré vengar la muerte de mi padre, pero rompí la promesa diez minutos después. Todos tenemos derecho a cambiar y desde hace más de dos décadas vivo inmerso en reglas claras de tolerancia, convivencia pacífica, diálogo, perdón, justicia y reconciliación.\r\nEste no es un libro de reproches; es un libro que plantea profundas reflexiones sobre cómo está diseñada nuestra patria y sus políticas, y por qué surgen de sus entrañas personajes como mi padre.\r\nSoy respetuoso de la vida y desde ese lugar escribí este libro; desde una perspectiva diferente y única en la que no tengo agenda oculta, contrario a la mayoría de los textos que circulan sobre mi papá.\r\nEste libro no es tampoco la verdad absoluta. Es un ejercicio de búsqueda y una aproximación a la vida de mi padre. Es una investigación personal e íntima. Es el redescubrimiento de un hombre con todas sus virtudes pero también con todos sus defectos. La mayor parte de estas anécdotas me las contó en las frías y largas noches del último año de su vida, alrededor de fogatas; otras me las dejó escritas cuando sus enemigos estaban muy cerca de aniquilarnos a todos.\r\nEste acercamiento a la historia de mi padre me llevó a personajes ocultos por años, que solo ahora estuvieron dispuestos a contribuir con este libro, para que mi juicio y el de la editorial no estuvieran nublados. Pero sobre todo para que nadie, nunca más, herede estos odios.\r\nNo siempre estuve al lado de mi padre, no me sé todas sus historias. Miente quien diga que las conoce en su totalidad. Me enteré de todas las memorias que contiene este libro, mucho tiempo después de que sucedieron los hechos. Mi padre jamás consultó ninguna de sus decisiones conmigo, ni con nadie; era un hombre que sentenciaba por su propia cuenta.\r\nMuchas ‘verdades’ de mi padre se saben a medias, o ni siquiera se conocen. Por eso contar su historia implicó muchos riesgos porque debía ser narrada con un enorme sentido de responsabilidad, porque lamentablemente mucho de lo que se ha dicho pareciera encajar a la perfección. Estoy seguro de que el filtro de acero que puso Planeta con el editor Edgar Téllez contribuyó al buen suceso de este proyecto.\r\nEsta es una exploración personal y profunda de las entrañas de un ser humano que además de ser mi padre lideró una organización mafiosa como no la conocía la humanidad.\r\nPido perdón públicamente a todas las víctimas de mi padre, sin excepciones; me duele en el alma profundamente que hayan sufrido los embates de una violencia indiscriminada y sin par en la que cayeron muchos inocentes. A todas esas almas les digo que hoy busco honrar la memoria de cada una de ellas, desde el fondo de la mía. Este libro estará escrito con lágrimas, pero sin rencores. Sin ánimos de denuncia, ni revanchismos y sin excusas para promover la violencia ni mucho menos para hacer apología del delito.\r\nEl lector se sorprenderá con el contenido de los primeros capítulos del libro porque revelo por primera vez el profundo conflicto que hemos vivido con mis parientes paternos. Son veintiún años de de-sencuentros que me han llevado a concluir que en el desenlace final que condujo a la muerte de mi padre varios de ellos contribuyeron activamente.\r\nNo me equivoco si digo que la familia de mi padre nos ha perseguido más que sus peores enemigos. Mis actos hacia ellos tuvieron siempre su origen en el amor y en el respeto absoluto por los valores familiares, que no debieron perderse ni en la peor de las guerras y menos por dinero. Dios y mi padre saben, que yo más que nadie soñé y quise creer que esta dolorosa tragedia familiar, fuese solo una pesadilla y no una realidad a la que me tuviera que enfrentar.\r\nA mi padre le agradezco su cruda sinceridad, aquella que por la fuerza del destino me tocó comprender pero sobre todo sin justificarlo en absoluto.\r\nAnte mi pedido de perdón en el documental “Pecados de mi Padre”, alguna vez los hijos de los líderes asesinados Luis Carlos Galán y Rodrigo Lara Bonilla me dijeron: “Usted también es una víctima” y mi respuesta sigue siendo la misma desde entonces: si acaso lo soy, seré el último en la larga lista de Colombianos.\r\nMi padre fue un hombre responsable por su destino, de sus actos, de sus elecciones de vida como papá, como individuo y —a su vez— como el bandido que le causó a Colombia y al mundo, unas heridas que no pierden vigencia. Sueño que algún día cicatricen y puedan transformarse para bien, para que nadie ose repetir esta historia, pero sí aprender de ella.\r\nNo soy un hijo que creció siendo ciegamente fiel a su padre, pues en vida le cuestioné duramente su violencia y sus métodos, y le pedí de todas las maneras posibles que abandonara sus odios, que depusiera sus armas, que encontrara soluciones no violentas a sus problemas.\r\nEn el universo de opiniones que hay en torno a la vida de mi padre, en una sola coincidimos todos: En su amor incondicional por esta, su única familia.\r\nSoy un ser humano que espera ser recordado por sus actos y no por los de su padre. Invito al lector a que no me olvide durante el paso por mis relatos, ni me confunda con mi padre, porque esta es también mi historia.'),
(4, 'Inferno', 5, 3, '2017-10-29', 'awefaw'),
(5, 'La reina roja', 1, 9, '2020-02-02', 'ASDFASDF'),
(6, 'Prueba con imn', 2, 2, '2018-11-30', 'prueba con imagen'),
(7, 'Prueba con imn', 2, 2, '2018-11-30', 'prueba con imagen'),
(8, 'Prueba img', 2, 2, '2018-11-30', 'prueba'),
(9, 'prueba', 3, 2, '2017-10-29', 'prueba');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta_de_seguridad`
--

CREATE TABLE `pregunta_de_seguridad` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `documento` int(20) NOT NULL,
  `nombre_comercial` varchar(20) NOT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `cod_tipo_documento`, `nombre`, `apellido`, `documento`, `nombre_comercial`, `direccion`, `telefono`) VALUES
(7, 1, 'test', 'test', 21312, 'test', 'San José', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_de_documento`
--

CREATE TABLE `tipo_de_documento` (
  `id_tipo_de_documento` int(11) NOT NULL,
  `tipo_de_documento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `level`) VALUES
(1, 'Administrador'),
(2, 'Encargado'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `cedula` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL,
  `pregunta` int(11) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `cedula`, `username`, `email`, `clave`, `cargo`, `pregunta`, `respuesta`, `image`) VALUES
(3, 'samuel', 'Trias', 242, 'smltrs0', 'smltrs0@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1, 1, 'xsd', '9.jpg'),
(4, 'oscar', 'Ruiz', 21333222, 'oscar', 'oscar@gmail.com', '63a9f0ea7bb98050796b649e85481845', 1, 2, 'd', '7.jpg');

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
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categoria_libro`
--
ALTER TABLE `categoria_libro`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
