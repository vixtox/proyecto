-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 23:35:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bunglebuild`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `codComunidad` int(4) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`codComunidad`, `nombre`) VALUES
(1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Asturias (Principado de)'),
(4, 'Balears (IIles)'),
(5, 'Canarias'),
(6, 'Cantabria'),
(7, 'Castilla-La Mancha'),
(8, 'Castilla y León'),
(9, 'Cataluña'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Madrid (Comunidad de)'),
(14, 'Murcia (Región de)'),
(15, 'Navarra (Comunidad Foral de)'),
(16, 'País Vasco'),
(17, 'Rioja (La)'),
(18, 'Ceuta'),
(19, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `codPoblacion` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `codComunidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`codPoblacion`, `nombre`, `codComunidad`) VALUES
(1, 'Alava', 16),
(2, 'Albacete', 7),
(3, 'Alicante', 10),
(4, 'Almería', 1),
(5, 'Avila', 8),
(6, 'Badajoz', 11),
(7, 'Balears (Illes)', 4),
(8, 'Barcelona', 9),
(9, 'Burgos', 8),
(10, 'Cáceres', 11),
(11, 'Cádiz', 1),
(12, 'Castellón', 10),
(13, 'Ciudad Real', 7),
(14, 'Córdoba', 1),
(15, 'Coruña (A)', 12),
(16, 'Cuenca', 7),
(17, 'Girona', 9),
(18, 'Granada', 1),
(19, 'Guadalajara', 7),
(20, 'Guipzcoa', 16),
(21, 'Huelva', 1),
(22, 'Huesca', 2),
(23, 'Jaén', 1),
(24, 'León', 8),
(25, 'Lleida', 9),
(26, 'Rioja (La)', 17),
(27, 'Lugo', 12),
(28, 'Madrid', 13),
(29, 'Málaga', 1),
(30, 'Murcia', 14),
(31, 'Navarra', 15),
(32, 'Ourense', 12),
(33, 'Asturias', 3),
(34, 'Palencia', 8),
(35, 'Palmas (Las)', 5),
(36, 'Pontevedra', 12),
(37, 'Salamanca', 8),
(38, 'Santa Cruz de Tenerife', 5),
(39, 'Cantabria', 6),
(40, 'Segovia', 8),
(41, 'Sevilla', 1),
(42, 'Soria', 8),
(43, 'Tarragona', 9),
(44, 'Teruel', 2),
(45, 'Toledo', 7),
(46, 'Valencia', 10),
(47, 'Valladolid', 8),
(48, 'Vizcaya', 16),
(49, 'Zamora', 8),
(50, 'Zaragoza', 2),
(51, 'Ceuta', 18),
(52, 'Melilla', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(5) NOT NULL,
  `nif_cif` varchar(9) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `poblacion` varchar(30) DEFAULT NULL,
  `codigo_postal` int(5) DEFAULT NULL,
  `provincia` int(5) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `operario_encargado` varchar(30) DEFAULT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `anotaciones_ant` text DEFAULT NULL,
  `anotaciones_pos` text DEFAULT NULL,
  `arch_resumen` varchar(100) NOT NULL,
  `fotos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nif_cif`, `nombre`, `apellidos`, `telefono`, `descripcion`, `correo`, `direccion`, `poblacion`, `codigo_postal`, `provincia`, `estado`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotaciones_ant`, `anotaciones_pos`, `arch_resumen`, `fotos`) VALUES
(1, '09754775S', 'Jose', 'Chico Pérez', '657345234', 'Casa ruinosa', 'jose@gmail.com', 'Lavapies 54', 'Madrid', 28001, 28, 'P', '2022-12-11', '45678912L', '2023-01-06', 'Escombros por doquier', 'Escombros sacados', '', ''),
(2, '09754775S', 'Jose', 'Chico Pérez', '657345234', 'Casa ruinosa', 'jose@gmail.com', 'Lavapies 54', 'Madrid', 28001, 28, 'P', '2022-12-11', '45678912L', '2023-01-06', NULL, NULL, '', ''),
(3, '09754775S', 'Jose', 'Chico Pérez', '657345234', 'Casa ruinosa', 'jose@gmail.com', 'Lavapies 54', 'Madrid', 28001, 28, 'P', '2022-12-11', '45678912L', '2023-01-06', NULL, NULL, '', ''),
(4, '09754775S', 'Jose', 'Chico Pérez', '657345234', 'Casa ruinosa', 'jose@gmail.com', 'Lavapies 54', 'Madrid', 28001, 28, 'P', '2022-12-11', '45678912L', '2023-01-06', NULL, NULL, '', ''),
(6, '09754775S', 'Jose', 'Chico Pérez', '657345234', 'Casa ruinosa', 'jose@gmail.com', 'Lavapies 54', 'Madrid', 28001, 28, 'P', '2022-12-11', '45678912L', '2023-01-06', NULL, NULL, '', ''),
(7, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(8, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(9, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(10, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(11, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(12, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(13, '81456354Z', 'Luis', 'Moreno Sánchez', '657345678', 'Iglesia ruinosa', 'luis@gmail.com', 'Blas infante 5', 'Beas', 21630, 21, 'R', '2022-12-11', '48923735R', '2023-01-18', NULL, NULL, '', ''),
(14, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(15, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(16, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(17, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(18, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(19, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(20, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(21, '81916143X', 'Luis', 'Moreno Sánchez', '658689654', 'Garage ruinoso', 'ignacio@gmail.com', 'Curtidores 12', 'Calañas', 21300, 21, 'C', '2022-12-11', '46798712E', '2023-01-21', NULL, NULL, '', ''),
(22, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(23, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(24, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(25, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(26, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(27, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(28, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(29, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(30, '81916143X', 'Manuel', 'Matías Fesser', '654879008', 'Gallinero ruinoso', 'matias@gmail.com', 'Franco 5', 'La Zarza', 21310, 21, 'B', '2022-12-11', '56723465J', '2023-03-15', NULL, NULL, '', ''),
(31, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(32, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(33, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(34, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(35, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(36, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(37, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(38, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(39, '01374701Z', 'Ángel', 'Castro Machín', '658909090', 'Taller ruinoso', 'matias@gmail.com', 'Franco 5', 'Valverde del Camino', 21600, 21, 'P', '2022-12-11', '15160193L', '2023-04-01', NULL, NULL, '', ''),
(40, '09754775S', 'Víctor', 'Martínez Domínguez', '657121890', 'Tienda ruinosa', 'victor@hotmail.es', 'Calleja 24', 'Valverde del Camino', 21600, 21, 'C', '2022-12-11', '15160193L', '2022-12-28', NULL, NULL, '', '');

--
-- Disparadores `tareas`
--
DELIMITER $$
CREATE TRIGGER `inserta_fecha` BEFORE INSERT ON `tareas` FOR EACH ROW SET new.fecha_creacion = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `nombre`, `clave`, `correo`, `telefono`, `es_admin`) VALUES
('01976367T', 'Alfred', '1111', 'victor_mar_dom@hotmail.es', '959551767', 0),
('02597372M', 'Sánchez Berrocal, Pablo', '1111', 'pablo@gmail.com', '657121184', 1),
('15160193L', 'Matías Pernil, María Dolores', '1111', 'dolores@gmail.com', '959551767', 0),
('22831910V', 'Jeremias', '1111', 'jeremias@hotmail.es', '959551767', 0),
('45678912L', 'Ghenciu, Nicolae Adrián', '1111', 'nicolae@gmail.com', '654123789', 0),
('46798712E', 'Domínguez Bermúdez, Esteban', '1111', 'esteban@gmail.com', '642345129', 0),
('48923735R', 'Hinestrosa González, Rafael', '1111', 'rafael@gmail.com', '657121456', 0),
('48937834B', 'Martínez Domínguez, Víctor', '1111', 'victor@gmail.com', '657121378', 1),
('56723465J', 'López Gómez, Adrián', '1111', 'adrian@gmail.com', '654789339', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`codComunidad`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`codPoblacion`),
  ADD KEY `comAutonoma_fk` (`codComunidad`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operarioEncargado` (`operario_encargado`),
  ADD KEY `provincia` (`provincia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nif`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `comAutonoma_fk` FOREIGN KEY (`codComunidad`) REFERENCES `comunidades` (`codComunidad`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`codPoblacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
