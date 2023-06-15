-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 12:12:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofct`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `Activo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `nombre`, `descripcion`, `fecha_alta`, `fecha_baja`, `imagen`, `Activo`) VALUES
(1, 'Spining', 'Ejemplo', '0000-00-00', '0000-00-00', '', 'si'),
(25, 'Atleta', '', '2023-07-09', '2023-05-05', '../assets/imgBDD/', 'no'),
(50, 'drereere', 'eererere', '2023-05-05', '0000-00-00', '../assets/imgBDD/', 'si'),
(51, 'e', '', '2023-05-07', '2023-05-07', '../assets/imgBDD/', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_disponibilidad` int(255) NOT NULL,
  `id_clase` int(255) NOT NULL,
  `entrada` date NOT NULL,
  `salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `id_modalidad` int(255) NOT NULL,
  `id_clase` int(255) NOT NULL,
  `fecha_alta` int(255) NOT NULL,
  `fecha_baja` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_clase` int(255) NOT NULL,
  `compartida` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `Descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `tarifa` int(250) NOT NULL,
  `ID_rol` int(11) NOT NULL,
  `Activo` varchar(2) NOT NULL,
  `ID_clase` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `contraseña`, `nombre`, `apellidos`, `telefono`, `tarifa`, `ID_rol`, `Activo`, `ID_clase`) VALUES
('manu2002.03@gmail.com', '1234', 'Manuel', 'Ibáñez Sánchez', 111111111, 0, 1, 'si', 25),
('prueba@gmail.com', '1234', 'Prueba', 'Vega', 111111111, 0, 2, 'no', 25),
('registro@gmail.com', '1234', 'registro', 'erere', 123456789, 12, 2, 'no', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_disponibilidad`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`),
  ADD KEY `ID_rol` (`ID_rol`),
  ADD KEY `id_clase` (`ID_clase`),
  ADD KEY `ID_clase_2` (`ID_clase`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `id_disponibilidad` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `id_modalidad` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`ID_clase`) REFERENCES `clase` (`id_clase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
