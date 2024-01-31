-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2024 a las 23:47:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `usuario`, `event`, `event_date`) VALUES
(1, 'admin', 'Sesión iniciada', '0000-00-00 00:00:00'),
(2, 'admin', 'Sesión cerrada', '2024-01-12 14:37:39'),
(3, 'admin', 'Sesión iniciada', '0000-00-00 00:00:00'),
(4, 'admin', 'Sesión iniciada', '0000-00-00 00:00:00'),
(5, 'admin', 'Sesión iniciada', '0000-00-00 00:00:00'),
(6, 'admin', 'Sesión iniciada', '2024-01-12 14:41:07'),
(7, 'admin', 'Sesión iniciada', '2024-01-12 14:43:07'),
(8, 'admin', 'Sesión iniciada', '2024-01-12 14:45:48'),
(9, 'admin', 'Sesión iniciada', '2024-01-12 14:53:17'),
(10, 'admin', 'Sesión iniciada', '2024-01-12 14:53:37'),
(11, 'admin', 'Sesión iniciada', '2024-01-12 14:55:22'),
(12, 'admin', 'Sesión iniciada', '2024-01-12 15:11:07'),
(13, 'admin', 'Sesión iniciada', '2024-01-12 15:11:32'),
(14, 'admin', 'Sesión iniciada', '2024-01-12 15:14:19'),
(15, 'admin', 'Sesión cerrada', '2024-01-12 15:16:05'),
(16, 'admin', 'Sesión iniciada', '2024-01-12 15:16:12'),
(17, 'admin', 'Sesión cerrada', '2024-01-12 15:16:16'),
(18, 'admin', 'Sesión iniciada', '2024-01-12 15:16:23'),
(19, 'admin', 'Sesión cerrada', '2024-01-12 11:22:28'),
(20, 'admin', 'Sesión iniciada', '2024-01-12 15:22:34'),
(21, 'admin', 'Sesión cerrada', '2024-01-12 15:23:15'),
(22, 'admin', 'Sesión iniciada', '2024-01-12 15:23:20'),
(23, 'admin', 'Sesión cerrada', '2024-01-12 15:23:29'),
(24, 'admin', 'Sesión iniciada', '2024-01-12 15:23:33'),
(25, 'admin', 'Sesión cerrada', '2024-01-12 15:26:43'),
(26, 'admin', 'Sesión iniciada', '2024-01-12 15:26:49'),
(27, 'admin', 'Sesión iniciada', '2024-01-12 15:27:29'),
(28, 'admin', 'Sesión cerrada', '2024-01-12 15:27:30'),
(29, 'admin', 'Sesión iniciada', '2024-01-12 15:27:40'),
(30, 'admin', 'Sesión iniciada', '2024-01-12 15:30:38'),
(31, '', 'Nuevo médico registrado: FDSGSDF', '2024-01-12 16:38:44'),
(32, '', 'Nuevo médico registrado: FDSGSDF', '2024-01-12 16:39:27'),
(33, '', 'Nuevo médico registrado: FABIAN', '2024-01-12 16:40:37'),
(34, 'admin', 'Sesión cerrada', '2024-01-12 16:43:27'),
(35, 'admin', 'Sesión iniciada', '2024-01-12 16:43:35'),
(36, '', 'Nuevo médico registrado: HOLA', '2024-01-12 16:45:28'),
(37, 'admin', 'Sesión iniciada', '2024-01-12 16:47:17'),
(38, 'admin', 'Sesión cerrada', '2024-01-12 16:51:10'),
(39, 'admin', 'Sesión iniciada', '2024-01-12 16:51:16'),
(40, '', 'Nuevo médico registrado: HOLA', '2024-01-12 16:51:53'),
(41, '', 'Nuevo médico registrado: HOLA', '2024-01-12 16:57:10'),
(42, '', 'Nuevo médico registrado: HOLA', '2024-01-12 16:58:09'),
(43, 'admin', 'Nuevo médico registrado: KEVIN', '2024-01-12 16:59:43'),
(44, 'admin', 'Nuevo médico registrado: KEVIN', '2024-01-12 17:24:32'),
(45, 'admin', 'Médico eliminado: FDSGSDF', '2024-01-12 17:29:47'),
(46, 'admin', 'Médico eliminado: KEVIN', '2024-01-12 17:29:59'),
(47, 'admin', 'Médico eliminado: KEVIN', '2024-01-12 17:31:02'),
(48, 'admin', 'Médico eliminado: FABIAN', '2024-01-12 17:31:14'),
(49, 'admin', 'Médico eliminado: FDSGSDF', '2024-01-12 17:31:32'),
(50, 'root', 'Médico del medico actulizados', '2024-01-12 18:45:55'),
(51, 'root', 'Médico actualizado', '2024-01-12 18:48:08'),
(52, 'admin', 'Sesión cerrada', '2024-01-12 18:48:19'),
(53, 'admin', 'Sesión iniciada', '2024-01-12 18:48:27'),
(54, 'admin', 'Sesión cerrada', '2024-01-12 18:51:03'),
(55, 'admin', 'Sesión iniciada', '2024-01-12 18:51:59'),
(56, '', 'Nuevo paciente registrado - ID: 23', '2024-01-12 19:14:28'),
(57, '', 'Nuevo paciente registrado - ID: 25, Nombre: LIZEWGFSFGVVWEV', '2024-01-12 19:18:21'),
(58, 'root', 'Paciente actualizado', '2024-01-12 20:10:25'),
(59, 'admin', 'Paciente eliminado: ', '2024-01-12 20:13:08'),
(60, 'admin', 'Paciente eliminado: LIZ', '2024-01-12 20:14:58'),
(61, '', 'Nuevo tratamiento registrado, Nombre: EL MORTAL', '2024-01-12 20:24:50'),
(62, 'admin', 'Tratamiento  eliminado: EL MORTAL', '2024-01-12 20:27:16'),
(63, '', 'Tratamiento actualizado', '2024-01-12 20:36:49'),
(64, '', 'Tratamiento actualizado', '2024-01-12 20:37:46'),
(65, '', 'Tratamiento actualizado', '2024-01-12 20:38:17'),
(66, '', 'Nuevo turno creado - Número de Boleta: 491482', '2024-01-12 22:02:33'),
(67, '', 'Nuevo turno creado - Número de Boleta: 844827', '2024-01-12 22:14:04'),
(68, 'admin', 'Sesión cerrada', '2024-01-12 22:33:23'),
(69, 'admin', 'Sesión iniciada', '2024-01-12 22:33:29'),
(70, 'admin', 'Sesión cerrada', '2024-01-12 22:33:30'),
(71, 'admin', 'Sesión iniciada', '2024-01-12 22:33:47'),
(72, 'admin', 'Sesión cerrada', '2024-01-12 22:33:57'),
(73, 'admin', 'Sesión iniciada', '2024-01-12 22:34:10'),
(74, 'admin', 'Sesión cerrada', '2024-01-12 22:34:14'),
(75, 'admin', 'Sesión iniciada', '2024-01-12 22:34:24'),
(76, 'admin', 'Paciente eliminado: LIZEWGFSFGVVWEV', '2024-01-12 22:35:11'),
(77, 'root', 'Paciente actualizado', '2024-01-12 22:35:22'),
(78, '', 'Nuevo turno creado - Número de Boleta: 181961', '2024-01-12 22:36:37'),
(79, 'admin', 'Sesión cerrada', '2024-01-12 22:41:20'),
(80, 'admin', 'Sesión iniciada', '2024-01-12 22:51:56'),
(81, 'admin', 'Sesión cerrada', '2024-01-12 22:52:07'),
(82, 'admin', 'Sesión iniciada', '2024-01-12 22:52:50'),
(83, 'admin', 'Sesión cerrada', '2024-01-12 22:52:53'),
(84, 'admin', 'Sesión iniciada', '2024-01-12 22:55:43'),
(85, 'admin', 'Sesión cerrada', '2024-01-12 22:55:46'),
(86, 'admin', 'Sesión iniciada', '2024-01-12 22:57:01'),
(87, 'admin', 'Sesión cerrada', '2024-01-12 23:01:00'),
(88, 'admin', 'Sesión iniciada', '2024-01-12 23:01:30'),
(89, 'admin', 'Sesión cerrada', '2024-01-12 23:02:29'),
(90, 'admin', 'Sesión iniciada', '2024-01-12 23:02:51'),
(91, 'admin', 'Sesión cerrada', '2024-01-12 23:03:05'),
(92, 'admin', 'Sesión iniciada', '2024-01-12 23:38:47'),
(93, 'admin', 'Nuevo turno creado - Número de Boleta: 404337', '2024-01-12 23:41:43'),
(94, 'admin', 'Nuevo turno creado - Número de Boleta: 242873', '2024-01-12 23:42:26'),
(95, 'admin', 'Nuevo turno creado - Número de Boleta: 228972', '2024-01-12 23:45:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `id_turno` int(11) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `id_turno`, `contenido`, `fecha_creacion`) VALUES
(1, 6, '<div class=\'factura\'><h2>Factura</h2><p><strong>Nombre del Paciente:</strong> JUAN</p><p><strong>Cédula del Paciente:</strong> 2147483647</p><p><strong>Nombre del Médico:</strong> FDSGSDF</p><p><strong>Tratamiento:</strong> ORTODONCIA</p><p><strong>Precio:</strong> 55000</p></div>', '2024-01-12 22:41:43'),
(2, 7, '<div class=\'factura\'><h2>Factura</h2><p><strong>Nombre del Paciente:</strong> JUAN</p><p><strong>Cédula del Paciente:</strong> 2147483647</p><p><strong>Nombre del Médico:</strong> KEKE</p><p><strong>Tratamiento:</strong> EXTRA</p><p><strong>Precio:</strong> 5000</p></div>', '2024-01-12 22:42:26'),
(3, 8, '<div class=\'factura\'><h2>Factura</h2><p><strong>Nombre del Paciente:</strong> FERNANDO</p><p><strong>Cédula del Paciente:</strong> 3888485</p><p><strong>Nombre del Médico:</strong> HOLA</p><p><strong>Tratamiento:</strong> ORTODONCIA</p><p><strong>Precio:</strong> 55000</p></div>', '2024-01-12 22:45:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` text NOT NULL,
  `direccion` text NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nombre`, `fecha_nacimiento`, `telefono`, `correo`, `direccion`, `cedula`) VALUES
(5, 'KEKE', '2023-11-23', 973175954, 'kekeparedes@gmail.com', '12 de octubre', 7119858),
(7, 'FDSGSDF', '3445-03-04', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(10, 'ALE', '2000-06-05', 2147483647, 'alegrek566@gmail.co', 'tape guazu', 543456),
(12, 'HOLA', '2000-08-07', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(13, 'HOLA', '4454-04-04', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(14, 'HOLA', '4454-04-04', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(15, 'HOLA', '2003-04-04', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(16, 'HOLA', '2002-05-31', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564),
(17, 'KEVIN', '2222-02-22', 2147483647, 'alegrek566@gmail.com', 'tape guazu', 5434564);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `cedula` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `cedula`, `fecha_nacimiento`) VALUES
(1, 'JUAN', 2147483647, '2023-11-13'),
(22, 'FERNANDO', 3888485, '2000-04-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `fecha` time NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `nombre`, `precio`) VALUES
(17, 'EXTRA', 5000),
(18, 'ORTODONCIA', 55000),
(19, 'EL MORTAL', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `numero_boleta` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `id_tratamiento` int(11) DEFAULT NULL,
  `fecha_atencion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `numero_boleta`, `id_paciente`, `id_medico`, `id_tratamiento`, `fecha_atencion`) VALUES
(1, 491482, 1, 5, 18, '0000-00-00'),
(2, 844827, 22, 10, 19, '2024-01-26'),
(3, 181961, 22, 7, 19, '2024-01-23'),
(4, 195814, 1, 7, 18, '2024-01-19'),
(5, 794773, 1, 7, 18, '2024-01-19'),
(6, 404337, 1, 7, 18, '2024-01-19'),
(7, 242873, 1, 5, 17, '2024-02-08'),
(8, 228972, 22, 12, 18, '2024-01-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_activity_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `last_login_date`, `last_activity_date`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2024-01-12 23:38:47', '2024-01-13 03:38:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `turno_ibfk_3` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamiento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
