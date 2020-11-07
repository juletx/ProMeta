-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2020 a las 12:23:49
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `process_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `methodology_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artifacts`
--

CREATE TABLE `artifacts` (
  `methodology_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artifact_sections`
--

CREATE TABLE `artifact_sections` (
  `methodology_id` int(11) NOT NULL,
  `artifact_id` int(11) NOT NULL,
  `section_number` float NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `section_guide` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `methodologies`
--

CREATE TABLE `methodologies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phases`
--

CREATE TABLE `phases` (
  `methodology_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `methodology_id` int(11) NOT NULL,
  `current_phase_id` int(11) DEFAULT 0,
  `current_activity_id` int(11) DEFAULT 0,
  `current_task_id` int(11) DEFAULT 0,
  `architect` varchar(100) DEFAULT NULL,
  `analyst` varchar(100) DEFAULT NULL,
  `analyst_username` varchar(100) NOT NULL,
  `process_creator` varchar(100) DEFAULT NULL,
  `project_manager` varchar(100) DEFAULT NULL,
  `project_manager_username` varchar(100) NOT NULL,
  `quality_manager` varchar(100) DEFAULT NULL,
  `quality_manager_username` varchar(100) NOT NULL,
  `tester` varchar(100) DEFAULT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `stakeholder` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `version` varchar(50) DEFAULT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_artifacts`
--

CREATE TABLE `project_artifacts` (
  `project_id` int(11) NOT NULL,
  `methodology_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `artifact_id` int(11) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `assessment_editor` int(11) DEFAULT NULL,
  `assessment_supervisor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `methodology_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `methodology_id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`methodology_id`,`phase_id`,`id`);

--
-- Indices de la tabla `artifacts`
--
ALTER TABLE `artifacts`
  ADD PRIMARY KEY (`methodology_id`,`id`);

--
-- Indices de la tabla `artifact_sections`
--
ALTER TABLE `artifact_sections`
  ADD PRIMARY KEY (`methodology_id`,`artifact_id`,`section_number`);

--
-- Indices de la tabla `methodologies`
--
ALTER TABLE `methodologies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`methodology_id`,`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_artifacts`
--
ALTER TABLE `project_artifacts`
  ADD PRIMARY KEY (`project_id`,`methodology_id`,`phase_id`,`activity_id`,`task_id`,`artifact_id`),
  ADD KEY `phase_id` (`methodology_id`,`phase_id`,`activity_id`,`task_id`),
  ADD KEY `artifact_id` (`methodology_id`,`artifact_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`methodology_id`,`id`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`methodology_id`,`phase_id`,`activity_id`,`id`),
  ADD KEY `role` (`role`),
  ADD KEY `tasks_ibfk_2` (`methodology_id`,`role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`methodology_id`,`phase_id`) REFERENCES `phases` (`methodology_id`, `id`);

--
-- Filtros para la tabla `artifacts`
--
ALTER TABLE `artifacts`
  ADD CONSTRAINT `artifacts_ibfk_1` FOREIGN KEY (`methodology_id`) REFERENCES `methodologies` (`id`);

--
-- Filtros para la tabla `artifact_sections`
--
ALTER TABLE `artifact_sections`
  ADD CONSTRAINT `artifact_sections_ibfk_1` FOREIGN KEY (`methodology_id`,`artifact_id`) REFERENCES `artifacts` (`methodology_id`, `id`);

--
-- Filtros para la tabla `phases`
--
ALTER TABLE `phases`
  ADD CONSTRAINT `phases_ibfk_1` FOREIGN KEY (`methodology_id`) REFERENCES `methodologies` (`id`);

--
-- Filtros para la tabla `project_artifacts`
--
ALTER TABLE `project_artifacts`
  ADD CONSTRAINT `project_artifacts_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_artifacts_ibfk_2` FOREIGN KEY (`methodology_id`,`phase_id`,`activity_id`,`task_id`) REFERENCES `tasks` (`methodology_id`, `phase_id`, `activity_id`, `id`),
  ADD CONSTRAINT `project_artifacts_ibfk_3` FOREIGN KEY (`methodology_id`,`artifact_id`) REFERENCES `artifacts` (`methodology_id`, `id`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`methodology_id`) REFERENCES `methodologies` (`id`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`methodology_id`,`phase_id`,`activity_id`) REFERENCES `activities` (`methodology_id`, `phase_id`, `id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`methodology_id`,`role`) REFERENCES `roles` (`methodology_id`, `id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
