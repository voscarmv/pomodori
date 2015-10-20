-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2015 at 09:24 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a7915442_pomodor`
--

-- --------------------------------------------------------

--
-- Table structure for table `deptree2`
--

CREATE TABLE `deptree2` (
  `ix` int(10) unsigned NOT NULL,
  `subix` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `title` tinytext COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci,
  `done` tinyint(1) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  PRIMARY KEY (`ix`,`subix`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deptree2`
--

INSERT INTO `deptree2` VALUES(1, 1, 'vicente', 'Crear la interfaz de usuario', 'Crear solamente el esqueleto de la interfaz.\r\n\r\nSe busca crear una interfaz multiventana.\r\nPracticamente como un browser, con pestaÃ±as.\r\nEl usuario pordrÃ¡ navegar a lo largo de estas\r\npor medio del sistema de la interfÃ¡z.', 1, 1, 10);
INSERT INTO `deptree2` VALUES(1, 2, 'vicente', 'Implementar sistema de pestaÃ±as', 'Hay varios ejemplos en internet de\r\ncÃ³mo implementar un sistema de\r\nsub-ventanas con pestaÃ±as.\r\n\r\nImplementar alguno de estos.', 1, 8, 9);
INSERT INTO `deptree2` VALUES(1, 3, 'vicente', 'ComunicaciÃ³n con base de datos', 'Crear una clase para proporcionar un\r\nconector con la base de datos. Crear otra\r\npara las funciones de escritura hacia la\r\nbase de datos. Crear una mas para las\r\nfunciones de extraccion de datos de la\r\nbase de datos.', 0, 9, 14);
INSERT INTO `deptree2` VALUES(1, 4, 'vicente', 'Crear conector para BD MySQL', 'Un conector al estilo ConT de\r\nHÃ©ctor. Pero separado de las\r\nfunciones de escritura y lectura\r\nde la base de datos.', 1, 10, 11);
INSERT INTO `deptree2` VALUES(1, 5, 'vicente', 'Clase para e/s datos a BD', 'Escribir una clase que maneje la entrada y\r\nsalida de los datos a la base de datos.\r\n\r\nEsta clase debe hacer la verificacion de\r\nla integridad de los datos, funcionar en\r\nbase a funciones con parametros.\r\n\r\nEl proposito es que se evite utilizar\r\nqueries en el codigo de las ventanas de\r\ndialogo. SI HAY UNA SOLA QUERY EN UN\r\nCODIGO DE VENTANA, ALGO ANDA MAL.', 0, 12, 13);
INSERT INTO `deptree2` VALUES(1, 6, 'vicente', 'Sistema de usuarios', 'Administrar los usuarios que utilizan\r\nsimark. Utilizar una configuracion\r\nsemejante a la que utilizo Hector\r\nen ProAD.', 0, 15, 24);
INSERT INTO `deptree2` VALUES(1, 7, 'vicente', 'Crear estructura de BD', 'Crear la tabla para la administracion\r\nde los usuarios en la base de datos\r\nsimark.', 0, 16, 21);
INSERT INTO `deptree2` VALUES(1, 8, 'vicente', 'Login/logout de usuarios', 'Ingreso de usuarios al iniciar\r\nel programa. Salida de usuario.', 1, 22, 23);
INSERT INTO `deptree2` VALUES(1, 9, 'vicente', 'Instalador', 'Crear una aplicaciÃ³n que instale todas\r\nlas dependencias del programa:\r\n\r\nMySQL, script sql para crear BD,\r\nwkhtmltopdf (agregar path de .exe a\r\nconfig local), etc.', 0, 25, 26);
INSERT INTO `deptree2` VALUES(1, 10, 'vicente', 'Tabla para usuarios', 'Una tabla que incluya usuarios,\r\nnombres, correos, datos, fecha\r\nde creacion, etc.', 1, 17, 18);
INSERT INTO `deptree2` VALUES(1, 11, 'vicente', 'Crear tabla de privilegios', 'Tabla de privilegios para usuarios de\r\nla tabla de usuarios.', 0, 19, 20);
INSERT INTO `deptree2` VALUES(1, 12, 'vicente', 'Sistema para gestion de clientes', 'Un sistema para crear, modificar y\r\neliminar perfiles de clientes. Tambien\r\npara consultar datos de clientes.', 0, 27, 36);
INSERT INTO `deptree2` VALUES(1, 13, 'vicente', 'Crear tabla de cliente', 'Crear una tabla con la info\r\ngeneral de un cliente.', 1, 28, 29);
INSERT INTO `deptree2` VALUES(1, 14, 'vicente', 'Gestion de la tabla', 'Crear, modificar y\r\neliminar.', 0, 30, 31);
INSERT INTO `deptree2` VALUES(1, 15, 'vicente', 'Correlato de cliente con orden', 'Usar esquema del libro "PHP and\r\nMySql web development" de Welling.', 0, 32, 33);
INSERT INTO `deptree2` VALUES(1, 16, 'vicente', 'Correlato con facturas', 'Correlacionar ordenes con pagos\r\nde los clientes.', 0, 34, 35);
INSERT INTO `deptree2` VALUES(1, 17, 'vicente', 'Planeacion', 'Ideas que abarcan varias areas del\r\nproyecto. Dificiles de clasificar\r\ninmediatamente. Un espacio para aclarar\r\nla secuencia de pasos a seguir.', 0, 37, 38);

