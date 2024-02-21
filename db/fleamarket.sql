-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2020 a las 04:43:31
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fleamarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Tenis masculinos'),
(2, 'Tenis femeninos'),
(3, 'Camisas masculinas'),
(4, 'Blusas'),
(5, 'Jeans masculinos'),
(6, 'Jeans femeninos'),
(7, 'Ropa infantil'),
(8, 'Joggers'),
(9, 'Relojes'),
(10, 'Hoodies masculinos'),
(11, 'Mascarillas para adultos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `userType` varchar(20) NOT NULL DEFAULT 'cliente',
  `Nombres` varchar(60) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `userType`, `Nombres`, `Apellidos`, `Email`, `username`, `Password`, `Telefono`, `Direccion`, `DUI`, `avatar`) VALUES
(1, 'admin', 'Gilberto', 'Duran', 'gduran@gmail.com', 'gduran', 'Gilberto@17', '7686-6839', 'Av. El Olmo', '12345678-9', 'img/ninja.png'),
(2, 'seller', 'Eddy', 'Rene', 'eddy.rene@eddy.com', 'eddy', '123456789', '1234-5678', 'vbjn', '12345678-9', 'img/ninja.png'),
(3, 'cliente', 'Jose', 'Raul', 'jse.raul@g.com', 'raul', 'Raul@17', '7589-9898', 'dxcvb', '12345678-9', 'img/peliroja.png'),
(4, 'cliente', 'James', 'Rodriguex', 'jj@f.com', 'james', '123456789', '4565-9898', 'cvbhj', '12345678-9', 'img/peliroja.png'),
(6, 'cliente', 'Jose', 'Lopez', 'jlopez@g.com', 'jlopez', '123456789', '7589-9898', 'fcvb', '12345678-9', 'img/ninja.png'),
(7, 'cliente', 'Kevin', 'Duran', 'kduran@gmail.com', 'kev.durn', '123456', '1234-5678', 'Universidad Don Bosco', '12345678-9', 'img/mesero.png'),
(8, 'cliente', 'Jose', 'Casas', 'jcasas@m.com', 'jcasas', '123456', '1234-5678', 'vgbhnjmk', '12345678-9', 'img/ninja.png'),
(9, 'cliente', 'Kevin', 'DurÃ¡n', 'kevdu.m@gmail.com', 'kduran', '123456789', '10100101', 'si cu un ok un Chi in CD de', '04833820-1', 'img/mesero.png'),
(12, 'seller', 'Juan Antonio', 'Lopez Escamilla', 'jlope@gmail.com', 'jescamilla', '123456', '7898-9898', 'km. 1/2 carretera plan del pino, soyapango', '12345678-9', 'img/ninja.png'),
(13, 'seller', 'Ramon', 'Anderson', 'randerson@gmail.com', 'randerson', '123456', '8998-9999', 'Rand, 123, col. av.', '12345678-9', 'img/ninja.png'),
(14, 'seller', 'Andres', 'Robersont', 'a@mmm.com', 'arobersont', '123456', '8798-9898', 'ghjk', '12345678-9', 'img/ninja.png'),
(18, 'seller', 'Andres Manuel', 'Lopez Obrador', 'amlo@mex.com', 'amlo', '123456', '7898-9898', 'Chiapas', '12345678-9', 'img/peliroja.png'),
(26, 'seller', 'Nayib', 'Bukele', 'nbukele@rieles.com', 'nbukele', '123456', '7556-6565', 'Casa presidencial', '12345678-9', 'img/mesero.png'),
(29, 'admin', 'Walter', 'Carabantes', 'wcarabantes@gmail.com', 'wcarabantes', '123456', '7869-3636', 'Chalatenango', '12345678-9', 'img/mesero.png'),
(30, 'admin', 'Alejandro', 'Alas', 'aalas@rieles.com', 'aalas', '123456', '7356-6989', 'Soya', '12345678-9', 'img/mesero.png'),
(31, 'seller', 'Kevin', 'Cedillo', 'kcedillos@rieles.com', 'kcedillos', '123456', '7845-3212', 'Soya', '12345678-9', 'img/ninja.png'),
(32, 'seller', 'Riley', 'Reid', 'rreid@rieles.com', 'riley.reid', '123456', '7686-6839', 'Pornhub', '12345678-9', 'img/peliroja.png'),
(33, 'seller', 'Kevin Alexander', 'Reid', 'kreid@solorieles.com', 'kevin.reid', '123456', '7989-2335', 'Cupertino, California', '12345678-9', 'img/peliroja.png'),
(35, 'cliente', 'Marcela', 'Villafranca', 'mvilla@gmail.com', 'marcela.villa', '123456', '7898-9852', 'Universidad Don Bosco', '12345678-9', 'img/ninja.png'),
(38, 'cliente', 'Jose', 'Raul', 'raul@g.com', 'rjose', '123456', '1234-5678', 'jejeje', '12345678-9', 'img/ninja.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idCliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `idCliente`, `Fecha`, `Monto`) VALUES
('C0001', 4, '2020-08-29', 665.00),
('C0002', 4, '2020-09-11', 258.00),
('C0003', 4, '2020-09-11', 78.00),
('C0004', 4, '2020-09-11', 44.00),
('C0005', 38, '2020-09-11', 310.00),
('C0006', 38, '2020-09-11', 160.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_fin`
--

CREATE TABLE `compra_fin` (
  `id` int(11) NOT NULL,
  `idCompra` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idDetalle` char(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compra_fin`
--

INSERT INTO `compra_fin` (`id`, `idCompra`, `idDetalle`) VALUES
(3, 'C0002', 'S0014'),
(5, 'C0004', 'S0026'),
(6, 'C0005', 'S0032'),
(7, 'C0006', 'S0041');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `idProd` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `idProd`, `cantidad`) VALUES
('S0014', 19, 2),
('S0026', 8, 1),
('S0032', 20, 2),
('S0041', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `Nombre`) VALUES
(1, 'Nike'),
(2, 'adidas'),
(3, 'Reebok'),
(4, 'Puma'),
(5, 'Converse'),
(6, 'Skechers'),
(7, 'New Balance'),
(8, 'Asics'),
(9, 'Off-White'),
(10, 'Air Jordan'),
(11, 'Vans'),
(12, 'Fear of God'),
(13, 'Louis Vuitton'),
(14, 'Balenciaga'),
(15, 'Prada'),
(16, 'Gucci'),
(17, 'Anti Social Social Club (ASSC)'),
(18, 'Travis Scott Cactus Jack'),
(19, 'Rotary'),
(20, 'Casio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productotalla`
--

CREATE TABLE `productotalla` (
  `id` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `idTalla` int(11) NOT NULL,
  `disponibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productotalla`
--

INSERT INTO `productotalla` (`id`, `idProd`, `idTalla`, `disponibilidad`) VALUES
(1, 24, 4, 2),
(2, 24, 5, 5),
(3, 25, 6, 0),
(4, 25, 7, 0),
(5, 25, 8, 2),
(6, 25, 9, 1),
(7, 25, 10, 1),
(8, 26, 11, 5),
(9, 33, 11, 5),
(10, 34, 6, 8),
(11, 34, 7, 7),
(12, 34, 8, 2),
(13, 34, 9, 0),
(14, 34, 10, 5),
(15, 35, 1, 0),
(16, 35, 2, 2),
(17, 35, 3, 0),
(18, 35, 4, 5),
(19, 35, 5, 1),
(20, 36, 1, 2),
(21, 36, 2, 2),
(22, 36, 3, 1),
(23, 36, 4, 2),
(24, 36, 5, 10),
(25, 1, 3, 8),
(26, 1, 1, 1),
(27, 2, 4, 0),
(28, 2, 2, 5),
(29, 6, 3, 1),
(30, 6, 5, 5),
(31, 9, 4, 5),
(32, 9, 2, 2),
(33, 16, 4, 0),
(34, 16, 2, 1),
(35, 37, 1, 0),
(36, 37, 2, 0),
(37, 37, 3, 2),
(38, 37, 4, 1),
(39, 37, 5, 3),
(40, 38, 1, 1),
(41, 38, 2, 0),
(42, 38, 3, 0),
(43, 38, 4, 5),
(44, 38, 5, 8),
(48, 40, 13, 0),
(49, 40, 16, 5),
(50, 40, 17, 2),
(51, 41, 13, 1),
(52, 41, 16, 0),
(53, 41, 17, 10),
(54, 42, 13, 1),
(55, 42, 16, 0),
(56, 42, 17, 1),
(57, 43, 13, 8),
(58, 43, 16, 1),
(59, 43, 17, 5),
(60, 44, 13, 0),
(61, 44, 16, 8),
(62, 44, 17, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rieles`
--

CREATE TABLE `rieles` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idMarca` int(11) NOT NULL,
  `idSeller` int(11) NOT NULL,
  `Precio` float(10,2) NOT NULL,
  `img` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Materiales` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rieles`
--

INSERT INTO `rieles` (`id`, `Nombre`, `idMarca`, `idSeller`, `Precio`, `img`, `Descripcion`, `Materiales`) VALUES
(1, 'Air Max 97 Have A Nike Day Indigo Storm', 1, 1, 280.00, '../img/97_nikeDay.jpg', 'Uno de los iconos de Nike se viste de gala con la ediciï¿½n Have A Nike Day, donde el swoosh es la sonrisa de todos al ponernos este par.', 'Gamuza, cuero y malla'),
(2, 'Nike Jordan 1 Retro High Satin Black Toe', 10, 2, 480.00, '../img/jordan1.jpg', 'Las Air Jordan 1 High \"Bred\" fueron las primeras que salieron a la venta y las que mï¿½s expectaciï¿½n crearon incluso antes del lanzamiento oficial debido a una carta de aviso que la NBA.', '-Parte superior: cuero<br />\r\n-Forro: cuero <br />\r\n-suela: goma x air '),
(6, 'adidas Yeezy Boost 350 V2 Clay', 2, 2, 218.00, '../img/yzb350clay.jpg', 'Colaboración entre adidas y el rapero Kanye West. Esta es la re-invensión del módelo original con colorway arcilla.', '<b>-Parte superior:</b> Textil.\r\n                        <br>\r\n                        <b>-Forro:</b> Textil.\r\n                        <br>\r\n                        <b>-Suela:</b> Caucho.'),
(9, 'Kyrie 5 Spongebob Patrick', 1, 26, 180.00, '../img/kyrie_spP.jpg', 'DiseÃ±ados por el judador de baloncesto Kyrie Irnving, en su versiÃ³n 5 ofrece tracciÃ³n para dribalr y una unidad de Zoom Air turbo. Esta presentaciÃ³n es una colaboraciÃ³n con Nickelodeon y Bob Espo', '-Parte superior: Textil.\r\n-Forro: Textil.\r\n-Suela: Caucho.'),
(15, 'Air Jordan 1 Retro High Off-White Chicago', 10, 26, 5218.00, '../img/jordan1_offWhiteChicago.jpg', 'Las Air Jordan 1 por Off-White hace referencia a la reinvenciÃ³n de la misma silueta. Realizado por el diseÃ±ador Virgil Abloh para las: \"The ten\" de Off-White y Nike.', '-Parte superior: Gamuza/Textil.\r\n-Forro: Textil/Cuero.\r\n-Suela: Caucho.'),
(16, 'adidas Kamanda Dragon Ball Z Majin Buu', 2, 26, 250.00, '../img/dgbz_Majinbu.jpg', 'ColaboraciÃ³n con Dragon Ball Z. Esta silueta nacida en 2018 es una reinvenciÃ³n de los modelos clasicos de adiad, con una media suela exorbitante tamada de la suela de los adidas samba este snekar es', '-Parte superior: Gamuza/Textil.\r\n-Forro: Textil/Cuero.\r\n-Suela: Caucho.'),
(24, 'Nike Air Fear Of God', 1, 26, 550.50, '../img/afog.jpg', 'jajajajajaja', 'jejeejejejje'),
(25, 'Kkoch Hoodie Black', 17, 2, 131.00, '../img/assc.jpg', 'Hoodie de ASSC con diseño Kkoch', 'Algodon'),
(26, 'Face Mask Brown', 18, 2, 34.00, '../img/mask-ts.jpg', 'Un drop especial para la crisis del Covid-19', '-Tela<br>\r\n-Filtro'),
(33, 'Mascarilla kn95', 18, 31, 0.50, '../img/mas.jpg', 'para covid', 'telita'),
(34, 'ASSC Rainbow Black', 17, 12, 105.60, '../img/assc_rainbow.jpg', 'ASSC no deja de sorprender, hoy nos da un drop de un Hoodie con colores Rainbow', 'Algodon'),
(35, 'Air Max 90 Green Camo', 1, 26, 124.00, '../img/air_max_camo.jpg', 'El clasico de clasicos, uno de los que inicio el movimiento SH.', '<b>Upper</b>:gamuza<br>'),
(36, 'Air Force 1 Gym Red Low', 1, 14, 150.00, '../img/af1_gymred.jpg', 'Un clÃ¡sico con los colores chicago', '<b>Upper: </b>Cuero sintetico<br>\r\n<b>Suela: </b>Goma con tecnologia air'),
(37, 'Air Max 720 Red Blue Fury ', 1, 32, 150.00, '../img/720_rbf.jpg', 'mkmm', 'mkmkm'),
(38, 'Air Fear Of God Triple Black', 1, 2, 250.00, '../img/afog.jpg', 'La colabo de Jerry Lorenzo y Nike esta que arde en este nuevo icono de la moda.', '<b>Upper: </b>Materiales sinteticos<br>\r\n<b>Toolbox: </b>Mesh<br>\r\n<b>Suela: </b>Goma con tecnologia Air'),
(40, 'Reloj', 19, 26, 150.00, '../img/81mbdx8cicL._AC_UY445_.jpg', 'ghbjnVBHNJ', 'ghj'),
(41, 'Reloj clÃ¡sico ', 20, 2, 50.00, '../img/3954c106-36d4-40a0-a5cf-5b456cf7138c.jpg', 'Yeur', 'Ydyd'),
(42, 'Reloj clasico', 20, 26, 50.00, '../img/3954c106-36d4-40a0-a5cf-5b456cf7138c.jpg', 'Tyyy', 'Yyi'),
(43, 'GShock green', 20, 2, 150.00, '../img/101349-1.webp', 'Hh', 'Ghj'),
(44, 'Reloj calculadora', 20, 26, 100.00, '../img/450_1000.jpg', 'Yu', 'Gh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(11) NOT NULL,
  `talla` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`, `idCategoria`) VALUES
(1, '8', 1),
(2, '8.5', 1),
(3, '9', 1),
(4, '9.5', 1),
(5, '10', 1),
(6, 'M', 10),
(7, 'S', 10),
(8, 'L', 10),
(9, 'XL', 10),
(10, 'XXL', 10),
(11, 'Uni', 11),
(12, 'Smal', 11),
(13, '32mm', 9),
(16, '42mm', 9),
(17, '48mm', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `compra_fin`
--
ALTER TABLE `compra_fin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCompra` (`idCompra`,`idDetalle`),
  ADD KEY `idDetalle` (`idDetalle`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProd` (`idProd`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productotalla`
--
ALTER TABLE `productotalla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProd` (`idProd`,`idTalla`),
  ADD KEY `idTalla` (`idTalla`);

--
-- Indices de la tabla `rieles`
--
ALTER TABLE `rieles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idSeller` (`idSeller`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `compra_fin`
--
ALTER TABLE `compra_fin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productotalla`
--
ALTER TABLE `productotalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `rieles`
--
ALTER TABLE `rieles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `compra_fin`
--
ALTER TABLE `compra_fin`
  ADD CONSTRAINT `compra_fin_ibfk_1` FOREIGN KEY (`idDetalle`) REFERENCES `detalle_compra` (`id`),
  ADD CONSTRAINT `compra_fin_ibfk_2` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`idProd`) REFERENCES `productotalla` (`id`);

--
-- Filtros para la tabla `productotalla`
--
ALTER TABLE `productotalla`
  ADD CONSTRAINT `productotalla_ibfk_1` FOREIGN KEY (`idTalla`) REFERENCES `tallas` (`id`),
  ADD CONSTRAINT `productotalla_ibfk_2` FOREIGN KEY (`idProd`) REFERENCES `rieles` (`id`);

--
-- Filtros para la tabla `rieles`
--
ALTER TABLE `rieles`
  ADD CONSTRAINT `rieles_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `rieles_ibfk_2` FOREIGN KEY (`idSeller`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD CONSTRAINT `tallas_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
