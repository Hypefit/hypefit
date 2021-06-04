-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: vm18.db.swarm.test
-- Tiempo de generación: 04-06-2021 a las 16:44:39
-- Versión del servidor: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hypefit`
--
CREATE DATABASE IF NOT EXISTS `hypefit` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `hypefit`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_post`
--

DROP TABLE IF EXISTS `comentarios_post`;
CREATE TABLE `comentarios_post` (
  `id` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comentario` text NOT NULL,
  `idComentarioPadre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_receta`
--

DROP TABLE IF EXISTS `comentarios_receta`;
CREATE TABLE `comentarios_receta` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idReceta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_rutina`
--

DROP TABLE IF EXISTS `comentarios_rutina`;
CREATE TABLE `comentarios_rutina` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `idCreador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias`
--

DROP TABLE IF EXISTS `insignias`;
CREATE TABLE `insignias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `rutaImagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias_usuarios`
--

DROP TABLE IF EXISTS `insignias_usuarios`;
CREATE TABLE `insignias_usuarios` (
  `idInsignia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

DROP TABLE IF EXISTS `recetas`;
CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `idNutricionista` int(11) NOT NULL,
  `receta` text NOT NULL,
  `categoria` enum('normal','vegana','vegetariana','') NOT NULL,
  `imagen` varchar(100) NOT NULL DEFAULT ' ',
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

DROP TABLE IF EXISTS `rutinas`;
CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `idEntrenador` int(11) NOT NULL,
  `rutina` text NOT NULL,
  `categoria` enum('superior','inferior','full body','') NOT NULL,
  `imagen` varchar(100) NOT NULL DEFAULT ' ',
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas_usuarios`
--

DROP TABLE IF EXISTS `rutinas_usuarios`;
CREATE TABLE `rutinas_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `completada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hashPassword` varchar(255) NOT NULL,
  `rol` enum('registrado','entrenador','nutricionista','administrador') NOT NULL,
  `aprobado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios_post`
--
ALTER TABLE `comentarios_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost` (`idPost`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `comentarios_post_ibfk_3` (`idComentarioPadre`);

--
-- Indices de la tabla `comentarios_receta`
--
ALTER TABLE `comentarios_receta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idReceta` (`idReceta`);

--
-- Indices de la tabla `comentarios_rutina`
--
ALTER TABLE `comentarios_rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idRutina` (`idRutina`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCreador` (`idCreador`);

--
-- Indices de la tabla `insignias`
--
ALTER TABLE `insignias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insignias_usuarios`
--
ALTER TABLE `insignias_usuarios`
  ADD PRIMARY KEY (`idInsignia`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creador` (`creador`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntrenador` (`idNutricionista`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEntrenador` (`idEntrenador`);

--
-- Indices de la tabla `rutinas_usuarios`
--
ALTER TABLE `rutinas_usuarios`
  ADD PRIMARY KEY (`idUsuario`,`idRutina`),
  ADD KEY `rutinas_usuarios_ibfk_1` (`idUsuario`),
  ADD KEY `rutinas_usuarios_ibfk_2` (`idRutina`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios_post`
--
ALTER TABLE `comentarios_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_receta`
--
ALTER TABLE `comentarios_receta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios_rutina`
--
ALTER TABLE `comentarios_rutina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insignias`
--
ALTER TABLE `insignias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_post`
--
ALTER TABLE `comentarios_post`
  ADD CONSTRAINT `comentarios_post_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_post_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_post_ibfk_3` FOREIGN KEY (`idComentarioPadre`) REFERENCES `comentarios_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios_receta`
--
ALTER TABLE `comentarios_receta`
  ADD CONSTRAINT `comentarios_receta_ibfk_1` FOREIGN KEY (`idReceta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_receta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios_rutina`
--
ALTER TABLE `comentarios_rutina`
  ADD CONSTRAINT `comentarios_rutina_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_rutina_ibfk_3` FOREIGN KEY (`idRutina`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `relacion` FOREIGN KEY (`idCreador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insignias_usuarios`
--
ALTER TABLE `insignias_usuarios`
  ADD CONSTRAINT `insignias_usuarios_ibfk_1` FOREIGN KEY (`idInsignia`) REFERENCES `insignias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insignias_usuarios_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`idNutricionista`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD CONSTRAINT `rutinas_ibfk_1` FOREIGN KEY (`idEntrenador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rutinas_usuarios`
--
ALTER TABLE `rutinas_usuarios`
  ADD CONSTRAINT `rutinas_usuarios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutinas_usuarios_ibfk_2` FOREIGN KEY (`idRutina`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
