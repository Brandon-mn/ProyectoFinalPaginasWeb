-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 19:57:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinalfarmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `fecha`, `hora`, `id_paciente`, `id_medico`, `estatus`) VALUES
(6, '2023-05-09', '09:00:00', 1, 1, b'0'),
(7, '0000-00-00', '00:00:01', 2, 2, b'0'),
(8, '0000-00-00', '08:00:00', 1, 2, b'0'),
(9, '2023-05-18', '06:42:00', 1, 1, b'1'),
(10, '2023-05-24', '08:29:00', 2, 2, b'1'),
(12, '2023-06-01', '22:11:00', 1, 2, b'1'),
(13, '2023-05-16', '00:21:00', 2, 2, b'0'),
(14, '2023-05-31', '08:20:00', 2, 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `id_consultorio` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `horario` varchar(150) NOT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`id_consultorio`, `direccion`, `telefono`, `nombre`, `horario`, `estatus`) VALUES
(5, 'asd', '123', '', '', b'0'),
(6, 'gddfdf', '123', '', '', b'0'),
(7, 'vxc', '34', '', '', b'0'),
(8, 'prueba 2 ', '2555', 'modificado', '9:00am a 11:00pm', b'1'),
(9, 'cvxcvcxv', '34', '', '', b'1'),
(10, 'sadasxa', '34', '', '', b'0'),
(11, 'fe', '754656', '', '', b'0'),
(12, 'fafafa', '124314', '', '', b'0'),
(13, 'por hay', '8662384527', '', '', b'1'),
(14, 'aja si claro', '124124', '', '', b'1'),
(15, 'ajajajsad ja', '124132413', '', '', b'1'),
(16, 'mi casa', '8546546564', 'consultorio chidorris', '3565564', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id_enfermedad` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `sintomas` varchar(250) NOT NULL,
  `gravedad` varchar(150) NOT NULL,
  `mortalidad` varchar(150) NOT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`id_enfermedad`, `nombre`, `sintomas`, `gravedad`, `mortalidad`, `estatus`) VALUES
(1, 'pss', 'prueba', 'media', '123', b'0'),
(2, 'prueba2', 'sintomas', 'gravedad', 'asdasdasad', b'1'),
(3, '', '', '', '', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE `historial_medico` (
  `id_historial` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_medico`
--

INSERT INTO `historial_medico` (`id_historial`, `fecha`, `descripcion`, `id_paciente`, `estatus`) VALUES
(1, '2023-05-30', 'adasdasdasads', 1, b'1'),
(2, '2023-05-03', '00:17', 2, b'1'),
(3, '2023-05-17', '10:20', 1, b'0'),
(4, '2023-05-18', 'asdasd', 2, b'0'),
(5, '2023-05-31', 'prueba', 2, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `Experiencia` varchar(150) NOT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id_medico`, `nombre`, `apellidos`, `especialidad`, `Experiencia`, `estatus`) VALUES
(1, 'gilberto', 'treviño', 'pediatra', '1 DIA', b'1'),
(2, 'marcos', 'palomo', 'quimios', '5 años', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `apellidos`, `direccion`, `telefono`, `estatus`) VALUES
(1, 'pepe', 'lira', 'frontera', '134213', b'1'),
(2, 'yayo', 'diaz', 'su casa', '465465', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_medico_consultorio`
--

CREATE TABLE `relacion_medico_consultorio` (
  `idmedicoconsultorio` int(11) NOT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `id_consultorio` int(11) DEFAULT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `relacion_medico_consultorio`
--

INSERT INTO `relacion_medico_consultorio` (`idmedicoconsultorio`, `id_medico`, `id_consultorio`, `estatus`) VALUES
(1, 2, 8, b'0'),
(2, 1, 8, b'1'),
(3, 1, 16, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `duracion` varchar(250) NOT NULL,
  `dosis` varchar(150) NOT NULL,
  `costo` varchar(150) NOT NULL,
  `id_enfermedad` int(11) DEFAULT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id_tratamiento`, `descripcion`, `duracion`, `dosis`, `costo`, `id_enfermedad`, `estatus`) VALUES
(1, 'asdsad', '6265', '549', '654', 1, b'0'),
(2, 'asd', 'dddd', 'hhhhhhhhhhhhhh', '14', 2, b'0'),
(3, 'test', 'asd', 'asd', '21413432', 1, b'0'),
(4, 'asd', 'asd', 'asd', '22222222222222222222', 2, b'1'),
(5, 'sss', 'ssss', 'dss', '123123', 2, b'1'),
(6, 'wewwwww', 'www', 'wwww', '499849898595', 2, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `estatus` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contraseña`, `estatus`) VALUES
(2, 'jesus', 'gonzales', 'jesusGOD@gimal.com', '$2y$10$wdjEC5MxbUOOde7/cMUl7.JseH/S6sGYI/EamjDhmwwFcl.wK3GtC', b'1'),
(3, 'jared', 'tovar', 'basadin@gmail.com', '$2y$10$vin4vo4RDThtQGN/.6e3DuvS0Oc7huqb3lrdKD7a8os1GhZ9PYmzO', b'1'),
(4, 'yayo', 'diaz', 'chabeador@gmail.com', '$2y$10$ikgq6MOgp6opzHkp4uqm5uBze9nPYjzRa5uS2N/IHTrXlHEiokhLu', b'1'),
(5, 'miltonj', 'c', 'milton@gmail.com', '$2y$10$0hmSPipUagQkkpUWQtz5L.VXWxC4GfGavsOShDPKwybibX9VjsZRa', b'1'),
(6, 'pepe', 'chuy', 'pepedefer@gmail.com', '$2y$10$fUD78xr11IcOaEh1.vBkpOna8WdZKjfQH5596Vozj0TKvJOig4Ivy', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`id_consultorio`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `relacion_medico_consultorio`
--
ALTER TABLE `relacion_medico_consultorio`
  ADD PRIMARY KEY (`idmedicoconsultorio`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_consultorio` (`id_consultorio`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `id_consultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `relacion_medico_consultorio`
--
ALTER TABLE `relacion_medico_consultorio`
  MODIFY `idmedicoconsultorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`);

--
-- Filtros para la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD CONSTRAINT `historial_medico_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `relacion_medico_consultorio`
--
ALTER TABLE `relacion_medico_consultorio`
  ADD CONSTRAINT `relacion_medico_consultorio_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`),
  ADD CONSTRAINT `relacion_medico_consultorio_ibfk_2` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorio` (`id_consultorio`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
