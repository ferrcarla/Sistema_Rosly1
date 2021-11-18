-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 01:39:44
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rosly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Id_Articulo` int(11) NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Nombre_Art` varchar(50) NOT NULL,
  `Color_Art` varchar(15) NOT NULL,
  `Talla_Art` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `catidad` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Id_Articulo`, `Id_Categoria`, `Nombre_Art`, `Color_Art`, `Talla_Art`, `detalle`, `catidad`, `foto`, `precio`, `fecha_creacion`) VALUES
(1, 2, 'Abrigo cuello tortuga', 'Negro', 38, 'material paño', 3, '0fd61a70-e5e6-4866-8e60-c18ed0518085.jpg', 358, '2021-11-11'),
(2, 2, 'Abrigo cuello tortuga', 'Azul marino', 38, 'material paño', 2, '', 358, '2021-11-11'),
(3, 2, 'Abrigo cuello tortuga', 'Palo rosa', 38, 'material paño', 3, '', 358, '2021-11-11'),
(4, 2, 'Abrigo cuello tortuga', 'camel', 38, 'material paño', 2, '', 358, '2021-11-11'),
(5, 2, 'Abrigo cuello tortuga', 'Negro', 40, 'material paño', 2, '', 358, '2021-11-11'),
(6, 2, 'Abrigo cuello tortuga', 'negro', 42, 'material paño', 2, '', 358, '2021-11-11'),
(7, 2, 'Abrigo cuello tortuga', 'Palo rosa', 40, 'material paño', 2, '', 358, '2021-11-11'),
(8, 2, 'Abrigo cuello tortuga', 'Palo rosa', 42, 'material paño', 6, '', 358, '2021-11-16'),
(16, 3, 'bleizer 3/4', 'Rosado', 38, 'Material algodón con perlas ', 5, '', 288, '2021-11-12'),
(17, 3, 'bleizer manga larga', 'Azul marino', 38, 'corte cirena', 2, '', 298, '2021-11-12'),
(18, 3, 'bleizer 3/4', 'Palo rosa', 40, 'corte cirena', 5, '', 288, '2021-11-12'),
(19, 3, 'bleizer manga larga', 'camel', 42, 'corte cirena', 2, '', 298, '2021-11-12'),
(20, 8, 'Pantalon de tela', 'Negro', 38, 'a la cadera dos botones ', 3, '', 158, '2021-11-12'),
(21, 7, 'Pantalon tela', 'Azul marino', 42, 'a la cadera dos botones ', 2, '', 158, '2021-11-12'),
(23, 3, 'manga 3/4', 'mostaza', 36, 'tela', 1637046328, '6', 298, '2021-11-16'),
(24, 5, 'vestido de Noche', 'blanco', 36, 'seda', 5, '1637048689_vestidoblanco.jpg', 268, '2021-11-16'),
(25, 5, 'vestido largo de noche', 'Guindo', 40, 'seda', 4, '1637048159_vestido.jpg', 360, '2021-11-16'),
(26, 5, 'vestido de Noche', 'verde', 42, 'vestido con lentejuelas ', 2, '1634593681_2.jpg\r\n', 290, '2021-11-16'),
(27, 1, 'pantalon licradas', 'Negro', 40, 'fejeros de cuatro botones', 1637067939, '2', 158, '2021-11-16'),
(28, 7, 'Pantalones Licrados', 'verde', 40, 'Pantalon de 4 botones ', 1637073937, '3', 158, '2021-11-16'),
(29, 1, 'pantalones fajeros', 'lila', 36, 'con cuadro botones', 1637081952, '3', 158, '2021-11-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre`, `Descripcion`) VALUES
(1, 'Pantalones Fajeros ', 'Cuatro botones, licradas'),
(2, 'Abrigos ', 'Material en paño'),
(3, 'Bleizer ', 'material super lijeros '),
(4, 'vestidos ', 'Vestido De noche largo elegante, Apliques De encaj'),
(5, 'blusas', 'Material Algodon'),
(6, 'blusas', 'Material Algodon'),
(7, 'Pantalones ', 'Licradas'),
(8, 'Pantalones ', 'Licradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `CI_Cliente` int(11) NOT NULL,
  `Nombre_Cli` varchar(50) NOT NULL,
  `Apellido_Cli` varchar(50) NOT NULL,
  `DIreccion` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`CI_Cliente`, `Nombre_Cli`, `Apellido_Cli`, `DIreccion`, `Correo`, `Telefono`) VALUES
(9736463, 'Lorena', 'Campos', 'Villa exaltación', 'lorena@gmail.com', '76445455'),
(9923894, 'Leo', 'Quispe', 'zona alto las delicias #5007', 'leo@gmail.com', '73008346');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `Id_Entrada` int(11) NOT NULL,
  `Fecha_` datetime NOT NULL DEFAULT current_timestamp(),
  `Id_Usuario` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Id_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Id_Entrada`, `Fecha_`, `Id_Usuario`, `Cantidad`, `Id_Articulo`) VALUES
(1, '2021-11-12 17:10:55', 5, 4, 2),
(2, '2021-11-12 17:10:55', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id_Inventario` int(11) NOT NULL,
  `Id_Articulo` int(11) NOT NULL,
  `Id_NIT` int(25) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id_Inventario`, `Id_Articulo`, `Id_NIT`, `cantidad`, `descripcion`, `fecha_creacion`) VALUES
(1, 1, 1260281011, 5, 'abrigo de piel de camello', '2021-11-12 17:10:11'),
(2, 7, 1260281011, 89, 'abrigo material pa;o ', '2021-11-12 17:10:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id_Pedido` int(11) NOT NULL,
  `CI_Cliente` int(11) NOT NULL,
  `Id_NIT` int(11) NOT NULL,
  `Id_Articulo` int(11) NOT NULL,
  `Talla` varchar(5) NOT NULL,
  `Color` varchar(15) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Id_Pedido`, `CI_Cliente`, `Id_NIT`, `Id_Articulo`, `Talla`, `Color`, `Cantidad`, `Precio_Total`) VALUES
(1, 9923894, 1260281011, 8, '38', 'gris', 1, 358),
(2, 9923894, 860281011, 1, '44', 'negro', 3, 398);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `Id_Reser` int(11) NOT NULL,
  `CI_Cliente` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Articulo` int(11) NOT NULL,
  `fecha_reser` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `Precio_Unitario` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Cliente'),
(5, 'cliente2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `Id_Salida` int(11) NOT NULL,
  `CI_Cliente` int(11) NOT NULL,
  `Fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `Cantidad` int(11) NOT NULL,
  `Id_Articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `Id_NIT` int(25) NOT NULL,
  `Dreccion` varchar(50) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`Id_NIT`, `Dreccion`, `Id_Usuario`) VALUES
(860281011, 'Calle Comercio', 1),
(1260281011, 'Galeria handal', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `CI` varchar(15) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `id_rol`, `Nombre`, `CI`, `Direccion`, `Telefono`, `User`, `Password`, `fecha_creacion`) VALUES
(1, 1, 'Lorena', '9923894', 'Calle alto chijini', '78798775', 'sonia@gmail.com', '$2y$10$KE8PgoYHgN7ddHTLuGKU.eJisVxWIsosFaeEGlyg86bY5cOZ./cd.', '2021-10-05 18:43:44'),
(2, 2, 'Sonia', '9149829', 'zona alto las delicias #5007', '73008346', 'susi123@gmail.com', '$2y$10$P3jtQ7Zx9CMbD2kCAtnEEOjpSBEZr4X3XpvNncAOxxYQ1TzRDFYwa', '2021-10-19 09:16:39'),
(4, 3, 'Maria', '73026356', 'alto chijini', '9923894 LP', 'maria123@gmail.com', '$2y$10$DxWyvLobXTEA57GgEGfQFOdcLVKF5L4yzYqqKy6VO7pWf.duZ2qYa', '2021-10-21 11:47:02'),
(5, 1, 'Rosario', '98273747', 'Villa Victoria ', '67543235', 'rosario23@gmail.com', '$2y$10$xrD/acVjxnOD2xucfSMtIOflOrwLtuZSpWpQv4jA2zpIV5FzmV0y.', '2021-11-10 12:49:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Id_Articulo`),
  ADD KEY `Id_Categoria` (`Id_Categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CI_Cliente`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`Id_Entrada`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Articulo` (`Id_Articulo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id_Inventario`),
  ADD KEY `Id_Articulo` (`Id_Articulo`),
  ADD KEY `Id_NIT` (`Id_NIT`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `CI_Cliente` (`CI_Cliente`),
  ADD KEY `Id_NIT` (`Id_NIT`),
  ADD KEY `Id_Articulo` (`Id_Articulo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD KEY `Id_Venta` (`Id_Reser`),
  ADD KEY `CI_Cliente` (`CI_Cliente`),
  ADD KEY `Id_Usuario` (`Id_Usuario`),
  ADD KEY `Id_Articulo` (`Id_Articulo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`Id_Salida`),
  ADD KEY `CI_Cliente` (`CI_Cliente`),
  ADD KEY `Id_Articulo` (`Id_Articulo`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`Id_NIT`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Id_Articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `Id_Entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id_Inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `Id_Reser` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `Id_Salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulo` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulo` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`Id_NIT`) REFERENCES `sucursal` (`Id_NIT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`CI_Cliente`) REFERENCES `cliente` (`CI_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`Id_NIT`) REFERENCES `sucursal` (`Id_NIT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulo` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`CI_Cliente`) REFERENCES `cliente` (`CI_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulo` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`CI_Cliente`) REFERENCES `cliente` (`CI_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`Id_Articulo`) REFERENCES `articulo` (`Id_Articulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
