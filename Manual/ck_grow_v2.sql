-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2020 a las 03:39:29
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ck_grow`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `insert_detallePedido_y_pedido` (`Inpedido` INT, `inprodu` INT) RETURNS INT(11) BEGIN
DECLARE total int;
DECLARE cant int;

INSERT INTO detalle_pedido 
(cod_pedido, cod_detalle,estado)
VALUES 
(Inpedido,inprodu,1);

SELECT SUM(d.precio) INTO total FROM pedido p
INNER JOIN detalle_pedido dp on p.cod_pedido = dp.cod_pedido
INNER JOIN detalle d ON d.cod_detalle = dp.cod_detalle
WHERE dp.cod_pedido = Inpedido;

SELECT COUNT(cod_pedido) INTO cant 
FROM detalle_pedido
WHERE cod_pedido = Inpedido;


UPDATE pedido
SET valorT = total,
cantidad = cant,
estado = 1
WHERE cod_pedido = Inpedido;

RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `update_detallePedido_y_pedido` (`Inpedido` INT, `inprodu` INT) RETURNS INT(11) BEGIN
DECLARE total int;
DECLARE cant int;

UPDATE detalle_pedido 
SET cod_detalle = inprodu,
estado = 1
WHERE cod_pedido = Inpedido;

SELECT SUM(d.precio) INTO total FROM pedido p
INNER JOIN detalle_pedido dp on p.cod_pedido = dp.cod_pedido
INNER JOIN detalle d ON d.cod_detalle = dp.cod_detalle
WHERE dp.cod_pedido = Inpedido;

SELECT COUNT(cod_pedido) INTO cant 
FROM detalle_pedido
WHERE cod_pedido = Inpedido;


UPDATE pedido
SET valorT = total,
cantidad = cant,
estado = 1
WHERE cod_pedido = Inpedido;

RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(1, 'desayuno'),
(2, 'desayuno2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(4) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `nombre_cliente` varchar(30) DEFAULT NULL,
  `tel_cliente` varchar(50) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `apellido_cliente` varchar(20) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `nombre_u` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `pass2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `edad`, `estado`, `genero`, `nombre_cliente`, `tel_cliente`, `id_rol`, `apellido_cliente`, `cedula`, `email`, `fecha_nacimiento`, `fecha_registro`, `nombre_u`, `pass`, `pass2`) VALUES
(1, 37, '1', 1, 'coni2021', '52458754', 1, 'alma', '123', 'perro@gmail.com', '2020-02-11', '2020-04-15 05:00:00', 'coni202', '123', '123'),
(3, 24, '1', 1, 'COMODORO', '123', 1, 'COMODORO', '123', 'pau@gmail.com', '2010-03-03', '2013-02-02 05:00:00', 'COMODORO', '123', NULL),
(3417, 25, '1', 1, 'caca', 'caca', 1, 'caca', 'caca', 'caca@gmail.com', '2020-09-09', '2020-09-02 03:58:55', 'caca', '123caca', NULL),
(3418, 25, '1', 1, 'caca20', 'caca', 1, 'caca', 'caca', 'caca@gmail.com', '2020-09-09', '2020-09-02 03:59:25', 'caca', 'caca', NULL),
(3419, 25, '1', 1, 'paula', '123', 1, 'alma', '4545', 'pau@gmail.com', '2020-09-27', '2020-09-05 22:48:02', 'paula c ', '123', NULL),
(3420, 25, '1', 1, 'pau', '2020', 1, 'pau', '123', 'pau@gmail.com', '2019-05-02', '2020-09-07 22:09:02', 'pau', '123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `cod_detalle` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `img_deta` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`cod_detalle`, `nombre`, `precio`, `id_categoria`, `img_deta`, `descripcion`) VALUES
(4, '1', 40000, 1, '1.jpg', 'el mejor obsequio'),
(5, 'fantasma choco', 5000, 1, '2.jpg', 'disfrutalo ne familia'),
(7, 'desayuno mujer', 65000, 1, '', ''),
(8, 'desayuno abue', 66000, 2, NULL, ''),
(9, 'galleta chocolate', 3000, 1, NULL, ''),
(14, 'desayuno peke', 55000, 1, NULL, ''),
(15, 'pan', 20000, 1, NULL, ''),
(16, 'desayuno wee', 75000, 1, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `cod_pedido` int(4) DEFAULT NULL,
  `cod_detalle` int(11) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`cod_pedido`, `cod_detalle`, `estado`) VALUES
(2, 4, 'inicial'),
(1, 5, '1'),
(1, 5, '1'),
(2, 4, '1'),
(3, 15, 'inicial'),
(1, 5, '1'),
(4, 9, '1'),
(4, 9, '1'),
(3, 7, '1'),
(5, 5, '1'),
(5, 8, '1'),
(6, NULL, 'inicial'),
(7, NULL, 'inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

CREATE TABLE `detalle_producto` (
  `cod_productos` int(4) DEFAULT NULL,
  `cod_detalle` int(11) DEFAULT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `cod_semilla` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `cod_domicilio` int(4) NOT NULL,
  `cod_empleado` int(4) DEFAULT NULL,
  `cod_cliente` int(4) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tel_cliente` varchar(50) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fechaEnrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`cod_domicilio`, `cod_empleado`, `cod_cliente`, `direccion`, `fecha`, `hora`, `tel_cliente`, `estado`, `fechaEnrega`) VALUES
(1, 1, 1, '34567', '2020-04-15', '02:02:00', '52458754', '1', '2020-04-14'),
(2, 1, 1, '34567', '2020-04-06', '13:59:00', '00000000', '1', '2020-04-06'),
(3, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '1244', 'ini', '2020-04-08'),
(4, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '346789', 'inicia', '2020-04-08'),
(5, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '22222', '1', '2020-04-08');

--
-- Disparadores `domicilio`
--
DELIMITER $$
CREATE TRIGGER `when update domi ADDPEDIDO` AFTER UPDATE ON `domicilio` FOR EACH ROW BEGIN  
INSERT INTO pedido 
SET 
cantidad = 0,
cod_domicilios = new.cod_domicilio,
valorT = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cod_empleado` int(4) NOT NULL,
  `nombre_empleado` varchar(30) DEFAULT NULL,
  `apellido_empleado` varchar(30) DEFAULT NULL,
  `cargo_empleado` varchar(20) DEFAULT NULL,
  `correo_empleado` varchar(20) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `eps` varchar(20) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `telefono_empleado` varchar(20) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cod_empleado`, `nombre_empleado`, `apellido_empleado`, `cargo_empleado`, `correo_empleado`, `edad`, `eps`, `estado`, `fecha_contratacion`, `genero`, `salario`, `telefono_empleado`, `id_rol`) VALUES
(1, 'pau', 'alma', 'asesor', 'pau@gmail.com', 21, 'sa', '', '2020-04-06', 2, 13, '23789', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especiep`
--

CREATE TABLE `especiep` (
  `id_especieP` int(5) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id_especieS` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `id_especieP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `id_expedienteS` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cod_semilla` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(4) NOT NULL,
  `cod_domicilios` int(4) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valorT` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `cod_domicilios`, `cantidad`, `valorT`, `estado`) VALUES
(1, 2, 3, 15000, 1),
(2, 2, 4, 80000, 1),
(3, 3, 2, 85000, 1),
(4, 4, 1, 3000, 1),
(5, 5, 2, 71000, 1),
(6, 5, 0, 0, 1),
(7, 5, 0, 0, 1);

--
-- Disparadores `pedido`
--
DELIMITER $$
CREATE TRIGGER `ADDDET_PEDI` AFTER INSERT ON `pedido` FOR EACH ROW BEGIN  
INSERT INTO detalle_pedido 
SET 
cod_pedido = new.cod_pedido,
estado = 'inicial';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `id_especieP` int(11) DEFAULT NULL,
  `cod_semilla` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_producto` int(4) NOT NULL,
  `cod_proveedor` int(4) DEFAULT NULL,
  `nombre_producto` varchar(29) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_producto`, `cod_proveedor`, `nombre_producto`, `cantidad`, `descripcion`, `precio`) VALUES
(1, 2, NULL, 22, 'chocolate', NULL),
(2, 2, NULL, 22, 'chocolate', NULL),
(3, 1, NULL, 22, 'chocolate', NULL),
(4, 2, 'chocolate', 22, 'chocolate', 55000),
(5, 1, 'chicle', 3, 'chicle peque', 55000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cod_proveedor` int(4) NOT NULL,
  `nombre_proveedor` varchar(4) DEFAULT NULL,
  `direccion` varchar(99) DEFAULT NULL,
  `tel_proveedor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cod_proveedor`, `nombre_proveedor`, `direccion`, `tel_proveedor`) VALUES
(1, 'semi', 'cll 145 17 11', '3224533'),
(2, 'agro', 'cll 145 17 11', '3224533');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'r', 'r', 'r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semillas`
--

CREATE TABLE `semillas` (
  `cod_semilla` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `id_especieS` int(11) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `cod_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`cod_detalle`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD KEY `cod_pedido` (`cod_pedido`),
  ADD KEY `cod_ramo` (`cod_detalle`);

--
-- Indices de la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD KEY `cod_productos` (`cod_productos`),
  ADD KEY `cod_detalle` (`cod_detalle`),
  ADD KEY `cod_semilla` (`cod_semilla`),
  ADD KEY `id_planta` (`id_planta`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`cod_domicilio`),
  ADD KEY `cod_empleado` (`cod_empleado`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cod_empleado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `especiep`
--
ALTER TABLE `especiep`
  ADD PRIMARY KEY (`id_especieP`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id_especieS`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `id_planta` (`id_planta`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`id_expedienteS`),
  ADD KEY `cod_semilla` (`cod_semilla`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_domicilios` (`cod_domicilios`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_planta`),
  ADD KEY `id_especieP` (`id_especieP`),
  ADD KEY `cod_semilla` (`cod_semilla`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `cod_proveedor` (`cod_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cod_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `semillas`
--
ALTER TABLE `semillas`
  ADD PRIMARY KEY (`cod_semilla`),
  ADD KEY `id_especieS` (`id_especieS`),
  ADD KEY `cod_proveedor` (`cod_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3421;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `cod_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `cod_domicilio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `cod_empleado` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especiep`
--
ALTER TABLE `especiep`
  MODIFY `id_especieP` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id_especieS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `id_expedienteS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `semillas`
--
ALTER TABLE `semillas`
  MODIFY `cod_semilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`cod_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`cod_detalle`) REFERENCES `detalle` (`cod_detalle`),
  ADD CONSTRAINT `detalle_pedido_ibfk_3` FOREIGN KEY (`cod_pedido`) REFERENCES `pedido` (`cod_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_4` FOREIGN KEY (`cod_detalle`) REFERENCES `detalle` (`cod_detalle`);

--
-- Filtros para la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD CONSTRAINT `detalle_producto_ibfk_1` FOREIGN KEY (`cod_productos`) REFERENCES `productos` (`cod_producto`),
  ADD CONSTRAINT `detalle_producto_ibfk_2` FOREIGN KEY (`cod_detalle`) REFERENCES `detalle` (`cod_detalle`),
  ADD CONSTRAINT `detalle_producto_ibfk_3` FOREIGN KEY (`cod_semilla`) REFERENCES `semillas` (`cod_semilla`),
  ADD CONSTRAINT `detalle_producto_ibfk_4` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`);

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`cod_empleado`) REFERENCES `empleado` (`cod_empleado`),
  ADD CONSTRAINT `domicilio_ibfk_2` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `id_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`);

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `cod_semilla` FOREIGN KEY (`cod_semilla`) REFERENCES `semillas` (`cod_semilla`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_domicilios`) REFERENCES `domicilio` (`cod_domicilio`);

--
-- Filtros para la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD CONSTRAINT `id_especieP` FOREIGN KEY (`id_especieP`) REFERENCES `especiep` (`id_especieP`),
  ADD CONSTRAINT `plantas_ibfk_1` FOREIGN KEY (`cod_semilla`) REFERENCES `semillas` (`cod_semilla`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_proveedor`) REFERENCES `proveedor` (`cod_proveedor`);

--
-- Filtros para la tabla `semillas`
--
ALTER TABLE `semillas`
  ADD CONSTRAINT `id_especieS` FOREIGN KEY (`id_especieS`) REFERENCES `especies` (`id_especieS`),
  ADD CONSTRAINT `semillas_ibfk_1` FOREIGN KEY (`cod_proveedor`) REFERENCES `proveedor` (`cod_proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
