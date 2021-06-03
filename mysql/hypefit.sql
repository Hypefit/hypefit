-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2021 a las 12:45:08
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
  `comentario` text NOT NULL,
  `idComentarioPadre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_post`
--

INSERT INTO `comentarios_post` (`id`, `idPost`, `idUsuario`, `fecha`, `comentario`, `idComentarioPadre`) VALUES
(1, 1, 3, '2021-04-14 16:04:36', 'Me encanta Hypefit, es la mejor web para ponerse en forma!', NULL),
(2, 1, 1, '2021-06-01 14:57:41', 'Muchas gracias Paco por tu apoyo :)', 1),
(3, 2, 5, '2021-05-14 10:24:48', 'No os perdáis las nuevas rutinas de full body que hemos preparado. ¡A ponerse en forma!', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_receta`
--

CREATE TABLE `comentarios_receta` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idReceta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_receta`
--

INSERT INTO `comentarios_receta` (`id`, `idUsuario`, `idReceta`, `fecha`, `valoracion`, `texto`) VALUES
(1, 2, 3, '2021-05-14 16:20:43', '5', 'Unos gofres deliciosos. ¡El postre perfecto!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_rutina`
--

CREATE TABLE `comentarios_rutina` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idRutina` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valoracion` enum('1','2','3','4','5') NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios_rutina`
--

INSERT INTO `comentarios_rutina` (`id`, `idUsuario`, `idRutina`, `fecha`, `valoracion`, `texto`) VALUES
(1, 5, 1, '2021-05-14 14:51:45', '5', 'Una rutina excelente, ¡mis pectorales se han quedado como rocas!'),
(2, 4, 1, '2021-05-14 14:51:45', '5', 'Volveré a repetir esta pedazo de rutina la semana que viene.\r\n'),
(3, 3, 1, '2021-05-14 14:52:36', '3', 'Hola! Esta rutina me ha resultado bastante mediocre para gente avanzada...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias`
--

CREATE TABLE `insignias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `rutaImagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insignias`
--

INSERT INTO `insignias` (`id`, `titulo`, `descripcion`, `rutaImagen`) VALUES
(1, 'Primer post', 'Has creado tu primer post en Hypefit.', 'img/insignias/PrimerPost.png'),
(2, 'Primera rutina completada', 'Has completado tu primera rutina de Hypefit.', 'img/insignias/PrimeraRutinaCompletada.png'),
(3, 'Todas las rutinas completadas', 'Has completado todas las rutinas de Hypefit.', 'img/insignias/TodasRutinasCompletadas.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignias_usuarios`
--

CREATE TABLE `insignias_usuarios` (
  `idInsignia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `idAutor`, `titulo`, `texto`, `filename`) VALUES
(1, 2, 'La falta de ejercicio fisico', 'En concreto, la actividad física diaria disminuyó 43,3 minutos; las conductas sedentarias aumentaron 50,2 minutos; y la calidad del sueño se redujo un 2,09%. El periodo de confinamiento también aumentó de manera negativa las conductas antisociales, de ansiedad y las relacionadas con la depresión.', 'Sleep.jpg');


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
(2, 3, 'Nuevas rutinas de full body!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `idNutricionista` int(11) NOT NULL,
  `receta` text NOT NULL,
  `categoria` enum('normal','vegana','vegetariana','') NOT NULL,
  `imagen` varchar(100) NOT NULL DEFAULT ' ',
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `idNutricionista`, `receta`, `categoria`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 7, '1. Cortar 60g de tempeh en dados e ir añadiéndolos a un cuenco.\r\n2.Añadir a los dados 0,5 cdta. pimentón y 1 cda. salsa de soja  y mezclar todo.\r\n3.Poner a calentar 1 cdta. de aceite de coco en una sartén. Añadirle los dados de tempeh y saltear 1-2 minutos por cada lado hasta que vayan dorando.\r\n4. A continuación, añadir 30g de edamame a la sartén y saltear todo junto hasta que vaya cogiendo algo de color.\r\n5. Mientras tanto, cortar 230g de zanahorias con un rallador de verduras en espiral e ir añadiendo las tiras a un cuenco.\r\n6. Verter 3/4 de la salsa de cacahuete sobre los tallarines y mezclar bien.\r\n7. Añadir a los tallarines el tempeh y el edamame y mezclar todo junto.\r\nCondimentar el plato con cilantro, cacahuetes molidos y guindillas, al gusto. \r\n9. Servir por encima el resto de la salsa de cacahuete', 'vegana', '', 'Tallarines de zanahoria con salsa de cacahuete y tempeh', 'Una receta vegana con tallarines de verdura'),
(2, 7, '1. Precalentar el horno (arriba y abajo) a 180 grados.\r\n2. Lavar bien 125gr de salmón y secar luego con papel de cocina. A continuación, colocar en una bandeja de horno previamente cubierta con papel de hornear.\r\n3.  Añadir las láminas de ajo al salmón junto con aceite de oliva, jugo de limón, una pizca de sal y pimienta, así como unas pocas hojas de perejil. Restregar bien todo junto.\r\n4. Hornear el filete de salmón durante 15 minutos.\r\n5. Poner a calentar aceite de oliva en una sartén a fuego medio. Añadir las cebollas y pochar un poco hasta que vayan transparentando. Añadir a continuación los trozos de espárrago y saltear todo junto durante 5 minutos. Salpimentar.\r\n6. Tan pronto comience a hervir el agua, añadir a la olla sal y la pasta. Cocer la pasta unos 7 minutos hasta que quede al dente y añadir después a la sartén de los espárragos.\r\n7. Sacar el salmón del horno. Cortar en pequeños trozos con cuchillo y tenedor y añadir a la sartén con la pasta.\r\n8. Servir en un plato la pasta con salmón y espárragos y aderezar con un poco de perejil.', 'normal', ' ', 'Pasta proteica con salmón y espárragos', 'Lleva tu entrenamiento al siguiente nivel con esta receta'),
(3, 7, '1. Mezclar bien en un cuenco el polvo para tortitas con agua y formar con todo ello una masa uniforme. Añadir sal, pimienta y hierbas frescas, al gusto.\r\n2. Cortar el aguacate en láminas. Cortar los tomates por la mitad y picar bien las hierbas frescas. Verter todo a un cuenco y añadir aceite de oliva, sal y pimienta.\r\n3. Poner a calentar la sandwichera grill o gofrera y engrasar con un poco de aceite.\r\n4. Añadir la masa del gofre a la sandwichera grill (para dos gofres) y dejar dorar durante 3-4 minutos.\r\n5. Completar los gofres salados con el mix de tomate y aguacate. Aderezar con yogur de soja si así lo queremos.\r\n', 'vegana', ' ', 'Receta vegana de gofres salados\r\n', 'Increíble sabor y consistencia\r\n'),
(4, 7, '1. Pelar la zanahoria y las cebollas y cortar en pequeños dados.\r\n2. Poner a calentar aceite de oliva en una olla. Añadir los daditos de verdura y cocinar a fuego medio durante unos 5 minutos, hasta que reduzcan un poco.\r\n3. Añadir ahora el tomate triturado, el agua y un puñadito de hojas de albahaca. Remover y cocinar todo junto durante 15 minutos.\r\n4. Mientras tanto, ir preparando en otra olla la Pasta Proteica.\r\n5.Echar sal a la olla donde coceremos la pasta y dejar hervir ésta durante 7 minutos hasta que quede al dente.\r\n6. Escurrir la pasta una vez cocida y echarla a la olla donde preparamos la salsa de tomate. Añadir ahora también la ricotta y mezclar todo bien. Rectificar de sal.\r\n7. Verter la pasta con la salsa en un molde para horno y meter en el horno a 200 grados (función grill + aire) durante 10 minutos en la parte superior del horno.\r\n8. Sacar la pasta del horno y aderezar por encima con hojas de albahaca fresca. Servir.\r\n', 'vegetariana', ' ', 'Sencilla receta de pasta al horno vegetariana\r\n', 'Cremosa, ligera y rica en proteínas\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id` int(11) NOT NULL,
  `idEntrenador` int(11) NOT NULL,
  `rutina` text NOT NULL,
  `categoria` enum('superior','inferior','full body','') NOT NULL,
  `imagen` varchar(100) NOT NULL DEFAULT ' ',
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id`, `idEntrenador`, `rutina`, `categoria`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 2, '1. Press banca: 4 series x 8 repeticiones\r\n2. Press banca con mancuernas a 45 grados: 4 series x 12 repeticiones\r\n3. Flexiones: 3 series x fallo\r\n4. Cruce de poleas: 3 series x 15 repeticiones', 'superior', '', 'Rutina de pecho', 'Pon a prueba tus pectorales con estos ejercicios.'),
(2, 3, 'Ejercicios básicos, pesos elevados y volumen de entrenamiento alto, las claves del volumen. Si eres avanzado y conoces los secretos de entrenar a máxima intensidad puedes quitar una serie de cada ejercicio.\r\n\r\nCurl de pie con barra recta: 4 series x	 6, 8, 10, 12 repeticiones\r\nCurl con barra Z en banco Scott: 4 series x 6, 8, 10, 12 repeticiones\r\nCurl con mancuernas, banco inclinado: 3	series x 8, 8, 10 repeticiones\r\nCurl en polea alta: 3 series x 8, 10, 12 repeticiones.', 'superior', '', 'Rutina de bíceps', 'Los mejores ejercicios para aumentar el volumen de tus bíceps.'),
(3, 3, 'Press militar con barra: 5 series x 6, 6, 8, 10, 12 repeticiones\r\nRemo con barra, de pie (Al mentón): 5 series x 8, 8, 10, 10, 12 repeticiones\r\nElevaciones laterales: 4 series x 8, 8, 10, 12 repeticiones\r\nElevaciones posteriores: 3 series x 8, 10, 12 repeticiones', 'superior', '', 'Entrenamiento de hombros', 'Rutina con ejercicios de probada eficacia y con objetivos de hipertrofia.'),
(10, 2, 'Si hacéis regularmente sentadilla con barra, y queréis incrementar vuestra potencia y vuestra fuerza, cambiad vuestra rutina de pierna durante tres semanas por esta:\r\n\r\n1. Sentadilla tipo sumo con barra: haced 4 series de 8 a 12 repeticiones.\r\n2. Sentadilla con mancuerna por encima de la cabeza: haced 4 series de 8 a 12 repeticiones (2 series con cada brazo sujetando el peso).\r\n3.Sentadilla Hack con barra: haced 4 series de 8 a 12 repeticiones, después de 2 series de sentadilla ligera como calentamiento.', 'inferior', '', 'Rutina de piernas con sentadillas', 'Construye unas piernas masivas utilizando estos grandes levantamientos');

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
(4, 'Laura', 'laura@gmail.com', '$2y$10$qWhzrQItsw453xSq35ltHe3q2NwGULzhuB23Vh/bdef7Dke5Qsc4e', 'registrado', 1),
(5, 'Juan', 'juan@gmail.com', '$2y$10$VE2iJ4cHETpDgUEVi8v4XefldjYMqvu4.JlotnSQOkIrNDsaIRRTu', 'entrenador', 1),
(6, 'Adrián Sánchez', 'adriansanchez@gmail.com', '$2y$10$FdKBs18eJzwHxym4tkozbOIzEzJZAYoD7foAc6OjYCn8mHEdTazSC', 'nutricionista', 1),
(7, 'Paula Pérez', 'paulaperez@gmail.com', '$2y$10$hi9muNv961AE2rix0FBo8u2QrY0TMNqULjBkCwm.w829SDWE.Tpi6', 'nutricionista', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comentarios_receta`
--
ALTER TABLE `comentarios_receta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios_rutina`
--
ALTER TABLE `comentarios_rutina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `insignias`
--
ALTER TABLE `insignias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
