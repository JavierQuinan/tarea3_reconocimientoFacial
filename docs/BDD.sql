-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 17-02-2024 a las 01:38:43
-- Versión del servidor: 5.7.39
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `Ingresos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Accesos`
--

CREATE TABLE `Accesos` (
  `idAccesos` int(11) NOT NULL,
  `IdTipoAcceso` int(11) NOT NULL,
  `Ultimo` datetime NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `idRoles` int(11) NOT NULL,
  `Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`idRoles`, `Rol`) VALUES
(5, 'ADMINISTRADOR'),
(6, 'Control');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sucursales`
--

CREATE TABLE `Sucursales` (
  `SucursalId` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` text NOT NULL,
  `Correo` text NOT NULL,
  `Parroquia` text NOT NULL,
  `Canton` text NOT NULL,
  `Provincia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Sucursales`
--

INSERT INTO `Sucursales` (`SucursalId`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Parroquia`, `Canton`, `Provincia`) VALUES
(5, 'Ambato', 'UNIANDES', '0987654321', 'correo@gmail.com', 'San Antonio', 'Ambato', 'Tungurahua'),
(6, 'Salasaca', 'Salasaca', '0987654321', 'correosalasaca@gmail.com', 'Salasaca', 'Pelileo', 'Tungurahua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Acceso`
--

CREATE TABLE `Tipo_Acceso` (
  `IdTipoAcceso` int(11) NOT NULL,
  `Detalle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tipo_Acceso`
--

INSERT INTO `Tipo_Acceso` (`IdTipoAcceso`, `Detalle`) VALUES
(1, 'Ingreso'),
(2, 'Salida'),
(3, 'Ingreso Almuerzo'),
(4, 'Salida Almuerzo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` text NOT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `SucursalId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuarios`, `Nombres`, `Apellidos`, `contrasenia`, `Correo`, `SucursalId`, `Cedula`) VALUES
(3, 'Luis', 'Llerena', '123', 'correo@gmail.com', 5, '1803971371'),
(4, 'xxxx', 'xxxx', '123', 'otro@otro.com', 5, '1804233151'),
(5, 'Luis Antonio', 'Llerena Ocaña', '123', 'lleroc@gmail.com', 6, '1801770569'),
(6, 'kjhvkjhbk', 'bkjhbkjhbkjhb', '', '', 6, '1802491181'),
(7, 'kjhvkjhbk', 'bkjhbkjhbkjhb', '', '', 6, '1803971730');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios_Roles`
--

CREATE TABLE `Usuarios_Roles` (
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `idUsuariosRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios_Roles`
--

INSERT INTO `Usuarios_Roles` (`Usuarios_idUsuarios`, `Roles_idRoles`, `idUsuariosRoles`) VALUES
(3, 5, 3),
(4, 5, 4),
(5, 6, 5),
(7, 6, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Accesos`
--
ALTER TABLE `Accesos`
  ADD PRIMARY KEY (`idAccesos`),
  ADD KEY `fk_Accesos_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `Acceso_tipoAcceso` (`IdTipoAcceso`);

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `Sucursales`
--
ALTER TABLE `Sucursales`
  ADD PRIMARY KEY (`SucursalId`);

--
-- Indices de la tabla `Tipo_Acceso`
--
ALTER TABLE `Tipo_Acceso`
  ADD PRIMARY KEY (`IdTipoAcceso`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `Usuarios_Sucursales` (`SucursalId`);

--
-- Indices de la tabla `Usuarios_Roles`
--
ALTER TABLE `Usuarios_Roles`
  ADD PRIMARY KEY (`idUsuariosRoles`),
  ADD KEY `fk_Usuarios_has_Roles_Roles1_idx` (`Roles_idRoles`),
  ADD KEY `fk_Usuarios_has_Roles_Usuarios1_idx` (`Usuarios_idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Accesos`
--
ALTER TABLE `Accesos`
  MODIFY `idAccesos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Roles`
--
ALTER TABLE `Roles`
  MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Sucursales`
--
ALTER TABLE `Sucursales`
  MODIFY `SucursalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Tipo_Acceso`
--
ALTER TABLE `Tipo_Acceso`
  MODIFY `IdTipoAcceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Usuarios_Roles`
--
ALTER TABLE `Usuarios_Roles`
  MODIFY `idUsuariosRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Accesos`
--
ALTER TABLE `Accesos`
  ADD CONSTRAINT `Acceso_tipoAcceso` FOREIGN KEY (`IdTipoAcceso`) REFERENCES `Tipo_Acceso` (`IdTipoAcceso`),
  ADD CONSTRAINT `fk_Accesos_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_Sucursales` FOREIGN KEY (`SucursalId`) REFERENCES `Sucursales` (`SucursalId`);

--
-- Filtros para la tabla `Usuarios_Roles`
--
ALTER TABLE `Usuarios_Roles`
  ADD CONSTRAINT `fk_Usuarios_has_Roles_Roles1` FOREIGN KEY (`Roles_idRoles`) REFERENCES `Roles` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_has_Roles_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
