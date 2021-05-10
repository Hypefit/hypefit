-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2021 a las 19:06:43
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_post`
--

CREATE TABLE `comentarios_post` (
  `id` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_post`
--

INSERT INTO `comentarios_post` (`id`, `idPost`, `idUsuario`, `fecha`, `comentario`) VALUES
(1, 1, 3, '2021-04-14 16:04:36', 'Me encanta Hypefit, es la mejor web para ponerse en forma!'),
(2, 1, 1, '2021-04-14 16:04:59', 'Muchas gracias Paco por tu apoyo :)'),
(3, 1, 1, '2021-04-15 15:17:38', 'Todos sois bienvenidos si queréis poner vuestra opinión!'),
(5, 3, 4, '2021-04-16 17:05:20', 'Hola! Si alguien necesita cualquier consejo, estoy dispuesta a responderos a todos por aquí!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_rutina`
--

CREATE TABLE `comentario_rutina` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `creador` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `creador`, `titulo`) VALUES
(1, 3, 'Hypefit, la mejor web!'),
(3, 4, 'Preguntad vuestras dudas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `idNutricionista` int(11) NOT NULL,
  `receta` text NOT NULL,
  `categoria` enum('normal','vegana','vegetariana','') NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `idEntrenador` int(11) NOT NULL,
  `rutina` text NOT NULL,
  `categoria` enum('superior','inferior','full body','') NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id`, `idEntrenador`, `rutina`, `categoria`, `titulo`) VALUES
(1, 2, '1. Press banca: 4 series x 8 repeticiones\r\n2. Press banca con mancuernas a 45 grados: 4 series x 12 repeticiones\r\n3. Flexiones: 3 series x fallo\r\n4. Cruce de poleas: 3 series x 15 repeticiones', 'superior', 'Rutina de pecho'),
(2, 4, '1. Sentadilla: 5 series x 5 repeticiones\r\n2. Zancada: 3 series x 10 repeticiones\r\n3. Gemelo: 3 series x fallo', 'inferior', 'Rutina de pierna'),
(3, 4, '1. Dominadas: 4 series x fallo\r\n2. Press banca: 4 series x 10 repeticiones\r\n3. Press militar: 4 series x 8 repeticiones\r\n4. Femoral: 3 series x 12 repeticiones', 'full body', 'Rutina de cuerpo completo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas_usuarios`
--

CREATE TABLE `rutinas_usuarios` (
  `idUsuario` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `completada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hashPassword` varchar(255) NOT NULL,
  `rol` enum('registrado','entrenador','nutricionista','administrador') NOT NULL,
  `aprobado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `hashPassword`, `rol`, `aprobado`) VALUES
(1, 'Administrador', 'admin@hypefit.com', '$2y$10$aU0RixqtKqZBcSQwvj4wV.ha8iAIGaAIAlb9ukJVjbZhG/Pc2hOPa', 'administrador', 1),
(2, 'Pepe López', 'pepelopez@gmail.com', '$2y$10$y/ICppPVz43BikxqXCXjve5qWIWjjB8.hCqFF5yR5V9BtC5aw4LHu', 'entrenador', 1),
(3, 'Paco Fernández', 'pacofernandez@gmail.com', '$2y$10$Rl8EHx/EQ1zh40PEQv8k.e0M7PzVidrb.muCgtvbsLJIeov6W31am', 'registrado', 1),
(4, 'Paula Pérez', 'paulaperez@gmail.com', '$2y$10$xnHkK5RB6XCU0rbGg53ZGOe9h.bn8e9W5YBVnhTD5zwxq.ZYcuPBC', 'entrenador', 1),
(5, 'Laura Hernández', 'laurahernandez@gmail.com', '$2y$10$EGSUPiTf4fyzDo8qc6cn5.7M42czcZIv5nd80o2vQeTpt7afLnh1e', 'entrenador', 0),
(6, 'Adrián Sánchez', 'adriansanchez@gmail.com', '$2y$10$fOT9MjiCjZ34Xvp5dUYeB.7MqH.a0ecjLLNfDczwP9l6iVxZdvIZG', 'nutricionista', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios_post`
--
ALTER TABLE `comentarios_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost` (`idPost`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `comentario_rutina`
--
ALTER TABLE `comentario_rutina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idRutina` (`idRutina`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentario_rutina`
--
ALTER TABLE `comentario_rutina`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios_post`
--
ALTER TABLE `comentarios_post`
  ADD CONSTRAINT `comentarios_post_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_post_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario_rutina`
--
ALTER TABLE `comentario_rutina`
  ADD CONSTRAINT `comentario_rutina_ibfk_1` FOREIGN KEY (`id`) REFERENCES `rutinas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_rutina_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
