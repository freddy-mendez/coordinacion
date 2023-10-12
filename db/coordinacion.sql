-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para coordinacion
CREATE DATABASE IF NOT EXISTS `coordinacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `coordinacion`;

-- Volcando estructura para tabla coordinacion.aprendices
CREATE TABLE IF NOT EXISTS `aprendices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` bigint(20) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ficha_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`documento`),
  KEY `FK1` (`ficha_id`),
  CONSTRAINT `FK1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coordinacion.aprendices: ~2 rows (aproximadamente)
INSERT INTO `aprendices` (`id`, `documento`, `nombres`, `apellidos`, `email`, `ficha_id`) VALUES
	(1, 123, 'Freddy', 'Mendez', 'fmendezo@correo.com', 1),
	(2, 234, 'Tania', 'Rueda', 'trueda@correo.com', 1);

-- Volcando estructura para tabla coordinacion.fichas
CREATE TABLE IF NOT EXISTS `fichas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `programa` varchar(250) NOT NULL,
  `lider` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coordinacion.fichas: ~1 rows (aproximadamente)
INSERT INTO `fichas` (`id`, `numero`, `programa`, `lider`) VALUES
	(1, 2557863, 'ADSO', 'Freddy');

-- Volcando estructura para tabla coordinacion.motivos
CREATE TABLE IF NOT EXISTS `motivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coordinacion.motivos: ~3 rows (aproximadamente)
INSERT INTO `motivos` (`id`, `nombre`) VALUES
	(1, 'Enfermedad'),
	(2, 'Entrevists Etapa Productiva'),
	(3, 'Otros');

-- Volcando estructura para tabla coordinacion.salidas
CREATE TABLE IF NOT EXISTS `salidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aprendiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `motivo_id` int(11) NOT NULL,
  `otros` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `duracion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_salidas_aprendices` (`aprendiz_id`),
  KEY `FK_salidas_users` (`user_id`),
  KEY `FK_salidas_motivos` (`motivo_id`),
  CONSTRAINT `FK_salidas_aprendices` FOREIGN KEY (`aprendiz_id`) REFERENCES `aprendices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_salidas_motivos` FOREIGN KEY (`motivo_id`) REFERENCES `motivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_salidas_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coordinacion.salidas: ~4 rows (aproximadamente)
INSERT INTO `salidas` (`id`, `aprendiz_id`, `user_id`, `motivo_id`, `otros`, `fecha`, `hora`, `duracion`) VALUES
	(1, 2, 1, 2, NULL, '2023-02-12', '07:06:44', 3),
	(2, 2, 2, 1, NULL, '2023-02-25', '06:00:00', 1),
	(3, 1, 1, 3, 'Personales', '2023-03-12', '08:00:00', 4),
	(4, 2, 2, 3, 'Viaje', '2023-02-25', '09:00:00', 3);

-- Volcando estructura para tabla coordinacion.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla coordinacion.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `email`) VALUES
	(1, 'fmendezo', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Freddy', 'fmendezo@sena.edu.co'),
	(2, 'fmo', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Ricardo', 'fmo@hotmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
