-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2020 a las 16:59:57
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
(2, 'cultivo'),
(3, 'plantas'),
(4, 'clones'),
(5, 'semillas'),
(6, 'sustratos'),
(7, 'postres'),
(8, 'chocolates'),
(9, 'fertilizantes'),
(10, 'insumos'),
(11, 'luces');

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
(1, 37, '1', 1, 'coni rosa', '52458754', 1, 'alma', '123', 'perro@gmail.com', '2020-02-11', '2020-04-15 05:00:00', 'coni rosa20', '123', '123'),
(2, 37, '1', 1, 'paula', '52458754', 1, 'rr', '11', 'paula@gmail.com', '2020-10-20', '2020-09-29 05:00:00', 'user20', '123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `cod_detalle` int(11) NOT NULL,
  `nombreD` varchar(20) DEFAULT NULL,
  `precioD` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `img_deta` varchar(50) DEFAULT NULL,
  `descripcionD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`cod_detalle`, `nombreD`, `precioD`, `id_categoria`, `img_deta`, `descripcionD`) VALUES
(4, 'kit apoyo nutriciona', 60000, 9, '1.jpg', '5 fertilizantes (top crop):enraizante, barrera, base vegetacion, complemento floracion y base de floracion  '),
(5, 'tripak top crop', 100000, 9, '2.jpg', 'enraizante y base de floracion y vegetacion '),
(7, 'tri pack litro(top c', 200000, 2, '2.jpg', 'enraizante 250 ml, base floracion 1 litro  y vegetacion 1 litro '),
(8, 'desayuno abue', 66000, 1, NULL, 'desayuno abue'),
(9, 'galleta chocolate', 3000, 8, NULL, '5 galletas de chocolate'),
(15, 'luz led', 150000, 11, '1.jpg', '50 watts'),
(22, 'kit autocultivo', 70000, 2, '1.jpg', '2 materas y 1 semilla');

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
(2, 4, '5'),
(1, 5, '5'),
(1, 5, '5'),
(2, 4, '5'),
(3, 15, '5'),
(1, 5, '5'),
(4, 9, '5'),
(4, 9, '5'),
(3, 7, '5'),
(5, 5, '5'),
(5, 8, '5'),
(6, NULL, '5'),
(7, NULL, '5'),
(8, NULL, '5'),
(9, NULL, '5'),
(10, NULL, '5'),
(1, 8, '5'),
(11, 4, '5'),
(11, NULL, '5'),
(10, NULL, '5'),
(12, NULL, '5'),
(12, NULL, '5'),
(13, NULL, '5'),
(14, NULL, '5'),
(15, NULL, 'inicial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

CREATE TABLE `detalle_producto` (
  `cod_productos` int(4) DEFAULT NULL,
  `cantidad_p` int(11) NOT NULL,
  `cod_detalle` int(11) DEFAULT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `cant_pl` int(11) NOT NULL,
  `cod_semilla` int(11) DEFAULT NULL,
  `cant_se` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_producto`
--

INSERT INTO `detalle_producto` (`cod_productos`, `cantidad_p`, `cod_detalle`, `id_planta`, `cant_pl`, `cod_semilla`, `cant_se`, `valor`) VALUES
(1, 0, 4, NULL, 0, NULL, 0, 1),
(2, 0, 4, NULL, 0, NULL, 0, NULL),
(2, 0, 22, NULL, 0, NULL, 0, NULL),
(NULL, 0, 22, 10, 0, NULL, 0, NULL);

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
(1, 1, 1, 'cr 13', '2020-04-15', '02:02:00', '52458754', '1', '2020-04-14'),
(2, 1, 1, '34567', '2020-04-06', '13:59:00', '00000000', '1', '2020-04-06'),
(3, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '1244', 'ini', '2020-04-08'),
(4, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '346789', 'inicia', '2020-04-08'),
(5, 1, 1, 'calle 94 # 72a 92', '2020-04-01', '94:45:35', '22222', '1', '2020-04-08'),
(6, 1, 1, 'medellin', '2020-09-30', '03:49:00', '52458754', '1', '2020-10-05'),
(9, 1, 2, 'colon', '2020-10-01', '02:04:00', '52458754', '1', '2020-10-01'),
(10, 2, 1, 'ggg', '2020-10-07', '18:07:00', '34567', '1', '2020-10-28'),
(11, 2, 1, '4444', '2020-10-04', '19:00:00', '4444', '1', '2020-10-08'),
(12, 2, 2, '99999', '2020-10-09', '28:00:00', '99999', '1', '2020-10-09'),
(13, 2, 1, '777', '2020-10-07', '36:00:00', '7777', '1', '2020-10-01'),
(14, 1, 1, '6666', '2020-10-06', '38:00:00', '6666', '1', '2020-10-01');

--
-- Disparadores `domicilio`
--
DELIMITER $$
CREATE TRIGGER `crea_pedido_despues_de_crear_domicilio` AFTER INSERT ON `domicilio` FOR EACH ROW BEGIN
INSERT pedido
SET 
cod_domicilios = new.cod_domicilio; 
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
(1, 'pau', 'alma', 'asesor', 'pau@gmail.com', 21, 'sa', '', '2020-04-06', 2, 13, '23789', 1),
(2, 'julian', 'navas', 'administrador', 'pa@gmail.com', 25, 'sanitas', '1', '2020-10-13', 1, 5000, '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id_especieS` int(11) NOT NULL,
  `nombreS` varchar(50) DEFAULT NULL,
  `observacionE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id_especieS`, `nombreS`, `observacionE`) VALUES
(1, 'indica', 'indica bla bla'),
(2, 'sativa', 'sativa bla bla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `observacion` text DEFAULT NULL
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
(7, 5, 0, 0, 1),
(8, 1, 0, 0, 1),
(9, 6, 0, 0, 1),
(10, 9, 0, 0, 2),
(11, 10, NULL, NULL, 2),
(12, 11, NULL, NULL, 3),
(13, 12, NULL, NULL, 3),
(14, 13, NULL, NULL, 2),
(15, 14, NULL, NULL, 3);

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
  `cod_semilla` int(11) DEFAULT NULL,
  `nombre_planta` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_planta`, `fecha_registro`, `estado`, `observacion`, `id_especieP`, `cod_semilla`, `nombre_planta`, `tipo`) VALUES
(8, '2020-04-15', 1, 'ffffy', 1, NULL, 'blueberry', 'regular'),
(10, '2020-10-09', 2, '11 rosas julian', 2, 12, '11 rosas julian', 'regular'),
(11, '2020-10-09', 2, 'chocolopez', 1, 12, 'chocolopez', 'regular');

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
(1, 1, 'fertilizante', 22, 'fertilizante', 22000),
(2, 4, 'matera', 22, 'matera', 4000),
(12, 4, 'TIERRA', 2, 'tierra ', 2000),
(13, 4, 'tarros para fertilizantes', 500, 'tarros pequeños', 500),
(14, 4, 'humus', 3, 'tierra ', 8000),
(15, 4, 'stikers', 1000, 'regalo', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cod_proveedor` int(4) NOT NULL,
  `direccion` varchar(99) DEFAULT NULL,
  `tel_proveedor` varchar(50) DEFAULT NULL,
  `nomP` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cod_proveedor`, `direccion`, `tel_proveedor`, `nomP`) VALUES
(0, 'cll 26 19', '55', 'CORAZON VERDE'),
(1, 'cedritos', '32211254', 'TOP CROP'),
(2, 'cll cali', '31010101', 'MILLS'),
(4, 'FERIAS', '123355', 'SSS');

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
(1, 'administrador', 'administrador', '1'),
(9, 'grow shop', 'grow', '1'),
(10, 'socios', 'pequeños empresarios', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semillas`
--

CREATE TABLE `semillas` (
  `cod_semilla` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_registroS` date DEFAULT NULL,
  `id_especieS` int(11) DEFAULT NULL,
  `observacionS` text DEFAULT NULL,
  `cod_proveedor` int(11) DEFAULT NULL,
  `tipoS` varchar(20) DEFAULT NULL,
  `nombre_semilla` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `semillas`
--

INSERT INTO `semillas` (`cod_semilla`, `estado`, `fecha_registroS`, `id_especieS`, `observacionS`, `cod_proveedor`, `tipoS`, `nombre_semilla`) VALUES
(12, 1, '2020-10-08', 1, 'blueberry', 2, 'feminizada', 'blueberry'),
(20, 1, '2020-10-14', 1, ' cookies', 0, 'regular', 'cookies');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3427;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `cod_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `cod_domicilio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `cod_empleado` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id_especieS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `cod_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `cod_proveedor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `semillas`
--
ALTER TABLE `semillas`
  MODIFY `cod_semilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `plantas_ibfk_1` FOREIGN KEY (`cod_semilla`) REFERENCES `semillas` (`cod_semilla`),
  ADD CONSTRAINT `plantas_ibfk_2` FOREIGN KEY (`id_especieP`) REFERENCES `especies` (`id_especieS`);

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
